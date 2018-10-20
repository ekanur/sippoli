@extends('layout')

@push('style')
 <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
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
      <div class="col-md-9">
        <div class="card">
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Daftar Makanan</h4>
            <!-- <p class="category">Lorem ipsum dolor sit amet</p> -->
          </div>
          <div class="card-content">
            <table class="table">
              <thead>
                <tr>
                    <th align="center">#</th>
                    <th align="center">Nama Makanan</th>
                    <th align="center">Kategori</th>
                    <th align="center">Kalori</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1;
                @endphp
                @forelse($list_makanan as $list_makanan)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $list_makanan->nama }}</td>
                    <td>{{ $list_makanan->kategori }}</td>
                    <td>{{ $list_makanan->kalori }}</td>
                  </tr>
                @empty
                <tr>
                  <td colspan="4">
                    <h4 class="text-center text-muted">Makanan tidak tersedia.</h4>
                  </td>
                </tr>
                @endforelse


              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-3">
      	<div class="card">
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Tambah Makanan</h4>
            <!-- <p class="category">Lorem ipsum dolor sit amet</p> -->
          </div>
          <div class="card-content">
            <form action="/makanan/simpan" method="post">
              {{ csrf_field() }}
              <div class="form-group label-floating">
                <label class="control-label">Nama Makanan</label>
                <input class="form-control" type="text" name="nama" value="" required>
              </div>
              <div class="form-group label-floating">
                <label class="control-label">Kategori Makanan</label>
                <select class="form-control" name="kategori">
                  <option value="karbohidrat">Karbohidrat</option>
                  <option value="protein">Protein</option>
                  <option value="lemak">Lemak</option>
                  <option value="vitamin">Vitamin</option>
                  <option value="mineral">Mineral</option>
                  <option value="air">Air</option>
                </select>
              </div>
              <div class="form-group label-floating">
                <label class="control-label">Kalori</label>
                <input class="form-control" type="number" name="kalori" value="" min=1 required>
              </div>
              <div class="text-center">
                <button class="btn btn-info" type="submit">Tambah</button>
              </div>
            </form>
          </div>
      	</div>
      </div>
    </div>
  </div>

@endsection

@push('script')
  <script type="text/javascript" src="{{ url('/js/datatables.min.js') }}"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      $(".table").DataTable();
    });
  </script>
@endpush