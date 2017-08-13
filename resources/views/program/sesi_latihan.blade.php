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
                                    <form action="{{ url('program/mikro/save') }}" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Pelatih</label>
                                                    <strong>Rene Albert</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Atlet</label>
                                                    <strong>Taufik, Lin Dan, Kim Jeffry</strong>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Bulan</label>
                                                    <select name="bulan" class="form-control">
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Pekan</label>
                                                    <strong>Agustus/1</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="intensitas" type="number" min="1" value="35" disabled="" />
                                                        <div class="input-group-addon">
                                                            <i>%</i>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="volume" type="number" min="1" value="50" disabled="" />
                                                        <div class="input-group-addon">
                                                            <i>%</i>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Fase</label>
                                                    <strong>Persiapan Umum</strong>
                                                </div>
                                            </div>
                                            <div class="col-xs-12"><hr></div>
                                        </div>
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
                                                          <input class="form-control" name="tanggal" type="text"  data-provide="datepicker"/>
                                                        </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tahapan</label>
                                                    <input type="text" name="tahapan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                            <label class="control-label">Kriteria</label>
                                                        <div class="radio">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="kriteria_v_i"><span class="circle"></span><span class="check"></span> Rendah
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="kriteria_v_i"><span class="circle"></span><span class="check"></span> Sedang
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="kriteria_v_i"><span class="circle"></span><span class="check"></span> Berat
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">  
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materi Latihan</label>
                                                    <textarea class="form-control" name="materi_latihan" rows="2" cols="10"></textarea>
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>                                             
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas Max</label>
                                                    <textarea class="form-control" name="intensitas_max" rows="2" cols="10"></textarea>
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume Max</label>
                                                    <textarea class="form-control" name="volume_max" rows="2" cols="10"></textarea>
                                                    <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                </div>
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
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();
        });
    </script>
@endpush
