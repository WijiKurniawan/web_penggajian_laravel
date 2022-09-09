<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $agama = ['Islam', 'Hindu', 'Buddha', 'Kong Hu Chu', 'Kristen', 'Katolik'];
    protected $status_pernikahan = ['Belum Menikah', 'Sudah Menikah', 'Cerai', 'Cerai Mati'];

    public function index()
    {
        $karyawan = DB::table('karyawans')
            ->join('jabatans', 'karyawans.id_jabatan', '=', 'jabatans.id')
            ->join('departemens', 'karyawans.id_departemen', '=', 'departemens.id')
            ->join('cabangs', 'karyawans.id_cabang', '=', 'cabangs.id')
            ->select('karyawans.*', 'jabatans.kode_jabatan', 'departemens.kode_departemen', 'cabangs.kode_cabang')
            ->get();

        return view('karyawan.index', [
            'title' => 'Karyawan',
            'karyawan'  => $karyawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create', [
            'title' => 'Karyawan',
            'agama' => $this->agama,
            'status_pernikahan' => $this->status_pernikahan,
            'jabatan' => Jabatan::all(),
            'cabang' => Cabang::all(),
            'departemen' => Departemen::all()
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
            'nomor_induk' => 'required|unique:karyawans|digits:16|numeric',
            'nama_karyawan' => 'required',
            'jumlah_anak' => 'required',
            'no_telp' => 'required|numeric',
            'gaji_pokok' => 'required',
        ]);

        Karyawan::create([
            'nomor_induk' => $request->nomor_induk,
            'nama_karyawan' => $request->nama_karyawan,
            'agama' => $request->agama,
            'status_pernikahan' => $request->status_pernikahan,
            'jumlah_anak' => $request->jumlah_anak,
            'no_telp' => $request->no_telp,
            'id_jabatan' => $request->id_jabatan,
            'id_cabang' => $request->id_cabang,
            'id_departemen' => $request->id_departemen,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil ditambahkan.');
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
        return view('karyawan.edit', [
            'title' => 'Karyawan',
            'agama' => $this->agama,
            'status_pernikahan' => $this->status_pernikahan,
            'jabatan' => Jabatan::all(),
            'cabang' => Cabang::all(),
            'departemen' => Departemen::all(),
            'karyawan' => Karyawan::find($id)
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
            'nomor_induk' => [
                'required',
                'numeric',
                'digits:16',
                Rule::unique('karyawans')->ignore($id),
            ],
            'nama_karyawan' => 'required',
            'jumlah_anak' => 'required',
            'no_telp' => 'required|numeric',
            'gaji_pokok' => 'required',
        ]);

        Karyawan::where('id', $id)->update([
            'nomor_induk' => $request->nomor_induk,
            'nama_karyawan' => $request->nama_karyawan,
            'agama' => $request->agama,
            'status_pernikahan' => $request->status_pernikahan,
            'jumlah_anak' => $request->jumlah_anak,
            'no_telp' => $request->no_telp,
            'id_jabatan' => $request->id_jabatan,
            'id_cabang' => $request->id_cabang,
            'id_departemen' => $request->id_departemen,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil dihapus.');
    }
}
