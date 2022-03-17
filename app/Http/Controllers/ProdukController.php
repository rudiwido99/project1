<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function data()
    {
        $produk = DB::table('produk')->get();
                                                                                                    //dd($produk);
                                                                                                    //return $produk;
        //return view('produk.data',['produk' => $produk]);
        return view('produk.data', compact('produk'));
    }

    public function add()
    {
        return view('produk.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama produk tidak boleh kosonng'
        ]);

        DB::table('produk')->insert([
            'name' => $request->name,
            'desc' => $request->desc
        ]);
        return redirect('produk')->with('status', 'Produk Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id', $id)->first();
        return view('produk/edit', compact('produk'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'desc' => 'required',
        ]);
        
        DB::table('produk')->where('id', $id)
            ->update([
                'name' => $request->name,
                'desc' => $request->desc
            ]);
        return redirect('produk')->with('status', 'Produk Berhasil Diupdate!');
    }
    public function delete($id)
    {
        DB::table('produk')->where('id', $id)->delete();
        return redirect('produk')->with('status', 'Produk Berhasil Dihapus!');
    }
}
