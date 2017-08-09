@extends('layout')
@section('content')
  <div class="container-fluid">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" data-background-color="red">
          <div class="pull-left">
            <h4 class="title">Daftar Program Berlangsung</h4>
            <p class="category">Berikut adalah daftar Program anda yang sedang berlangsung</p>
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
                <th>Program</th>
                <th>Atlet</th>
                <th>Progress</th>
              </tr>
            </thead>
            <tbody>
              @for ($i=0; $i < random_int(5, 10); $i++)
                <tr>
                  <td>{{Faker\Factory::create()->sentence}}</td>
                  <td>{{Faker\Factory::create()->name}}</td>
                  <td>{{random_int(0, 100)}}%</td>
                </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="#pablo">
            <img class="img" src="/uploads/sample-{{random_int(1, 3)}}.jpg" style="min-height: 130px; min-width: 130px;"/>
          </a>
        </div>

        <div class="content">
          <h4 class="card-title">{{Faker\Factory::create()->name}}</h4>
          <p class="card-content">
            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
          </p>
          <a href="/pelatih" class="btn btn-primary btn-round">Ubah</a>
        </div>
      </div>
    </div>
  </div>
@endsection
