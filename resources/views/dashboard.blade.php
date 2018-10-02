@extends('layout')
@push('style')
<style media="screen">
  #profil_pelatih{
    margin-top:60px;
  }
</style>
@endpush
@section('content')
  <div class="container-fluid">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" data-background-color="blue">
          {{-- <div class="pull-left"> --}}
            <h4 class="title">Sistem Informasi Pengelolaan Pelatihan Olahraga</h4>
            {{-- <p class="category">Berikut adalah daftar Program anda yang sedang berlangsung</p> --}}
          {{-- </div> --}}
          {{-- <div class="pull-right">
            <a href="/program/baru"><i class="material-icons">add_circle</i></a>
          </div> --}}
          {{-- <div class="clearfix"></div> --}}
        </div>
        <div class="card-content">
          <h3><em>"Kontribusi kami untuk kejayaan olahraga Indonesia"</em></h3>
          {{-- <table class="table table-hover">
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
          </table> --}}
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-profile" id="profil_pelatih">
        <div class="card-avatar">
          <a href="#pablo">
            <img class="img" src="{{ asset("/img/logo_um.png") }}" style="min-height: 130px; min-width: 130px;"/>
          </a>
        </div>

        <div class="content">
          <h4 class="card-title">Dra. Sulistyorini, M.Pd</h4>
          <p class="card-content">
            Ketua Jurusan Pendidikan Kepelatihan Olahraga, Fakultas Ilmu Olahraga.<br/>
            <strong>Universitas Negeri Malang</strong>
          </p>
          {{-- <a href="/pelatih" class="btn btn-success">Ubah</a> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
