@extends('layout')

@push('style')
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <style media="screen">
  .tab-pane td a{
    text-transform: capitalize;
  }
  </style>
@endpush

@section('content')

<!--
@if(Session::has('sukses_tambah_latihan'))
  <div class="alert alert-success">
    <a href="/latihan" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span> Nama latihan <u>{{Session::get('sukses_tambah_latihan')}}</u>, berhasil di tambahkan</span>
  </div>
@endif -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-nav-tabs">
          <div class="card-header" data-background-color="blue">
            <div class="pull-left">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="active">
                        <a href="#semua" data-toggle="tab" aria-expanded="false">
                          <i class="material-icons">public</i>
                          Semua
                        <div class="ripple-container"></div></a>
                      </li>
                      <li class="">
                        <a href="#dari_saya" data-toggle="tab" aria-expanded="true">
                          <i class="material-icons">local_library</i>
                          Dari saya
                        <div class="ripple-container"></div></a>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="pull-right">
                <a href="#" data-toggle="modal" data-target="#tambahLatihan"><i class="material-icons">add_circle</i></a>
            </div>
            <div class="clearfix"></div>
            
          </div>
          <div class="card-content">
            <div class="tab-content">
              <div class="tab-pane active" id="semua">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="100%">Nama</th>
                      </tr>
                    </thead>
                  <tbody>
                      @foreach($daftarsemuaLatihan as $daftarsemuaLatihan)
                      <tr>
                        <td><a href="{{ url('/latihan/'.$daftarsemuaLatihan->id) }}">{{$daftarsemuaLatihan->nama}}</a> <small class="text-muted">{{ $daftarsemuaLatihan->kategori }} - {{ ucwords($daftarsemuaLatihan->cabor->nama) }}</small></td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>


              <div class="tab-pane" id="dari_saya">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th width="95%">Nama</th>
                      <th width="5%">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($daftardariPelatih as $daftardariPelatih)
                    <tr>
                      <td><a href="{{ url('/latihan/'.$daftardariPelatih->id) }}">{{$daftardariPelatih->nama}}</a> <small class="text-muted">{{ $daftardariPelatih->kategori }} - {{ ucwords($daftardariPelatih->cabor->nama) }}</small></td>

                      <td>
                          <a href="{{url('/latihan/'.$daftardariPelatih->id.'/edit')}}"><small class="material-icons">mode_edit</small></a>
                          <a href="{{ url('/latihan/hapus/'.$daftardariPelatih->id) }}" class="del-confrim_list_latihan" data-text="Apakah anda yakin ingin menghapus item tersebut?"><small class="material-icons">delete</small></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Modal -->
      
    </div>
  </div>

@endsection

@push('modal')
  <div id="tambahLatihan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Latihan</h4>
            </div>
            <div class="modal-body">
              <form action="/latihan/tambah" method="post">
                  {{csrf_field()}}

                <div class="row">
                  <div class="form-group label-floating col-md-6">
                    <label class="control-label">Nama Latihan</label>
                    <input class="form-control" type="text" name="nameLatihan" value="" required>
                  </div>
                  <div class="form-group label-floating col-md-3">
                    <label class="control-label">Kategori Latihan</label>
                    <select class="form-control" name="cateogryLatihan" required="">
                      <option value="Latihan Fisik">Latihan Fisik</option>
                      <option value="Latihan Cabor">Latihan Cabor</option>
                    </select>
                  </div>
                  <div class="form-group label-floating col-md-3">
                    <label class="control-label">Cabang Olahraga</label>
                    <select class="form-control" name="cabor_id" required="">
                      @foreach($cabor as $cabor)
                        <option value={{ $cabor->id }}>{{ ucwords($cabor->nama) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_latihan" rows="6" cols="80"></textarea>
                </div>
                <div class="text-right">
                  <button class="btn btn-success btn-sm" type="submit">Tambah</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>

      <!-- Modal untuk ubah latihan -->
      <div id="EditLatihan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah Latihan</h4>
            </div>
            <div class="modal-body">
              <form action="/latihan/tambah" method="post">
                  {{csrf_field()}}

                <div class="row">
                  <div class="form-group label-floating col-md-6">
                    <label class="control-label">Nama Latihan</label>
                    <input class="form-control" type="text" name="nameLatihan" value="" required>
                  </div>
                  <div class="form-group label-floating col-md-3">
                    <label class="control-label">Kategori Latihan</label>
                    <select class="form-control" name="cateogryLatihan">
                      <option value="Latihan Fisik">Latihan Fisik</option>
                      <option value="Latihan Cabor">Latihan Cabor</option>
                    </select>
                  </div>
                  <div class="form-group label-floating col-md-3">
                    <label class="control-label">Cabang Olahraga</label>
                    <select class="form-control" name="cabor_id">
                      <option value="1">Anggar</option>
                      <option value="2">Bisbol</option>
                      <option value="3">Bola Voli</option>
                      <option value="4">Boling</option>
                    </select>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_latihan" rows="6" cols="80"></textarea>
                </div>
                <div class="text-right">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();
            $('.del-confrim_list_latihan').confirm();
        });
    </script>
@endpush


@push('script')
  <script type="text/javascript" src="{{ url('/js/tinymce/jquery.tinymce.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('/js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('/js/datatables.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea',
      height:300,
      plugins: [
        'media image'
      ],
      toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });

    $(document).ready(function(){
      $(".table").DataTable();
    });
  </script>
@endpush


