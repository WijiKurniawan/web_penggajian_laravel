<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    protected $tahun = ['2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '3010', '3011', '3012', ];

    public function index()
    {
        $cuti = DB::table('lemburs')
            ->join('karyawans', 'lemburs.id_karyawan', '=', 'karyawans.id')
            ->select('lemburs.*', 'karyawans.nomor_induk', 'karyawans.nama_karyawan')
            ->get();

        return view('lembur.index', [
            'title' => 'Lembur',
            'lembur'  => $cuti,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lembur.create', [
            'title' => 'Lembur',
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
            'jumlah_jam' => 'required',
        ]);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_jam_lembur' => $request->jumlah_jam,
            ]);
        }

        Lembur::create([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_jam' => $request->jumlah_jam,
        ]);

        return redirect('/lembur')->with('success', 'Data Lembur berhasil ditambahkan.');
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
        return view('lembur.edit', [
            'title' => 'Cuti',
            'lembur' => Lembur::find($id),
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
            'jumlah_jam' => 'required',
        ]);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_jam_lembur' => $request->jumlah_jam,
            ]);
        }

        Lembur::where('id', $id)->update([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_jam' => $request->jumlah_jam,
        ]);

        return redirect('/lembur')->with('success', 'Data Lembur berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lembur = Lembur::find($id);

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $lembur['id_karyawan'])
            ->where('bulan', '=', $lembur['bulan'])
            ->where('tahun', '=', $lembur['tahun']);

        if (count($cek_data_gaji->get()) > 0) {
            $cek_data_gaji->update([
                'jumlah_jam_lembur' => 0,
            ]);
        }

        Lembur::destroy($id);
        return redirect('/lembur')->with('success', 'Data Lembur berhasil dihapus.');
    }
}
