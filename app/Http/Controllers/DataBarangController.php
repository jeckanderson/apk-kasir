<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Barang::latest();

        if(request('search')) {
            $user->where('kode_barang', 'like', '%' . request('search') . '%')
                    ->orWhere('nama_barang', 'like', '%' . request('search') . '%')
                    ->orWhere('harga_barang', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.barang.index', [
            'title' => 'Data Barang',
            'barangs' => $user->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.create', [
            'title' => 'Form Tambah Data Barang',
            // 'users' => Barang::all()
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
        $attr = $request->validate([
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'harga_barang' => ['required']
        ]);

        Barang::create($attr);

        return redirect('dashboard/barang')->with('success', 'Data Barang di Tambahkan');
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
    public function edit(Barang $barangs)
    {
        return view('dashboard.barang.edit', [
            'title' => 'Form Edit Barang',
            'barang' => $barangs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $barangs)
    {
        $attr = $request->validate([
            'kode_barang' => ['required','unique:barangs'],
            'nama_barang' => 'required',
            'harga_barang' => 'required'
        ]);

        Barang::where('id', $barangs->id)->update($attr);

        return redirect('dashboard/barang')->with('success', 'Data User di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barangs)
    {
        $barangs->delete();

        return redirect('dashboard/barang')->with('success', 'Data barang di Hapus');
    }
}
