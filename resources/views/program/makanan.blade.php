@extends("layout")
@section("content")
<div class="row-center">
    <div class="col-md-12 col-md-offset-0">
{{--         <h3 class="title text-center">PROGRAM LATIHAN DAN PROGRAM MAKAN</h3>
        <br> --}}
        <div class="nav-center" style="margin-left:300px">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist" >
                <!--
    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
-->
                <li class="active">
                    <a href="{{ url('/program/baru') }}" role="tab" data-toggle="tab" style="margin-bottom:20px">
                        <i class="material-icons">info</i>Deskripsi
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/atlet') }}" role="tab" data-toggle="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/mikro') }}" role="tab" data-toggle="tab">
                        <i class="material-icons">directions_run</i>Program Latihan
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/makanan') }}" role="tab" data-toggle="tab">
                        <i class="material-icons">restaurant</i>Program Makan
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="deskripsi">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Tambah Program</h4>
                        <p class="category">Isi form di bawah ini untuk menambahkan program</p>
                    </div>
                    <div class="card-content">
                    <form action="" method="post">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group label-floating">
                            <label class="control-label">Nama Program</label>
                            <input class="form-control" type="text" name="nama" value="">
                            <span class="material-input"></span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group label-floating">
                            <label class="control-label">Jangka Program</label>
                            <select class="form-control" name="jangka">
                              <option value="pendek">Pendek (3 bulan)</option>
                              <option value="menengah">Menengah (6 bulan)</option>
                              <option value="panjang">Panjang (12 bulan)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group label-floating">
                            <label class="control-label">Mulai</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control" id="mulai">
                                <div class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group label-floating">
                            <label class="control-label">Berakhir</label>
                                <input type="text" class="form-control" id="mulai" disabled>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="row">
                        <div class="col-md-12">
                          <div class="form-group label-floating">
                            <label class="control-label">Deskripsi Program</label>
                            <textarea class="form-control" name="deskripsi" rows="3" cols="20"></textarea>
                          </div>
                        </div>
                      </div> --}}
                      <div class="row">
                          <div class="col-md-3">
                              <div class="form-group label-floating">
                                  <label class="control-label">Persiapan Umum</label>
                                  <input class="form-control" name="persiapan_umum" type="number" min="1"/>
                                  <small class="help-block">Lama persiapan umum dalam satuan pekan</small>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group label-floating">
                                  <label class="control-label">Persiapan Khusus</label>
                                  <input class="form-control" name="persiapan_umum" type="number" min="1"/>
                                  <small class="help-block">Lama persiapan khusus dalam satuan pekan</small>
                              </div>
                          </div>
                      </div>
                      <center>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                      </center>
                    </form>
                  </div>
                </div>
            </div>
            <div class="tab-pane" id="pilihatlet">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Pilih Atlet</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                        Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                        <br>
                        <br> Dramatically maintain clicks-and-mortar solutions without functional solutions.
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="prolat">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <div class="pull-left">   
                            <h4 class="title">Rancangan Program Latihan</h4> 
                            <p class="category">
                                Penyusunan siklus mikro dan sesi latihan tiap hari.
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="/program"><i class="material-icons">add_circle</i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <form action="{{ url('/mikro/save') }}" method="post">
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
                                            {{-- <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Fase</label>
                                                    <strong>Persiapan Umum</strong>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Bulan</label>
                                                            <strong>Agustus</strong>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Minggu</label>
                                                          <strong>1</strong>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Tanggal</label>
                                                          <input class="form-control" name="tanggal" type="text"  data-provide="datepicker"/>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tahapan</label>
                                                            <input type="text" name="tahapan" class="form-control">
                                                      </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Materi Latihan</label>
                                                            <textarea class="form-control" name="materi_latihan" rows="2" cols="10"></textarea>
                                                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Pelatih</label>
                                                          <strong>Rene Albert</strong>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Atlet</label>
                                                            <strong>Taufik, Lin Dan, Kim Jeffry</strong>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Intensitas</label>
                                                          <div class="input-group">
                                                            <input class="form-control" name="intensitas" type="number" min="1"/>
                                                            <div class="input-group-addon">
                                                                <i>%</i>
                                                            </div>
                                                        </div>
                                                          
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                          <label class="control-label">Volume</label>
                                                          <div class="input-group">
                                                            <input class="form-control" name="volume" type="number" min="1"/>
                                                            <div class="input-group-addon">
                                                                <i>%</i>
                                                            </div>
                                                        </div>
                                                          
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li>&nbsp;</li>
                                                    <li>&nbsp;</li>
                                                    <li>&nbsp;</li>
                                                    <li>&nbsp;</li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Intensitas Max</label>
                                                            <textarea class="form-control" name="intensitas_max" rows="2" cols="10"></textarea>
                                                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Volume Max</label>
                                                            <textarea class="form-control" name="volume_max" rows="2" cols="10"></textarea>
                                                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                                                        </div>
                                                    </li>
                                                    <li>&nbsp;</li>
                                                    <li>
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
                                                    </li>

                                                </ul>
                                            </div> --}}
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
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Pekan</label>
                                                    <select name="pekan" class="form-control">
                                                        <optgroup label="Agustus">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option> 
                                                        </optgroup>
                                                        <optgroup label="September">
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                        </optgroup>
                                                        <optgroup label="Oktober">
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="intensitas" type="number" min="1"/>
                                                        <div class="input-group-addon">
                                                            <i>%</i>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Volume</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="volume" type="number" min="1"/>
                                                        <div class="input-group-addon">
                                                            <i>%</i>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="text-center btn btn-info" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Bulan/Pekan</th>
                                            <th>Volume</th>
                                            <th>Intensitas</th>
                                            <th>Fase</th>
                                            {{-- <th>Sesi Latihan</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           {{--  <td colspan="7">
                                                <h4 class="text-muted text-center">Sesi Latihan Belum Tersedia</h4>
                                            </td> --}}
                                            <td><a href="">Agustus/1</a></td>
                                            <td>50%</td>
                                            <td>35%</td>
                                            <td>Persiapan Umum</td>
                                            {{-- <td><a href="">Lihat</a></td> --}}
                                            <td>
                                                <a href=""><i class="material-icons">mode_edit</i></a> 
                                                <a href=""><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
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
            <div class="tab-pane" id="promak">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Rancangan Program Makan</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                      <div class="col-md-3">
                        Nama atlet
                      </div>
                        <div class="row col-md-2" style="margin-left:10px">
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
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">SESI</label> <br>
                          <select name="sesi">
                            <option value="">Pilih</option>
                            <option value="pagi">Pagi</option>
                            <option value="siang">Siang</option>
                            <option value="sore">Sore</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">ITEM MAKANAN</label> <br>
                          <select name="itemlatihan">
                            <option value="">Pilih</option>
                            <option value="karbo">Karbohidrat</option>
                            <option value="protein">Protein</option>
                            <option value="sayur">Sayuran</option>
                            <option value="buah">Buah</option>
                          </select>
                        </div>

                        <div class="row">
                          <button type="submit" class="btn btn-info">Tambah</button>
                        </div>
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
