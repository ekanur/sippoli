@extends('layout')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Tambah Program</h4>
            <p class="category">Isi form di bawah ini untuk menambahkan program</p>
          </div>
          <div class="card-content">
            <form action="" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nama Program</label>
                    <input class="form-control" type="text" name="nama" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Jangka Program</label>
                    <select class="form-control" name="jangka">
                      <option value="pendek">Pendek</option>
                      <option value="menengah">Menengah</option>
                      <option value="panjang">Panjang</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group label-floating">
                    <label class="control-label">Deskripsi Program</label>
                    <textarea class="form-control" name="deskripsi" rows="8" cols="80"></textarea>
                  </div>
                </div>
              </div>
              <center>
                <button class="btn btn-primary" type="submit">Tambah</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
