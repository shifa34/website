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
                    <form method="post" action="/karyawan-backend/{{$karyawans->id}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nama</label>
                          <input class="form-control" type="text" name="nama" id="example-text-input" value="{{old('nama',$karyawans->nama)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="tgl_masuk" class="form-label">Alamat</label>
                          <textarea name="alamat" id="" class="form-control" cols="180" rows="10">{{old('alamat',$karyawans->alamat)}}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">No Telp</label>
                          <input class="form-control" type="number" name="no_hp" id="example-text-input" value="{{old('nama_karyawan',$karyawans->no_hp)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="tipe_pembayaran_id" class="form-control-label">Posisi</label>
                          <select class="form-control" name="posisi_id">
                              @foreach ($posisis as $posisi)
                                @if (old('posisi_id', $posisi->id) == $posisi->id)
                                  <option value="{{ $posisi->id }}" selected>{{ $posisi->nama }}</option>
                                @else
                                  <option value="{{ $posisi->id }}">{{ $posisi->nama}}</option>
                                @endif
                              @endforeach
                          </select>
                        </div>
                  
                      {{-- <div class="mb-2">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir')}}">
                        @error('tgl_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div> --}}
                  
                      <button class="btn btn-icon btn-primary" type="submit">
                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                          <span class="btn-inner--text">Update</span>
                      </button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
      @endsection