@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{url('product')}}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <h1>Tambahkan Produk</h1>
          </div>
        <a href="{{url('product')}}" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_barang' value="{{Session::get ('nama_barang')}}" id="nama_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="qty" class="col-sm-2 col-form-label">Qty</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='qty' value="{{Session::get ('qty')}}" id="qty">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='harga' value="{{Session::get ('harga')}}" id="harga">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>

    </div>
</form>
    <!-- AKHIR FORM -->
@endsection