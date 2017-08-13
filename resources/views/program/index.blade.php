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
                <li  class="active">
                    <a href="{{ url('/program/baru') }}" role="tab">
                        <i class="material-icons">info</i>Deskripsi
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program/1/atlet') }}" role="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                    </a>
                </li>
                <li>
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
                        <button type="submit" class="btn btn-info">Tambah</button>
                      </center>
                    </form>
                  </div>
                </div>
            </div>
            {{-- <div class="tab-pane" id="pilihatlet">
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
            </div> --}}
            {{--  --}}
            {{-- <div class="tab-pane" id="promak">
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

                        
                    </div>
                </div>
            </div> --}}
            
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
