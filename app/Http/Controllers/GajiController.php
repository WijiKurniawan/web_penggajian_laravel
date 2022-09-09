<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GajiController extends Controller
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
        $gaji = DB::table('gajis')
            ->join('karyawans', 'gajis.id_karyawan', '=', 'karyawans.id')
            ->join('jabatans', 'karyawans.id_jabatan', '=', 'jabatans.id')
            ->join('cabangs', 'karyawans.id_cabang', '=', 'cabangs.id')
            ->select('gajis.*',
                'karyawans.nomor_induk',
                'karyawans.nama_karyawan',
                'karyawans.jumlah_anak',
                'karyawans.gaji_pokok',
                'jabatans.tunjangan',
                'cabangs.uang_makan')
            ->get();

        return view('gaji.index', [
            'title' => 'Gaji',
            'gaji'  => $gaji,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gaji.create', [
            'title' => 'Gaji',
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
        $cek_lembur = DB::table('lemburs')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun)
            ->get();
        $lembur = count($cek_lembur) > 0 ? $cek_lembur[0]->jumlah_jam : 0;

        $cek_cuti = DB::table('cutis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun)
            ->get();
        $cuti = count($cek_cuti) > 0 ? $cek_cuti[0]->jumlah_cuti : 0;

        $cek_data_gaji = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun)
            ->get();

        if (count($cek_data_gaji) > 0)
            return redirect('/gaji/create')->with('error', 'Data Gaji sudah ada.');

        Gaji::create([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_jam_lembur' => $lembur,
            'jumlah_cuti' => $cuti,
        ]);

        return redirect('/gaji')->with('success', 'Data Gaji berhasil ditambahkan.');
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
        return view('gaji.edit', [
            'title' => 'Gaji',
            'karyawan' => Karyawan::all(),
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'gaji' => Gaji::find($id)
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
        $cek = DB::table('gajis')
            ->where('id_karyawan', '=', $request->id_karyawan)
            ->where('bulan', '=', $request->bulan)
            ->where('tahun', '=', $request->tahun)
            ->get();

        if (count($cek) > 0)
            return redirect('/gaji/' . $id . '/edit')->with('error', 'Data Gaji sudah ada.');

        Gaji::where('id', $id)->update([
            'id_karyawan' => $request->id_karyawan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect('/gaji')->with('success', 'Data Gaji berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gaji::destroy($id);
        return redirect('/gaji')->with('success', 'Data Gaji berhasil dihapus.');
    }
}
