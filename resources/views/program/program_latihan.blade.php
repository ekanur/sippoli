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
          @include("components.program_menu")
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="prolat">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                            <h4 class="card-title">Rancangan Program Latihan</h4>
                            <p class="category">
                                Penyusunan siklus mikro dan sesi latihan tiap hari.
                            </p>
                    </div>

                    <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <ol class="breadcrumb">
                                      <li><a href="#">Siklus Mikro</a></li>
                                      <li><a href="/program/{{$siklus_mikro->program_id}}/mikro/{{$siklus_mikro->id}}">{{-- {{$siklus_mikro->namaBulan()}}, --}} Pekan ke {{$siklus_mikro->pekan_ke}}</a></li>
                                      <li>{{ date('D m-d-Y', strtotime($sesi_latihan->tanggal)) }}</li>
                                    </ol>
                                </div>
                                <div class="panel-body">
                                        <div class="row">
{{--                                              <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Tanggal</label>
                                                          <strong>{</strong>
                                                        </div>
                                            </div> --}}
                                            <div class="col-md-2 col-xs-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fase</label>
                                                    <strong>{{ $siklus_mikro->fase() }}</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-4">
                                                <div class="form-group label-floating">
                                                            <label class="control-label">Kriteria</label>
                                                        <span class="label label-success">{{$sesi_latihan->kriteria_volume_intensitas}}</span>
                                                    </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materi Latihan</label>
                                                    <strong>
                                                      {{ implode(", ", json_decode($sesi_latihan->json_materi_latihan)) }}
                                                      
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas Max</label>
                                                    <strong>
                                                      {{ implode(", ",json_decode($sesi_latihan->json_intensitas_max)) }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume Max</label>
                                                    <strong>
                                                      {{ implode(", ", json_decode($sesi_latihan->json_volume_max)) }}
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
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
                                                            <td>{{$list_latihan->list_latihan->kategori}}-<a href="{{ url('/latihan/'.$list_latihan->list_latihan_id) }}" target="_blank">{{ucfirst($list_latihan->list_latihan->nama)}}</a></td>
                                                            <td>{{$list_latihan->volume}}</td>
                                                            <td>{{$list_latihan->intensitas}}</td>
                                                            {{-- <td><a href="">Lihat</a></td> --}}
                                                            <td>
                                                                <a href="{{ url('program/'.$id_program.'/mikro/'.$id_siklus_mikro.'/sesi-latihan/'.$id_sesi_latihan.'/menu-latihan/'.$list_latihan->id.'/edit') }}"><small class="material-icons">mode_edit</small></a>
                                                                <a href="{{ url('program/'.$id_program.'/sesi-latihan/'.$list_latihan->id.'/hapus') }}" class="del-confrim" data-text="Apakah anda yakin ingin menghapus item tersebut?"><small class="material-icons">delete</small></a>
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

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form @if (isset($detail_program_latihan))
                                      action="{{ url("/program/$id_program/mikro/$id_siklus_mikro/sesi-latihan/$id_sesi_latihan/menu-latihan/$id_program_latihan/update") }}"
                                    @else
                                        action="{{ url("/program/$id_program/mikro/$id_siklus_mikro/sesi-latihan/$id_sesi_latihan/menu-latihan/simpan") }}"
                                    @endif method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="sesi_latihan_id" value="{{ $id_sesi_latihan }}">
                                        <div class="col-md-2">

                                            <div class="form-group label-floating">
                                                          <label class="control-label">Waktu</label>
                                                          <select class="form-control" name="waktu" required="">
                                                              @if (isset($detail_program_latihan))
                                                                <option value="pagi" @if ($detail_program_latihan->waktu == "pagi")
                                                                  selected
                                                                @endif>Pagi (05.00-08.00)</option>
                                                                <option value="siang" @if ($detail_program_latihan->waktu == "siang")
                                                                  selected
                                                                @endif>Siang (13.00-14.00)</option>
                                                                <option value="sore" @if ($detail_program_latihan->waktu == "sore")
                                                                  selected
                                                                @endif>Sore (16.00-18.00)</option>
                                                              @else
                                                                <option value="pagi">Pagi (05.00-08.00)</option>
                                                                <option value="siang">Siang (13.00-14.00)</option>
                                                                <option value="sore">Sore (16.00-18.00)</option>
                                                              @endif
                                                          </select>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Jenis Latihan</label>
                                                          <select class="form-control" name="jenis_latihan" required="">
                                                              @if (isset($detail_program_latihan))
                                                                <option value="pemanasan" @if ($detail_program_latihan->jenis_latihan == "pemanasan")
                                                                  selected
                                                                @endif>Pemanasan</option>
                                                                <option value="inti" @if ($detail_program_latihan->jenis_latihan == "inti")
                                                                  selected
                                                                @endif>Inti</option>
                                                                <option value="pendinginan" @if ($detail_program_latihan->jenis_latihan == "pendinginan")
                                                                  selected
                                                                @endif>Pendinginan</option>
                                                              @else
                                                                <option value="pemanasan">Pemanasan</option>
                                                                <option value="inti">Inti</option>
                                                                <option value="pendinginan">Pendinginan</option>
                                                              @endif
                                                          </select>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Latihan</label>
                                                        <select class="form-control" name="list_latihan" required="">
                                                          {{-- <optgroup label="Latihan Fisik">
                                                              <option value="1">CIRCUIT TRAINING</option>
                                                              <option value="2">INTERVAL TRAINING</option>
                                                              <option value="3">SISTEM AEROBIC</option>
                                                          </optgroup>
                                                          <optgroup label="Latihan Cabor">
                                                              <option value="4">LATIHAN TEKNIK</option>
                                                              <option value="5">LATIHAN TAKTIK</option>
                                                          </optgroup> --}}
                                                          @foreach ($latihan as $list_latihan)
                                                            <option value="{{ $list_latihan->id }}" @isset ($detail_program_latihan) @if($detail_program_latihan->list_latihan_id == $list_latihan->id)
                                                                selected="" @endif
                                                            @endisset >{{$list_latihan->kategori}} - {{$list_latihan->nama}}</option>
                                                          @endforeach
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Volume</label>
                                                          <input type="text" name="volume" class="form-control" required="" @if (isset($detail_program_latihan))
                                                            value="{{$detail_program_latihan->volume}}"
                                                          @endif>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating">
                                                          <label class="control-label">Intensitas</label>
                                                          <input type="text" name="intensitas" class="form-control" required="" @if (isset($detail_program_latihan))
                                                            value="{{$detail_program_latihan->intensitas}}"
                                                          @endif>
                                                        </div>
                                        </div>
                                        <div class="col-md-1 text-center">
                                                <button class="btn btn-info">Simpan</button>
                                        </div>
                                    </form>
                                </div>
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
            $('.del-confrim').confirm();
        });
    </script>

@endpush
