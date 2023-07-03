<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('simpanans')
                ->join('members', 'members.id', '=', 'simpanans.member_id')
                ->join('users', 'users.id', '=', 'members.user_id')
                ->select('simpanans.id', 'users.name', 'simpanans.member_id', 'simpanans.tanggal', 'simpanans.jumlah', 'simpanans.jenis_simpanan', 'simpanans.keterangan')
                ->get();

      return view('admin.simpanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = DB::table('members')
                    ->join('users', 'members.user_id', '=', 'users.id')
                    ->select('members.id', 'members.member_code', 'users.name')
                    ->paginate(10);
        // return response()->json($member);
        return view('admin.simpanan.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSimpananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'member_id' => 'required',
            'tanggal' => 'required',
            'jenis_simpanan' => 'required',
            'jumlah' => 'required',
        ]);

        $simpan = DB::table('simpanans')->insert([
            'member_id' => $request->member_id,
            'tanggal' => $request->tanggal,
            'jenis_simpanan' => $request->jenis_simpanan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('admin/simpanan')
                            ->with('success','Berhasil menambahkan simpanan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimpananRequest  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        //
    }
}
