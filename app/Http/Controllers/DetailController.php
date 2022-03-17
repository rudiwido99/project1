<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Barang;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::with('barang')->get();

        // return view('detail/index');
        // return $detail;
        return view('detail/index', compact('detail')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Barang::all();
        return view ('detail.create', compact('produk'));
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
            'name' => 'required|min:4',
            'produk_id' => 'required',
        ], [
            'produk_id.required' => 'Kategori produk tidak boleh kosonng'
        ]);
        
        // return $request;

        // Cara Menambah Data di Detail Produk

        //cara ke 1 
        // $detail = new Detail;
        // $detail->na me = $request->name;
        // $detail->produk_id = $request->produk_id;
        // $detail->harga = $request->harga;
        // $detail->ukuran = $request->ukuran;
        // $detail->info = $request->info;
        // $detail->save();

        //cara ke 2 : mass assignment
        // Detail::create([
        //     'name' => $request->name,
        //     'produk_id' => $request->produk_id,
        //     'harga' => $request->harga,
        //     'ukuran' => $request->ukuran,
        //     'info' => $request->info,
        // ]);

        //cara ke 3 : quick mass assignment -> syarat nama filed dan inputan harus sama
        Detail::create($request->all());

        //cara ke 4 : gabungan
        // $detail = new Detail([
        //     'name' => $request->name,
        //     'produk_id' => $request->produk_id,
        //     'harga' => $request->harga,
        //     'ukuran' => $request->ukuran,
        //     'info' => $request->info,
        // ]);
        // $detail->harga = $request->harga;
        // $detail->save();

        return redirect('detail')->with('status', 'Produk Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        // return $detail;
        return view('detail/show', compact('detail')); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        $produk = Barang::all();
        return view('detail/edit', compact('detail','produk')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'name' => 'required|min:4',
            'produk_id' => 'required',
        ], [
            'produk_id.required' => 'Kategori produk tidak boleh kosonng'
        ]);
        // return $request;
        //cara ke 1
        // $detail->name = $request->name;
        // $detail->produk_id = $request->produk_id;
        // $detail->harga = $request->harga;
        // $detail->ukuran = $request->ukuran;
        // $detail->info = $request->info;
        // $detail->save();

        // cara ke 2 mass assignment
        Detail::where('id', $detail->id)
            ->update([
                    'name' => $request->name,
                    'produk_id' => $request->produk_id,
                    'harga' => $request->harga,
                    'ukuran' => $request->ukuran,
                    'info' => $request->info,
                ]);

    return redirect('detail')->with('status', 'Produk Berhasil Diupdate!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //cara ke 1
        $detail->delete();
        return redirect('detail')->with('status', 'Produk Berhasil Dihapus!');
    }
}
