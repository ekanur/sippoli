@extends('layout')

@push('style')
  <style media="screen">

  </style>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">{{Faker\Factory::create()->sentence(2, 4)}}</h4>
            <p class="category">
              @php
                $kategori = array('Metode Latihan Fisik', 'Metode Latihan Cabor Or');
                echo $kategori[array_rand($kategori)];
              @endphp
            </p>
          </div>
          <div class="card-content">
            <center>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/TKEbws4QhEk?list=PLIkr8BShfBjm1JqAmPAq2SguhGIidgGk1&index={{random_int(1,200)}}" frameborder="0" allowfullscreen></iframe>
            </center>
            <br>
            <p>{{Faker\Factory::create()->paragraph(50, 75)}}</p>
            <br>
            <center>
              <a href="/latihan" type="button" class="btn btn-warning">Kembali</a>
            </center>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div id="tambahLatihan" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Latihan</h4>
            </div>
            <div class="modal-body">
              <form action="/latihan/tambah" method="post">
                <div class="row">
                  <div class="form-group label-floating col-md-6">
                    <label class="control-label">Nama Latihan</label>
                    <input class="form-control" type="text" name="name" value="" required>
                  </div>
                  <div class="form-group label-floating col-md-6">
                    <label class="control-label">Kategori Latihan</label>
                    <select class="form-control" name="cateogry">
                      <option value="Metode Latihan Fisik">Metode Latihan Fisik</option>
                      <option value="Metode Latihan Cabor Or">Metode Latihan Cabor Or</option>
                    </select>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" rows="6" cols="80"></textarea>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Link Vidio Latihan</label>
                  <input class="form-control" type="text" name="video" value="">
                </div>
                <div class="text-right">
                  <button class="btn btn-success btn-sm" type="submit">Tambah</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
