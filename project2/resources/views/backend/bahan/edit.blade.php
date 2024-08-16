@extends('layouts.admin')

@section('main-content')


    <div class="container-fluid mt--7">
      <div class="row mt-5">
          <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                          <h3 class="mb-0">Bahan</h3>
                      </div>
                    </div>
                    <br><br>
                    <form method="post" action="/bahan-backend/{{$bahans->id}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nama</label>
                          <input class="form-control" type="text" name="nama" id="example-text-input" value="{{old('nama',$bahans->nama)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Stok</label>
                          <input class="form-control" type="text" name="stok" id="example-text-input" value="{{old('stok',$bahans->stok)}}">
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Harga</label>
                          <input class="form-control" type="text" name="harga" id="example-text-input" value="{{old('harga',$bahans->harga)}}">
                        </div>
                  
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