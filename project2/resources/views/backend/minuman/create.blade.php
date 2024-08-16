@extends('layouts.admin')

@section('main-content')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Minuman</h3>
                            </div>
                        </div>
                        <br><br>
                        <form method="post" action="/minuman-backend" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Minuman</label>
                                <input type="text" class="form-control" name="nama">
                            </div>

                            <div class="form-group">
                                <label for="tgl_transaksi" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga">
                            </div>

                            <div class="form-group">
                                <label for="tgl_transaksi" class="form-label">Resep</label><br>
                                <textarea name="resep" class="form-control" id="" cols="180" rows="10"></textarea>
                            </div>

                            <div class="mb-2">
                                <label for="foto" class="form-label">Foto</label>
                                <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{ old('foto') }} " onchange="test()">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="test"></div>
                            <script>
                                function test() {
                                    document.querySelector('#test').innerHTML = document.querySelector('#foto').value
                                }
                            </script>
                            <button class="btn btn-icon btn-primary" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">Submit</span>
                            </button>
                            
                            @push('js')
                                <script>
                                    const input = document.getElementById('foto');
                                    const preview = document.getElementById('file-preview');
                            
                                    input.addEventListener("change", function () {
                                        const file = input.files[0];
                                        const reader = new FileReader();
                            
                                        reader.onload = function (event) {
                                            preview.src = event.target.result;
                                        };
                            
                                        reader.readAsDataURL(file);
                                    });
                                </script>
                            @endpush
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection