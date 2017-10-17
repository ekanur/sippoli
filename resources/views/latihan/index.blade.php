@extends('layout')

@push('style')
  <style media="screen">
  .tab-pane td a{
    text-transform: capitalize;
  }
  </style>
@endpush

@section('content')

<!--
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
  // tanya = confirm("Anda yakin akan menghapus data ini?");
 $("#delete_item_id").val( $('p').get(0).id );
 $('#delete_confirmation_modal').modal('show');
 // if (tanya == true) return true;
 // else return false;
 }
 </script> -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-nav-tabs">
          <div class="card-header" data-background-color="purple">
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
          <div class="card-content">
            <div class="tab-content">
              <div class="tab-pane active" id="semua">
                <table class="table">
                  <tbody>
                      @foreach($daftarsemuaLatihan as $daftarsemuaLatihan)
                      <tr>
                        <td><a href="{{ url('/latihan/'.$daftarsemuaLatihan->id) }}">{{$daftarsemuaLatihan->nama}}</a></td>
                      </tr>
                      @endforeach
                    <!-- @for ($i=0; $i < 10; $i++)
                      <tr>
                        <td>
                          <a href="/latihan/id">{{Faker\Factory::create()->sentence(2, 4)}}</a><br>
    {{--                       <small class="material-icons">bookmark <i>@php
                            $kategori = array('Latihan Fisik', 'Latihan Cabor');
                            echo $kategori[array_rand($kategori)];
                          @endphp</i></small>&emsp;|&emsp;<small>oleh: <i>{{Faker\Factory::create()->name}}</i></small> &nbsp; |  --}}
                        </td>
                      </tr>
                    @endfor -->
                  </tbody>
                </table>
              </div>


              <div class="tab-pane" id="dari_saya">
                <table class="table">
                  <tbody>

                    @foreach($daftardariPelatih as $daftardariPelatih)
                    <tr>
                      <td><a href="{{ url('/latihan/'.$daftarsemuaLatihan->id) }}">{{$daftardariPelatih->nama}}</a></td>

                      <td>
                          <!-- <a href="{{url('/latihan')}}"><i class="material-icons" onclick="return konfirmasi()">delete</i> </a> -->
                          <!-- <a href="{{url('/latihan')}}"><i class="material-icons" onclick="konfirmasi()">delete</i></a> -->
                          <!-- <button  class="btn btn-link" onclick="konfirmasi()">delete
                          </button> -->

                         <!-- <div style="cursor:pointer"><i class="material-icons" onclick="return konfirmasi()">delete</i></div> -->
                            <a data-toggle="modal" href="{{url('/latihan/'.$daftarsemuaLatihan->id.'/edit')}}"><i class="material-icons">mode_edit</i></a>
                           <a href="{{ url('/latihan/hapus/'.$daftardariPelatih->id) }}" class="del-confrim_list_latihan" data-text="Apakah anda yakin ingin menghapus item tersebut?"><i class="material-icons">delete</i></a>
                          <!-- Delete Modal content konfirmasi Hapus-->
                          <!-- <div class="modal fade" id="delete_confirmation_modal" role="dialog" style="display: none;" data-backdrop="false">
                              <div class="modal-dialog" style="margin-top: 260.5px;">
                                          <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">x</button>
                                          <h4 class="modal-title">Apakah daftar latihan akan dihapus ?</h4>
                                      </div>
                                      <form role="form" method="post" action="#" id="delete_data">
                                          <input type="hidden" id="delete_item_id" name="id" value="12">
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-danger">Iya</button>
                                              <button type="button" class="btn btn btn-success" data-dismiss="modal">Tidak</button>
                                          </div>
                                      </form>
                                  </div>

                              </div>
                          </div> -->
                      </td>
                    </tr>
                    @endforeach

                    <!-- @for ($i=0; $i < 3; $i++)
                      <tr>
                        <td>
                          <a href="/latihan/id">{{Faker\Factory::create()->sentence(2, 4)}}</a><br>
    {{--                       <small class="material-icons">bookmark <i>@php
                            $kategori = array('Latihan Fisik', 'Latihan Cabor');
                            echo $kategori[array_rand($kategori)];
                          @endphp</i></small>&emsp;|&emsp;<small>oleh: <i>{{Faker\Factory::create()->name}}</i></small> &nbsp; |  --}}
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
                    @endfor -->
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4">
      	<div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Tambah Latihan</h4>
          </div>
          <div class="card-content">
<!--             <div class="form-group label-floating">
              <label class="control-label">Kategori Latihan</label>
              <select class="form-control" name="cateogry">
                <option value="Metode Latihan Fisik">Latihan Fisik</option>
                <option value="Metode Latihan Cabor Or">Latihan Cabor</option>
              </select>
            </div> -->
            <div class="text-center">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahLatihan">Tambah</button>
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

    </div>
  </div>

@endsection

@push('modal')
  <!-- Modal untuk ubah latihan -->
      <div id="EditLatihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
  </script>
@endpush


