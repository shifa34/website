@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid mt--7">
      <div class="row mt-5">
          <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                          <h3 class="mb-0">Karyawan</h3>
                      </div>
                    </div>
                    <br><br>
                    <form method="post" action="/karyawan-backend">
                      @csrf
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="example-text-input">
                      </div>
                  
                      <div class="form-group">
                        <label for="tgl_masuk" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="180" rows="10"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">No HP</label>
                        <input class="form-control" type="number" name="no_hp" id="example-text-input">
                      </div>
                      
                      <div class="form-group">
                        <label for="tipe_pembayaran_id" class="form-control-label">Posisi</label>
                        <select class="form-control" name="posisi_id">
                            @foreach ($posisis as $posisi)
                                <option value="{{ $posisi->id }}">{{ $posisi->nama }}</option>
                            @endforeach
                        </select>
                      </div>

                      <button class="btn btn-icon btn-primary" type="submit">
                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                          <span class="btn-inner--text">Submit</span>
                      </button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
      @endsection