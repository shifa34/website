@extends('layouts.admin')

@section('main-content')


    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="col">
                        <div class="row align-items-center">
                                <h3 class="mb-0">Pelanggan</h3>
                            </div>         
                            <div class="col text-right">
                                <a href="/pelanggan-backend/create" class="btn btn-sm btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                    {{session('pesan')}}
                    </div>
                    @endif
                    @if (session()->has('pesanHapus'))
                    <div class="alert alert-danger" role="alert">
                    {{session('pesanHapus')}}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)    
                                <tr>
                                    <th scope="row">
                                        {{$pelanggan->nama}}
                                    </th>
                                    <td>
                                        {{$pelanggan->deskripsi}}
                                    </td>
                                    <td>
                                        {{$pelanggan->alamat}}
                                    </td>
                                    <td>
                                        {{$pelanggan->no_hp}}
                                    </td>
                                    <td class="text-center">
                                        <a class="text-center" href="/pelanggan-backend/{{$pelanggan->id}}/edit">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                        <form action="pelanggan-backend/{{$pelanggan->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                        </form> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{$pelanggans->links('pagination::bootstrap-5')}}
    
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush