<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cabang.index', [
            'title'         => 'Cabang',
            'cabang'  => Cabang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.create', [
            'title' => 'Cabang',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_cabang' => 'required|unique:cabangs',
            'nama_cabang' => 'required',
            'uang_makan' => 'required',
        ]);

        Cabang::create([
            'kode_cabang' => strtoupper($request->kode_cabang),
            'nama_cabang' => $request->nama_cabang,
            'uang_makan' => $request->uang_makan,
        ]);

        return redirect('/cabang')->with('success', 'Data Cabang berhasil ditambahkan.');
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
        return view('cabang.edit', [
            'title' => 'Cabang',
            'cabang' => Cabang::find($id),
        ]);
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
        $request->validate([
            'kode_cabang' => [
                'required',
                'max:255',
                Rule::unique('cabangs')->ignore($id),
            ],
            'nama_cabang' => 'required',
            'uang_makan' => 'required',
        ]);

        Cabang::where('id', $id)->update([
            'kode_cabang' => strtoupper($request->kode_cabang),
            'nama_cabang' => $request->nama_cabang,
            'uang_makan' => $request->uang_makan,
        ]);

        return redirect('/cabang')->with('success', 'Data Cabang berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cabang::destroy($id);
        return redirect('/cabang')->with('success', 'Data Cabang berhasil dihapus.');
    }
}
