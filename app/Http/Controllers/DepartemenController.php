<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departemen.index', [
            'title'         => 'Departemen',
            'departemen'  => Departemen::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departemen.create', [
            'title' => 'Departemen',
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
            'kode_departemen' => 'required|unique:departemens',
            'nama_departemen' => 'required',
        ]);

        Departemen::create([
            'kode_departemen' => strtoupper($request->kode_departemen),
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect('/departemen')->with('success', 'Data Departemen berhasil ditambahkan.');
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
        return view('departemen.edit', [
            'title' => 'Departemen',
            'departemen' => Departemen::find($id),
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
            'kode_departemen' => [
                'required',
                'max:255',
                Rule::unique('departemens')->ignore($id),
            ],
            'nama_departemen' => 'required',
        ]);

        Departemen::where('id', $id)->update([
            'kode_departemen' => strtoupper($request->kode_departemen),
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect('/departemen')->with('success', 'Data Departemen berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departemen::destroy($id);
        return redirect('/departemen')->with('success', 'Data Departemen berhasil dihapus.');
    }
}
