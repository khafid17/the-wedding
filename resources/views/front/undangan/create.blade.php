@extends('layouts.main')
@section('content')

  @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	  </div>
  	@endforeach
  @endif

  <div class="container">
      @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
          {{ Session('success') }}
          </div>
      @endif
      <div class="col-lg-12 order-lg-1">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Tambah Daftar Tamu</h6>
              </div>
              <div class="card-body">
                  <form action="{{ route('undangan.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="{{old('jabatan')}}">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{old('alamat')}}">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="{{old('kategori')}}">
                  </div>

                  <div class="form-group">
                      <button class="btn bg-gradient-info btn-block text-white">Simpan</button>
                  </div>

                  </form>
              </div>
          </div>
      </div>
  </div>

@endsection
