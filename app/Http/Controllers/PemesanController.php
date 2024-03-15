<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesan;

class PemesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pemesan()
    {
        $data['pemesan']= pemesan::get();
        return view('admin.pemesan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemesan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemesan= new pemesan;
        $pemesan->fill($request->all());
        $pemesan->save();
        return redirect('admin/pemesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pemesan']= pemesan::find($id);
        return view('admin.pemesan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemesan = pemesan::find($id);
        $pemesan->fill($request->all());
        $pemesan->update();
        return redirect('admin/pemesan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesan=pemesan::find($id)->delete();
        return redirect ('admin/pemesan');
    }
}
