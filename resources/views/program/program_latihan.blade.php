@extends("layout")
@push('style')
    <style type="text/css">
        #menu_program{
            margin:auto;margin-bottom:20px;
        }
        #menu_program >li{
            float: none; display: inline-block;
        }
    </style>
@endpush
@section("content")
<div class="row-center">
    <div class="col-md-12 col-md-offset-0">
{{--         <h3 class="title text-center">PROGRAM LATIHAN DAN PROGRAM MAKAN</h3>
        <br> --}}
        <div class="nav-center">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons text-center" role="tablist"   id="menu_program">
                <!--
    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
-->
                <li>
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">info</i>Deskripsi
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/1/atlet') }}" role="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                    </a>
                </li>
                <li class="active">
                    <a href="{{ url('/program/1/mikro') }}" role="tab">
                        <i class="material-icons">directions_run</i>Program Latihan
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/1/makanan') }}" role="tab">
                        <i class="material-icons">restaurant</i>Program Makan
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="prolat">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                            <h4 class="card-title">Rancangan Program Latihan</h4> 
                            <p class="category">
                                Penyusunan siklus mikro dan sesi latihan tiap hari.
                            </p>
                    </div>

                    <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                        <div class="row">
                                             <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Tanggal</label>
                                                          <strong>{{ date('D m-d-Y', strtotime('05/13/2017')) }}</strong>
                                                        </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tahapan</label>
                                                    <strong>TPU</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                            <label class="control-label">Kriteria</label>
                                                        <span class="label label-success">Rendah</span>
                                                    </div>
                                            </div>
                                            <div class="col-md-5">  
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materi Latihan</label>
                                                    <strong>Materi 1, materi 3</strong>
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas Max</label>
                                                    <strong>Intesitas 1, Max Intesitas 2</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume Max</label>
                                                    <strong>Volume Max1, Volume Max2</strong>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <div class="row">
                                        <form action="{{ url('/program/sesi-latihan/'.$id_sesi_latihan.'/simpan') }}" method="post">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                        <hr>
                                        </div>
                                        
                                        <div class="col-md-2">

                                            <div class="form-group label-floating">
                                                          <label class="control-label">Waktu</label>
                                                          <select class="form-control" name="waktu">
                                                              <option value="pagi">Pagi (05.00-08.00)</option>
                                                              <option value="siang">Siang (13.00-14.00)</option>
                                                              <option value="sore">Sore (16.00-18.00)</option>
                                                          </select>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Jenis Latihan</label>
                                                          <select class="form-control" name="jenis_latihan">
                                                              <option value="pemanasan">Pemanasan</option>
                                                              <option value="inti">Inti</option>
                                                              <option value="pendinginan">Pendinginan</option>
                                                          </select>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Latihan</label>
                                                        <select class="form-control" name="list_latihan" >
                                                          <optgroup label="Latihan Fisik">
                                                              <option value="1">CIRCUIT TRAINING</option>
                                                              <option value="2">INTERVAL TRAINING</option>
                                                              <option value="3">SISTEM AEROBIC</option>
                                                          </optgroup>
                                                          <optgroup label="Latihan Cabor">
                                                              <option value="4">LATIHAN TEKNIK</option>
                                                              <option value="5">LATIHAN TAKTIK</option>
                                                          </optgroup>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Volume</label>
                                                          <input type="text" name="volume" class="form-control">
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Intensitas</label>
                                                          <input type="text" name="intensitas" class="form-control">
                                                        </div>
                                        </div>
                                        <div class="col-md-1">
                                                <button class="btn btn-info">Tambah</button>
                                        </div>
                                    </form>
                                    </div>

                                </div>
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sesi</th>
                                            <th>Jenis</th>
                                            <th>Latihan</th>
                                            <th>Vol</th>
                                            {{-- <th>Sesi Latihan</th> --}}
                                            <th>Intensitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (null == sizeof($program_latihan))
                                            <tr>
                                                 <td colspan="6">
                                                <h4 class="text-muted text-center">Sesi Latihan Belum Tersedia</h4>
                                            </td>
                                            </tr>
                                        @endif

                                        @isset ($program_latihan)
                                            @foreach ($program_latihan as $list_latihan)
                                            <tr>
                                                <td>{{ $list_latihan->waktu }}</td>
                                                <td>{{$list_latihan->jenis_latihan}}</td>
                                                {{-- <td>{{$list_latihan->list_latihan_id}}</td> --}}
                                                <td>SISTEM AEROBIC</td>
                                                <td>{{$list_latihan->volume}}</td>
                                                <td>{{$list_latihan->intensitas}}</td>
                                                {{-- <td><a href="">Lihat</a></td> --}}
                                                <td>
                                                    <a href="{{ url('') }}"><small class="material-icons">mode_edit</small></a> 
                                                    <a href="{{ url('') }}"><small class="material-icons">delete</small></a>
                                                    <a href="{{ url('') }}"><i class="material-icons">content_copy</i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endisset

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                    </div>
{{--                       <div class="col-md-3">
                        Nama atlet
                      </div> --}}
{{--                         <div class="row col-md-2">
                          <label for="hari">HARI</label> <br>
                          <select name="Hari">
                            <option value="">Pilih</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>
                        </div> --}}

                        {{-- <div class="row col-md-2">
                          <label for="hari">SESI</label> <br>
                          <select name="sesi">
                            <option value="">Pilih</option>
                            <option value="senin">Pagi</option>
                            <option value="selasa">Siang</option>
                            <option value="rabu">Sore</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">ITEM LATIHAN </label> <br>
                          <select name="itemlatihan">
                            <option value="">Pilih</option>
                            <option value="senin">Lari</option>
                            <option value="selasa">Sit Up</option>
                            <option value="rabu">Back Up</option>
                          </select>
                        </div> --}}

                        {{-- <div class="row">
                          <button type="submit" class="btn btn-info">Tambah</button>
                        </div> --}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();
        });
    </script>
@endpush
