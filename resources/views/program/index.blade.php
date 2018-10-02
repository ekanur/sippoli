@extends("layout")

@section("content")

<!-- @if(Session::has('message'))

  <div class="alert alert-success">
    <a href="/program" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span> Program latihan <u>{{Session::get('message')}}</u>, berhasil di tambahkan</span>
  </div>

@endif -->

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" data-background-color="blue">
          <div class="pull-left">
            <h4 class="title">Program</h4>
          </div>
          <div class="pull-right">
            <a href="/program/baru"><i class="material-icons">add_circle</i></a>
          </div>
          <div class="clearfix"></div>
            {{-- <p class="category">Here is a subtitle for this table</p> --}}
        </div>
        <div class="card-content table-responsive">
            <table class="table">
              <table class="table table-stripped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Program Latihan</th>
                          <th>Atlet</th>
                          <th>Lama</th>
                          <th>Pelaksanaan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if (null == sizeof($program))
                        <tr>
                          <td colspan="6" class="text-center">
                            <h4 class="text-muted">Program Latihan Belum Tersedia</h4>
                            {{-- <a href="{{ url('/program/baru') }}" class="btn btn-info">Buat Program</a> --}}
                          </td>
                        </tr>
                      @endif

                      @foreach ($program as $key => $program)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td><a href="{{ url('/program/') }}/{{ $program->id }}/deskripsi">{{$program->nama}}</a></td>
                          <td>@if(null == sizeof($program->atlet)) <p class="help-block">-</p> @else <a href="{{ url("/program/".$program->id."/atlet") }}">{{ sizeof($program->atlet) }} Atlet</a> @endif</td>
                          <td>{{ $program->jangka_durasi }} bulan</td>
                          <td><strong>{{ $program->mulai_program }}</strong> s.d <strong>{{ $program->berakhir_program }}</strong></td>
                          <td>
                            <a href="{{ url('/program/'.$program->id.'/cetak') }}"><i class="material-icons">print</i></a>
                            {{-- <a data-toggle="modal" href="{{url('#UbahProgram')}}"><i class="material-icons">mode_edit</i></a> --}}
                            <a href="{{ url('/program/hapus/'.$program->id) }}"  class="del-confrim_program" data-text="Apakah anda yakin ingin menghapus program latihan {{$program->nama}}"><i  class="material-icons">delete</i></a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>

        </div>
    </div>



    <!-- Modal  UbahProgram-->
    <div id="UbahProgram" class="modal fade" role="dialog" data-backdrop="false">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ubah Program</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
                {{csrf_field()}}

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Nama Program</label>
                      <input class="form-control" type="text" name="nama" value="" required="">
                      <span class="material-input"></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Jangka Program</label>
                      <select class="form-control" name="jangka_durasi" required="" id="jangka_durasi">
                        <option value="3">Pendek (3 bulan)</option>
                        <option value="6">Menengah (6 bulan)</option>
                        <option value="12">Panjang (12 bulan)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Mulai</label>
                      <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="mulai" name="mulai_program" required="" value="">
                          <div class="input-group-addon">
                              <i class="material-icons">date_range</i>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating" id="container_berakhir">
                      <label class="control-label" required="">Berakhir</label>
                          <input type="text" class="form-control" id="berakhir" readonly="" name="berakhir_program" value="">
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Persiapan Umum (Pekan)</label>
                            <input id="persiapan_umum" class="form-control" name="persiapan_umum" type="number" min="1"  required=""  @isset ($program) value="" @endisset />
                            <small class="help-block">persiapan umum dalam satuan pekan</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Persiapan Khusus (Pekan)</label>
                            <input id="persiapan_khusus" class="form-control" name="persiapan_khusus" type="number" required="" min="1" @isset ($program) value="" @endisset />
                            <small class="help-block">persiapan khusus dalam satuan pekan</small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Pra Kompetisi (Pekan)</label>
                            <input id="pra_kompetisi" class="form-control" required="" name="pra_kompetisi" type="number" min="1"  @isset ($program) value="" @endisset/>
                            <small class="help-block">Pra kompetisi dalam satuan pekan</small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Kompetisi (Pekan)</label>
                            <input id="kompetisi" class="form-control" required="" name="kompetisi" type="number" min="1"  @isset ($program) value="" @endisset/>
                            <small class="help-block">Kompetisi dalam satuan pekan</small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Transisi (Pekan)</label>
                            <input class="form-control" required="" name="transisi" type="number" min="1"  @isset ($program) value="" @endisset/>
                            <small class="help-block">transisi dalam satuan pekan</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Deskripsi *Opsional</label>
                            <textarea class="form-control" name="deskripsi" rows="4" cols="10"></textarea>
                    </div>
                </div>
                </div>






              <div class="text-right">
                <button class="btn btn-success btn-sm" type="submit">Simpan Perubahan ?</button>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();
            $('.del-confrim_program').confirm();
        });
    </script>
@endpush
