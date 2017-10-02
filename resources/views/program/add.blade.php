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
            <div class="tab-pane active" id="deskripsi">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Tambah Program</h4>
                        <p class="category">Isi form di bawah ini untuk menambahkan program</p>
                    </div>
                    <div class="card-content">
                    <div id="alert" class="row" style="display: none;">
                      <div class="col-md-8 col-sm-offset-2">
                        <p id="alert-msg" class="text-danger" align="center">woi</p>
                      </div>
                    </div>
                    <form @if(isset($program)) action="{{ url("/program/".$program->id."/ubah") }}" @else action="{{ url('/program/simpan') }}" @endif  method="post">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group label-floating">
                            <label class="control-label">Nama Program</label>
                            <input class="form-control" type="text" name="nama" value="@isset ($program) {{ $program->nama }} @endisset" required="">
                            <span class="material-input"></span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group label-floating">
                            <label class="control-label">Jangka Program</label>
                            <select class="form-control" name="jangka_durasi" required="" id="jangka_durasi">
                              <option value="3" @isset ($program) @if ($program->jangka_durasi == 3) selected="" @endif @endisset>Pendek (3 bulan)</option>
                              <option value="6" @isset ($program) @if ($program->jangka_durasi == 6) selected="" @endif @endisset>Menengah (6 bulan)</option>
                              <option value="12" @isset ($program) @if ($program->jangka_durasi == 12) selected="" @endif @endisset>Panjang (12 bulan)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group label-floating">
                            <label class="control-label">Mulai</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control" id="mulai" name="mulai_program" required="" value="@isset ($program) {{ date("m/d/Y", strtotime($program->mulai_program)) }} @endisset">
                                <div class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group label-floating" id="container_berakhir">
                            <label class="control-label" required="">Berakhir</label>
                                <input type="text" class="form-control" id="berakhir" readonly="" name="berakhir_program" value="@isset ($program) {{ date("m/d/Y", strtotime($program->berakhir_program)) }} @endisset">
                          </div>
                        </div>
                      </div>
                      {{-- <div class="row">
                        <div class="col-md-12">
                          <div class="form-group label-floating">
                            <label class="control-label">Deskripsi Program</label>
                            <textarea class="form-control" name="deskripsi" rows="3" cols="20">
                              @isset ($program) {{ $program->deskripsi }} @endisset
                            </textarea>
                          </div>
                        </div>
                      </div> --}}
                      <div class="row">
                          <div class="col-md-3">
                              <div class="form-group label-floating">
                                  <label class="control-label">Persiapan Umum (Pekan)</label>
                                  <input id="persiapan_umum" class="form-control" name="persiapan_umum" type="number" min="1"  required=""  @isset ($program) value="{{ json_decode($program->siklus_makro)->persiapan_umum }}" @endisset />
                                  <small class="help-block">persiapan umum dalam satuan pekan</small>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group label-floating">
                                  <label class="control-label">Persiapan Khusus (Pekan)</label>
                                  <input id="persiapan_khusus" class="form-control" name="persiapan_khusus" type="number" required="" min="1" @isset ($program) value="{{ json_decode($program->siklus_makro)->persiapan_khusus }}" @endisset />
                                  <small class="help-block">persiapan khusus dalam satuan pekan</small>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group label-floating">
                                  <label class="control-label">Pra Kompetisi (Pekan)</label>
                                  <input id="pra_kompetisi" class="form-control" required="" name="pra_kompetisi" type="number" min="1"  @isset ($program) value="{{ json_decode($program->siklus_makro)->pra_kompetisi }}" @endisset/>
                                  <small class="help-block">Pra kompetisi dalam satuan pekan</small>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group label-floating">
                                  <label class="control-label">Kompetisi (Pekan)</label>
                                  <input id="kompetisi" class="form-control" required="" name="kompetisi" type="number" min="1"  @isset ($program) value="{{ json_decode($program->siklus_makro)->kompetisi }}" @endisset/>
                                  <small class="help-block">Kompetisi dalam satuan pekan</small>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group label-floating">
                                  <label class="control-label">Transisi (Pekan)</label>
                                  <input class="form-control" required="" name="transisi" type="number" min="1"  @isset ($program) value="{{ json_decode($program->siklus_makro)->transisi }}" @endisset/>
                                  <small class="help-block">transisi dalam satuan pekan</small>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group label-floating">
                                  <label class="control-label">Deskripsi *Opsional</label>
                                  <textarea class="form-control" name="deskripsi" rows="4" cols="10">@isset ($program){{ $program->deskripsi }} @endisset</textarea>
                          </div>
                      </div>
                       <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-info">Simpan</button>
                      </div>
                      </div>
                    </form>
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
    <script src="{{ asset('/js/date.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();

            $("#mulai").change(function(){
              // var tanggal_mulai = Date.parse($(this).val());
              var jangka_durasi = $("#jangka_durasi").val();
              var tanggal_berakhir = Date.parse($(this).val()).add(+jangka_durasi).month();
              $("#container_berakhir").addClass("is-focused");
              $("#container_berakhir input-group").addClass("input-group-focus");
              $("#berakhir").val(new Date(tanggal_berakhir).toString('MM/dd/yyyy'));
              console.log(tanggal_berakhir);
              // console.log(jangka_durasi);
              // console.log(tanggal_berakhir);
            });

            $("#jangka_durasi").change(function(){
              var bulan = $(this).val();
              var mulai = $("#mulai").val();
              var tanggal_berakhir = Date.parse(mulai).add(+bulan).month();
                if (tanggal_berakhir !== null) {
                  $("#berakhir").val(new Date(tanggal_berakhir).toString('MM/dd/yyyy'));
                }
            });

            var persiapan_umum = parseInt($("#persiapan_umum").val());
            var persiapan_khusus = parseInt($("#persiapan_khusus").val());
            var pra_kompetisi = parseInt($("#pra_kompetisi").val());
            var kompetisi = parseInt($("#kompetisi").val());
            var jangka_durasi = parseInt($("#jangka_durasi").val()) * 4;

            if (jangka_durasi > (persiapan_umum + persiapan_khusus + pra_kompetisi + kompetisi)) {
              $("#alert-msg").html("Durasi pekan <b>kurang</b> dari jangka program!")
              $("#alert").show();
            }else if (jangka_durasi < (persiapan_umum + persiapan_khusus + pra_kompetisi + kompetisi)) {
              $("#alert-msg").html("Durasi pekan <b>lebih</b> dari jangka program!")
              $("#alert").show();
            }
        });
    </script>
@endpush


