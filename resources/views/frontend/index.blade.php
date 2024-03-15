@extends('template_frontend.layout')
@section('content')
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Jasa Pengiriman</h2>
          <p data-aos="fade-up" data-aos-delay="100 ">penyedia jasa pengiriman barang terpercaya dengan fokus pada keandalan dan kecepatan. Menyediakan layanan
             pengiriman lokal, kami memastikan setiap tahap pengiriman dilakukan dengan presisi dan tepat waktu. kami memenuhi kebutuhan pengiriman pelanggan dengan efisiensi tinggi
             dan layanan pelanggan yang unggul. Kami juga berkomitmen pada praktik ramah lingkungan, menerapkan kebijakan bahan bakar efisien. Hubungi Delivery Express sekarang untuk pengiriman barang yang aman dan efisien,
             menjadi mitra terpercaya dalam memenuhi kebutuhan bisnis Anda.</p>

          <a href="{{url('/kirim_barang')}}" class="btn btn-primary">Kirim Barang Sekarang!</a>


          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$jumlah_kurir}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kurir</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$jumlah_user}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>User</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kecamatan</p>
              </div>
            </div><!-- End Stats Item -->


          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{asset('frontend')}}/assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="services" class="featured-services">
      <div class="container">

        <div class="row gy-4"> 

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
            <div>
              <h4 class="title">Ketentuan Barang</h4>
              <p class="description">Pastikan barang yang kamu kirim telah sesuai dengan syarat dan ketentuan di</p>
              <a href="{{url('/ketentuan')}}" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
            <div>
              <h4 class="title">Pengiriman</h4>
              <p class="description">Pastikan kamu mengirim barang sesuai dengan ketentuan pengiriman</p>
              <a href="{{url('/pengiriman')}}" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div>
              <h4 class="title">Waktu</h4>
              <p class="description">Berikut ini adalah ketentuan waktu atau jarak tempuh pengiriman</p>
              <a href="{{url('/waktu')}}" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-0">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{asset('frontend')}}/assets/img/a/abo.jpeg" class="img-fluid" alt="" style="width: 500%">
            {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>About Us</h3>
            <p>
              haii semuaaa!!!<br>
              Selamat datang di layanan pengiriman barang instan kami, di mana kecepatan dan keandalan bertemu untuk memenuhi kebutuhan pengiriman Anda. Kami adalah mitra yang dapat diandalkan untuk mengirimkan paket Anda tepat waktu, dengan keamanan yang tak tertandingi, dan layanan pelanggan yang ramah serta responsif.
              kami adalah solusi kamu untuk mengantarkan barang atau dokumen kamu dengan cepat, mudah, dan aman!
            </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-broadcast"></i>
                <a href="{{url('/profile')}}">
                  <h5>jangan lupa daftar duluu</h5>
                  <p>masukkan profilemu lalu kirim barang</p>
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Our Services</span>
          <h2>Our Services</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('frontend/assets/img/a/kurr.jpeg')}}" alt="" class="img-fluid">
              </div>
              <h3><a href="{{url('/daftar_kurir')}}" class="stretched-link">Kurir</a></h3>
              <p>gabung mitra kami dan jadi pengirim yang amanah dan bantu kirim barang dengan cepat setiap harimu</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('frontend/assets/img/a/pta.jpg')}}" alt="" class="img-fluid">
              </div>
              <h3><a href="{{url('/kirim_barang')}}" class="stretched-link">Daerah</a></h3>
              <p>Kami Menyediakan beberapa daerah yang dapat diakses dan dapat dilakukan pengiriman barang</p>
            </div>
          </div><!-- End Card Item -->          

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('frontend/assets/img/a/brng.jpeg')}}" alt="" class="img-fluid">
              </div>
              <h3><a href="{{url('/pengiriman')}}" class="stretched-link">Pengiriman</a></h3>
              <p>Jasa pengiriman kami termasuk cepat ada banyak ketentuan yang harus di ketahui sebelum mengirimin barang</p>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="daftar_kurir" class="about pt-0">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{asset('frontend')}}/assets/img/a/lowongan-.jpg" class="img-fluid" alt="">
            {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>Tertarik untuk gabung jadi Mitra Kami</h3>
            <p>
              
            </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-fullscreen-exit"></i>
                <a href="{{url('/persyaratan')}}">
                  <h5>Cari tahu persyaratan dan cara daftarnya di sini.</h5>
                </a>
              </li>
              <li data-aos="fade-up" data-aos-delay="300">
                @auth
                @php
                 $userAlreadyRegistered = \App\Models\daftar_kurir::where('user_id', auth()->user()->id)->exists();   
                @endphp
                <div>
                  @if(!$userAlreadyRegistered)
                      <h5><a href="{{url('daftar_kurir')}}" class="btn btn-info">Daftar Sekarang!</a></h5>
                      @else
                      <h5><a href="#" class="btn btn-info">Anda Sudah Mendaftar</a></h5>
                  @endif
                  @else
                  <h5><a href="{{url('daftar_kurir')}}" class="btn btn-info">Daftar Sekarang!</a></h5>

                @endauth

                </div>              
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section>
    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h3>Pesan Sekarang</h3>
            <p>kirim barang dengan waktu singkat cepat tinggal duduk santai aja.</p>
            <a class="cta-btn" href="{{url('/kirim_barang')}}">click here</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <div class="section-header mt-2">
      <span>Review Dari Anggota Kami</span>
      <h2>Review Dari Anggota Kami</h2>

    </div>
    {{-- <h3 class="text-center mt-2 mb-2" style="font-family: 'Courier New', Courier, monospace">Testimoni</h3> --}}
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="slides-1 swiper" data-aos="fade-up">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="{{asset('frontend')}}/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> --}}
                <h3>Indah Inayaha</h3>
                <h4>pengguna</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  sangat memuaskan, barang sampai tanpa kerusakan sedikit pun. kurir tepat waktu.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="{{asset('frontend')}}/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt=""> --}}
                <h3>Dika Hamdan</h3>
                <h4>pengguna</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Kemarin ngirim dokumen, sedikit takut kalo dokumennya lecek atau sobek syukur dokumennya aman makasih buat kurirnya
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="{{asset('frontend')}}/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt=""> --}}
                <h3>Diana</h3>
                <h4>pengguna</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                 Kemarin pagi-pagi banget waktu anak sekolah lupa bawa bekal sama bukunya bingung dirumah ga ada kendaraan langsung pergi ke sini buat kirim barang lewat website ini, nyampenya cepet banget
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Frequently Asked Questions</span>
          <h2>Frequently Asked Questions</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">

            <div class="accordion accordion-flush" id="faqlist">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Barang kami ada yang rusak
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Segera laporkan kepada kami melalui halaman contact (pada menu) di website kami dengan pilih ajukan lewat email ataupun nomor handphone,
                    Kamu juga tidak perlu khawatir karena kami memberikan perlindungan dan pertanggujawaban terhadap barang anda.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Cara Pengiriman
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    masukan profil anda terlebih dahulu (pastikan pengisian alamat benar karna itu adalah alamat titik jemput), kemudian anda bisa langsung mengirim barang dan akan mendapatkan kurirnya. lebih tepatnya kamu dapat membaca di <a href="{{url('/pengiriman')}}">pengiriman</a>
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    Bagaimana cara mengetahui perkembangan barang yang dikirim?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    setelah kamu menekan submit pada kirim barang anda akan di tampilkan tampilan data disitu terdapat kolom status yang akan selalu di perbarui oleh kurir seiring perkembangan pengantaran barangmu.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main>
@endsection