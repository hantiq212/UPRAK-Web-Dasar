@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
      <h1>Produk Ci Mehong</h1>
    </div>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{url('product')}}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{url('product/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Nama Produk</th>
                    <th class="col-md-4">Qty</th>
                    <th class="col-md-2">Harga</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem()?>
                @foreach ($data as $item)
                    
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->harga}}</td>
                    <td>
                        <a href='{{url('product/'.$item->nama_barang.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline" action="{{url('product/'.$item->nama_barang)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                        
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
       {{$data->links()}}
  </div>
  <!-- AKHIR DATA -->
@endsection
