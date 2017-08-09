@extends('layout')
@push('style')
  <style media="screen">
    .nowrap {
      white-space: nowrap;
    }
  </style>
@endpush
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <div class="pull-left">
              <h4 class="title">Daftar Program</h4>
              <p class="category">Berikut adalah daftar program yang telah anda buat.</p>
            </div>
            <div class="pull-right">
              <a href="/program/tambah"><i class="material-icons">add_circle</i></a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="card-content">
            <table class="table table-hover">
              <thead class="text-danger">
                <tr>
                  <th>Nama</th>
                  <th>Jangka</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < random_int(7, 10); $i++)
                  <tr>
                    <td>{{Faker\Factory::create()->sentence}}</td>
                    <td>{{array('Pendek', 'Menengah', 'Panjang')[array_rand(array('1', '2', '3'))]}}</td>
                    <td>{{Faker\Factory::create()->paragraph}}</td>
                    <td class="nowrap">
                      <div align="right">
                        <a type="button" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        <a type="button" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                      </div>
                    </td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
