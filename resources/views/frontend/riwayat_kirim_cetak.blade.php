<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
       
        body {
            background-color: #4762b3;
            display: flex;
            justify-content: center;
            height: auto;
            margin-top: 30px;
            font-family:  sans-serif;
        }

        .card {
            width: 800px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }  
        .no_transaksi {
        display: flex;
        justify-content: space-between;
        }   
        #printButton {
            display: block;
        }

        /* Media query untuk mencetak halaman */
        @media print {
            /* Sembunyikan tombol cetak saat mencetak */
            #printButton {
                display: none;
            }
        }
    </style>
</head>
<body>
    
    <div class="card">
        <button id="printButton" class="btn btn-primary  btn-sm">Cetak</button>
        <div class="card-body">
            <div class="header">
                <h2 style="text-align: center"><b>Invoice</b></h2>
                <h4>PT. Hafara Aqiba Group</h4>
                Jl. Kelet Ploso KM 36, Kelet, Keling, Jepara, Jawa Tengah <br>
                Mobile: 087564857488 <br>
                Email: info@Delstgroup.com <br>
                www.Delstgroup.com</p>
                <hr>
            </div>
            <div class="no_transaksi">
                <table>
                    <tr>
                        <td style="padding-right: 400px">Alamat Tujuan</td>                       
                        <td>Tanggal Antar Pesanan</td>
                    </tr>
                    <tr>
                        <td>Kecamatan {{$data->kecamatan}}, <br> Desa {{$data->desa}}, {{$data->detail_rumah}}</td>
                        <td>{{ Carbon\Carbon::parse($data->created_at)->format('M, d D H:i:s') }}</td>
                    </tr>
                </table>
            </div>
            <hr>
            <h5 class="text-success">Detail Kurir</h5>
            <div class="no_transaksi">
                <table class="table">
                    <tr>
                        <th>Nama Kurir</th>                       
                        <th>No Hp</th>
                        <th>Nama Montor</th>
                    </tr>                
                    <tr>
                        <td>{{$data->kurir->nama}}</td>
                        <td>{{$data->kurir->no_hp}}</td>
                        <td>{{$data->kurir->nama_motor}}</td>
                    </tr>
                   
                </table>
            </div>

            <h5 class="text-success">Detail Barang</h5>
            <div class="no_transaksi">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nama Penerima Barang</th>
                        <th scope="col">Alamat Anda</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->nama_tujuan}}</td>
                            <td>Kecamatan {{$data->pemesan->kecamatan}},<br> Desa {{$data->pemesan->desa}}, {{$data->pemesan->detail_rumah}}</td>
                            <td>Kecamatan {{$data->kecamatan}},<br> Desa {{$data->desa}}, {{$data->detail_rumah}}</td>
                            <td>{{$data->berat}} Kg</td>
                            <td>Rp.{{ number_format($data->tarif, 2, ',', '.') }}</td>                            
                            <td>
                                @if($data->status == 0)
                                <span class="btn btn-info btn-sm">Kurir Menuju Alamat Anda</span>
                                @elseif($data->status == 1)
                                <span class="btn btn-primary btn-sm">Kurir Mengirim Barang Anda</span>
                                @elseif($data->status == 2)
                                <span class="btn btn-success btn-sm">Kurir Berhasil Mengirimkan Barang</span>
                                @endif
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        function printPage() {
            window.print();
        }
    
        var printButton = document.getElementById("printButton");
        printButton.addEventListener("click", printPage);
    </script>
</body>
</html>