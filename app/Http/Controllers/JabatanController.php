<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jabatan.index', [
            'title'         => 'Jabatan',
            'jabatan'  => Jabatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create', [
            'title' => 'Jabatan',
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
            'kode_jabatan' => 'required|unique:jabatans',
            'nama_jabatan' => 'required',
            'tunjangan' => 'required',
        ]);

        Jabatan::create([
            'kode_jabatan' => strtoupper($request->kode_jabatan),
            'nama_jabatan' => $request->nama_jabatan,
            'tunjangan' => $request->tunjangan,
        ]);

        return redirect('/jabatan')->with('success', 'Data Jabatan berhasil ditambahkan.');
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
        return view('jabatan.edit', [
            'title' => 'Jabatan',
            'jabatan' => Jabatan::find($id),
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
            'kode_jabatan' => [
                'required',
                'max:255',
                Rule::unique('jabatans')->ignore($id),
            ],
            'nama_jabatan' => 'required',
            'tunjangan' => 'required',
        ]);

        Jabatan::where('id', $id)->update([
            'kode_jabatan' => strtoupper($request->kode_jabatan),
            'nama_jabatan' => $request->nama_jabatan,
            'tunjangan' => $request->tunjangan,
        ]);

        return redirect('/jabatan')->with('success', 'Data Jabatan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::destroy($id);
        return redirect('/jabatan')->with('success', 'Data Jabatan berhasil dihapus.');
    }
}
