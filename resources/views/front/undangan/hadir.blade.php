@extends('layouts.main')
@section('content')

    <div class="container" data-aos="fade-up">
           {{-- <div class="section-title">
               <h3>BERITA TERBARU</h3>
               <p>Kabar Terbaru Seputar Bantuan Sosial Kab Demak</p>
               <hr>
           </div> --}}
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{ Session('success') }}
                </div>
            @endif

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <a href="{{ route('undangan.create') }}" class="btn btn-primary float-right text-white font-weight-bold">Tambah Tamu</a>
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu</h6> --}}
                    <a href="{{ route('undangan.create') }}" class="btn bg-gradient-info float-right text-white btn-icon-split">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Tamu
                    </a>
                    {{-- <a href="{{ route('exportundangan') }}" class="mr-2 btn bg-gradient-info float-right text-white btn-icon-split">
                        <i class="fas fa-download"></i>
                        Export
                    </a> --}}
                    <h5 class="m-0 font-weight-bold text-info">Daftar Undangan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <td>Konfirmasi</td>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th width="100px" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($undangan as $result => $item)
                            <tr>
                                <td>
                                    @if ($item->status == 0)
                                    {{-- <a href="{{ url('undangan/status/'.$item->id)}}" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a> --}}
                                        <a href="{{ url('undangan/status/'.$item->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
                                    @else
                                        <a href="{{ url('undangan/status/'.$item->id)}}" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
                                    @endif
                                </td>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jabatan}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->kategori}}</td>
                                <td>
                                    <label class="badge  {{ ($item->status == 1) ? 'badge-success' : 'badge-danger'}}">{{ ($item->status == 1) ? 'Hadir' : 'Belum Hadir' }}</label>
                                </td>
                                <td>
                                    <form action="{{ route('undangan.destroy', $item->id )}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('undangan.edit', $item->id ) }}" class="btn bg-gradient-primary btn-sm text-white">Edit</a>
                                        <button type="submit" class="btn bg-gradient-danger btn-sm text-white" onclick="return confirm('apa kamu yakin akan menghapus data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            {{-- {{ $undangan->links() }} --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


@endsection
