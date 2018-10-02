@extends('layout')

@push('style')
  <style media="screen">
    .action-td {
      text-align: right;
    }
    .action-td .action-btn {
      margin-right: 0px;
      margin-left: 4px;
      padding-right: 0px;
      padding-left: 4px;
    }
  </style>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Daftar Olahraga</h4>
            <p class="category">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card-content">
            <table class="table">
              <tbody>
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td>
                      <p>{{Faker\Factory::create()->sentence}}</p>
                      <small>kategori: <i>@php
                        $kategori = array('Permainan', 'Terukur', 'Bela Diri');
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
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Tambah Olahraga</h4>
            <p class="category">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card-content">
            <form action="/olahraga/tambah" method="post">
              <div class="form-group label-floating">
                <label class="control-label">Nama Olahraga</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>
              <div class="form-group label-floating">
                <label class="control-label">Kategori Olahraga</label>
                <select class="form-control" name="cateogry">
                  <option value="Permainan">Permainan</option>
                  <option value="Terukur">Terukur</option>
                  <option value="Bela Diri">Bela Diri</option>
                </select>
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

@endsection
