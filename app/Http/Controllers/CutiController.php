<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    protected $tahun = ['2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '3010', '3011', '3012'];

    public function index()
    {
        $cuti = DB::table('cutis')
            ->join('karyawans', 'cutis.id_karyawan', '=', 'karyawans.id')
            ->select('cutis.*', 'karyawans.nomor_induk', 'karyawans.nama_karyawan')
            ->get();

        return view('cuti.index', [
            'title' => 'Cuti',
            'cuti'  => $cuti,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuti.create', [
            'title' => 'Cuti',
            'karyawan' => Karyawan::all(),
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
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
            'jumlah_cuti' => 'required',
        ]);

        $request->validate([
            'jumlah_cuti' => 'required',
        ]);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_cuti' => $request->jumlah_cuti,
            ]);
        }

        Cuti::create([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_cuti' => $request->jumlah_cuti,
        ]);

        return redirect('/cuti')->with('success', 'Data Cuti berhasil ditambahkan.');
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
        return view('cuti.edit', [
            'title' => 'Cuti',
            'cuti' => Cuti::find($id),
            'karyawan' => Karyawan::all(),
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
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
            'jumlah_cuti' => 'required',
        ]);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_cuti' => $request->jumlah_cuti,
            ]);
        }

        Cuti::where('id', $id)->update([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_cuti' => $request->jumlah_cuti,
        ]);

        return redirect('/cuti')->with('success', 'Data Cuti berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::find($id);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $cuti['id_karyawan'])
            ->where('bulan', '=', $cuti['bulan'])
            ->where('tahun', '=', $cuti['tahun']);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_cuti' => 0,
            ]);
        }

        Cuti::destroy($id);
        return redirect('/cuti')->with('success', 'Data Cuti berhasil dihapus.');
    }
}
