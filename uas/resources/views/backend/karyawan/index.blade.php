@extends('layouts.admin')

@section('main-content')


    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="col">
                        <div class="row align-items-center">
                                <h3 class="mb-0">karyawan</h3>
                            </div>         
                            <div class="col text-right">
                                <a href="/karyawan-backend/create" class="btn btn-sm btn-primary">Tambah</a>
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
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $karyawan)    
                                <tr>
                                    <th scope="row">
                                        {{$karyawan->nama}}
                                    </th>
                                    <td>
                                        {{$karyawan->alamat}}
                                    </td>
                                    <td>
                                        {{$karyawan->no_hp}}
                                    </td>
                                    <td>
                                        {{$karyawan->posisi->nama}}
                                    </td>
                                    <td class="text-center">
                                        <a class="text-center" href="/karyawan-backend/{{$karyawan->id}}/edit">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                        <form action="karyawan-backend/{{$karyawan->id}}" method="post">
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
    
    {{$karyawans->links('pagination::bootstrap-5')}}
    
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush