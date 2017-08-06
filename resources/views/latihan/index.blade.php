@extends('layout')

@push('style')
  <style media="screen">

  </style>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Daftar Latihan</h4>
            <p class="category">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card-content">
            <table class="table">
              <tbody>
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td>
                      <a href="/latihan/id">{{Faker\Factory::create()->sentence(2, 4)}}</a><br>
                      <small>kategori: <i>@php
                        $kategori = array('Metode Latihan Fisik', 'Metode Latihan Cabor Or');
                        echo $kategori[array_rand($kategori)];
                      @endphp</i></small>&emsp;|&emsp;<small>oleh: <i>{{Faker\Factory::create()->name}}</i></small>
                    </td>
                    {{-- <td class="action-td">
  										<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs action-btn">
  											<i class="material-icons">edit</i>
  										</button>
  										<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs action-btn">
  											<i class="material-icons">close</i>
  										</button>
  									</td> --}}
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-4">
      	<div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Tambah Latihan</h4>
            <p class="category">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card-content">
            <div class="form-group label-floating">
              <label class="control-label">Kategori Latihan</label>
              <select class="form-control" name="cateogry">
                <option value="Metode Latihan Fisik">Metode Latihan Fisik</option>
                <option value="Metode Latihan Cabor Or">Metode Latihan Cabor Or</option>
              </select>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahLatihan">Tambah</button>
            </div>
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
