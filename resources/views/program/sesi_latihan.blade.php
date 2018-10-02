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
                                      <li><a href="{{ url('/program/'.$id_program.'/mikro') }}">Siklus Mikro</a></li>
                                      <li>Pekan ke {{ $siklus_mikro->pekan_ke }}</li>
                                    </ol>
                                </div>
                                <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-1 col-xs-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas</label>
                                                    <strong>{{ json_decode($siklus_mikro->json_volume_intensitas)->intensitas }}%</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume</label>
                                                        <strong>{{ json_decode($siklus_mikro->json_volume_intensitas)->volume }}%</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Peaking</label>
                                                        <strong>{{ json_decode($siklus_mikro->json_volume_intensitas)->peaking }}%</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-6">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Fase</label>
                                                    <strong>{{ $siklus_mikro->fase() }}</strong>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Tangal</th>
                                                            {{-- <th>Tahapan</th> --}}
                                                            <th>Materi Latihan</th>
                                                            <th>Intesitas Max</th>
                                                            <th>Volume Max</th>
                                                            {{-- <th>Sesi Latihan</th> --}}
                                                            <th>Kriteria Latihan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (null == sizeof($siklus_mikro->sesi_latihan))
                                                            <tr>
                                                                <td colspan="7">
                                                                    <h4 class="text-muted text-center">Sesi Latihan Belum Tersedia</h4>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                            
                                                        @foreach ($siklus_mikro->sesi_latihan as $sesi_latihan_perhari)
                                                            <tr>
                                                                <td><a href="{{ url('/program/'.$id_program.'/mikro/'.$id_siklus_mikro.'/sesi-latihan/'.$sesi_latihan_perhari->id) }}">{{ date('D m-d-Y', strtotime($sesi_latihan_perhari->tanggal)) }}</a></td>
                                                                {{-- <td>{{$sesi_latihan->tahapan}}</td> --}}
                                                                <td>{{implode(',', json_decode($sesi_latihan_perhari->json_materi_latihan))}}</td>
                                                                <td>{{implode(',', json_decode($sesi_latihan_perhari->json_intensitas_max))}}</td>
                                                                <td>{{implode(',', json_decode($sesi_latihan_perhari->json_volume_max))}}</td>
                                                                <td><span class="label label-success">{{$sesi_latihan_perhari->kriteria_volume_intensitas}}</span></td>
                                                                <td>
                                                                <ul class="list-inline">
                                                                    <li>
                                                                        <a style="color:#9932B1" class="btn btn-just-icon btn-simple" href="{{ url('/program/'.$id_program.'/mikro/'.$id_siklus_mikro.'/sesi-latihan/'.$sesi_latihan_perhari->id.'/edit') }}"><i class="material-icons">mode_edit</i></a>
                                                                    </li>
                                                                    <li>
                                                                        <form action="/program/{{$id_program}}/mikro/{{$id_siklus_mikro}}/sesi-latihan/{{$sesi_latihan_perhari->id}}/hapus" method="post">
                                                                            {{csrf_field()}}
                                                                            {{method_field('DELETE')}}
                                                                            <button type="submit" name="hapus" class="btn btn-just-icon btn-simple"><i style="color:#9932B1" class="material-icons">delete</i></button>
                                                                        </form>
                                                                    </li>
                                                                    <li></li>
                                                                </ul>
                                                                     
                                                                </td>
                                                            </tr>
                                                        @endforeach
{{-- {{ dd($sesi_latihan->sesi_latihan) }} --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                </div>
                               
                            </div>
                            
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form 
                                    @if (isset($sesi_latihan))
                                        action="{{ url('/program/sesi-latihan/'.$sesi_latihan->id.'/ubah/') }}"
                                    @else
                                        action="{{ url('/program/sesi-latihan/simpan/') }}"
                                    @endif  

                                    method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="siklus_mikro_id" value="@isset($id_siklus_mikro) {{ $id_siklus_mikro }} @endisset">
                                        <div class="row">
                                            {{-- <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Fase</label>
                                                    <strong>Persiapan Umum</strong>
                                                </div>
                                            </div> --}}
                                            
                                            <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Tanggal</label>
                                                          <input class="form-control" name="tanggal" type="text"  data-provide="datepicker" required="" @if (isset($sesi_latihan))
                                                              value="{{ $sesi_latihan->tanggal }}"
                                                          @endif  />
                                                        </div>
                                            </div>
{{--                                             <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tahapan</label>
                                                    <input type="text" name="tahapan" class="form-control">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                            <label class="control-label">Kriteria</label>
                                                        <div class="radio">
                                                            <label class="radio-inline">
                                                                <input type="radio" required="" name="kriteria_v_i" value="rendah" @if (isset($sesi_latihan)) @if($sesi_latihan->kriteria_volume_intensitas == 'rendah') checked="" @endif @endif ><span class="circle"></span><span class="check"></span> Rendah
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="kriteria_v_i" value="sedang" @if (isset($sesi_latihan)) @if($sesi_latihan->kriteria_volume_intensitas == 'sedang') checked="" @endif @endif><span class="circle"></span><span class="check"></span> Sedang
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="kriteria_v_i" value="berat" @if (isset($sesi_latihan)) @if($sesi_latihan->kriteria_volume_intensitas == 'tinggi') checked="" @endif @endif><span class="circle"></span><span class="check"></span> Berat
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">  
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materi Latihan</label>
                                                    <textarea required="" class="form-control" name="materi_latihan" rows="2" cols="10" id="materi">@if (isset($sesi_latihan)) {{ implode(", ",json_decode($sesi_latihan->json_materi_latihan)) }} @endif</textarea>
                                                    {{-- <div id="materi"></div> --}}
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>                                             
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas Max</label>
                                                    <textarea required="" id="intensitas" class="form-control" name="intensitas_max" rows="2" cols="10">@if (isset($sesi_latihan)) {{ implode(", ",json_decode($sesi_latihan->json_intensitas_max)) }} @endif</textarea>
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume Max</label>
                                                    <textarea required="" id="volume" class="form-control" name="volume_max" rows="2" cols="10">@if (isset($sesi_latihan)) {{ implode(", ",json_decode($sesi_latihan->json_volume_max)) }} @endif</textarea>
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                {{-- <hr> --}}
                                            </div>
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
    {{-- <link rel="stylesheet" href="{{ url('/css/taggle.css') }}"> --}}
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    {{-- <script src="{{ asset('/js/taggle.js') }}"></script> --}}
    <script type="text/javascript">

        // new Taggle("materi");
        // new Taggle("intensitas");
        // new Taggle("volume");
        $(document).ready(function(){
            $('#mulai').datepicker();
            $("button[name='hapus']").confirm({
                submitForm:true,
            });
        });
    </script>
@endpush
