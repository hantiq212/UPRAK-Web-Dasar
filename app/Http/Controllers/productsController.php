<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if(strlen($katakunci)){
            $data = products::where('nama_barang', 'like', "%$katakunci%")
                ->orWhere('qty', 'like', "%$katakunci%")
                ->orWhere('harga', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else{
            $data = products::orderBy('nama_barang', 'desc')->paginate(5);
        }
        return view('product.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_barang', $request->nama_barang);
        Session::flash('qty', $request->qty);
        Session::flash('harga', $request->harga);
        
        $request->validate([
            'nama_barang'=>'required',
            'qty'=>'required|numeric:products,qty',
            'harga'=>'required|numeric:products,harga',
            
        ],[
            'nama_barang.required'=> 'Nama Barang wajib diisi',
            'qty.required'=> 'qty wajib diisi',
            'qty.numeric'=> 'qty wajib angka',
            'harga.required'=> 'harga wajib diisi',
            'harga.numeric'=> 'harga wajib angka',
        ]);
        $data = [
            'nama_barang'=>$request->nama_barang,
            'qty'=>$request->qty,
            'harga'=>$request->harga,
        ];
        products::create($data);
        return redirect()->to('product')->with('success','Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = products::where('nama_barang',$id)->first();
        return view('product.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'qty'=>'required|numeric:products,qty',
            'harga'=>'required|numeric:products,harga',
            
        ],[
            'qty.required'=> 'qty wajib diisi',
            'qty.numeric'=> 'qty wajib angka',
            'harga.required'=> 'harga wajib diisi',
            'harga.numeric'=> 'harga wajib angka',
        ]);
        $data = [

            'qty'=>$request->qty,
            'harga'=>$request->harga,
        ];
        products::where('nama_barang',$id)->update($data);
        return redirect()->to('product')->with('success','Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        products::where('nama_barang', $id)->delete();
        return redirect()->to('product')->with('success', 'Berhasil menghapus data');
    }
}
