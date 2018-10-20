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
                                        @foreach($data_tanggal as $key => $value)
                                        @if(is_integer($value))
                                        <tr>
                                            <td>
                                                <a href="{{ url("/program/".$id_program."/mikro/".$id_siklus_mikro."/sesi-latihan/".$siklus_mikro->sesi_latihan[$value]->id) }}">{{ $key }}</a>
                                            </td>
                                            <td>
                                                {{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_materi_latihan)) }}
                                            </td>
                                            <td>
                                               {{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_intensitas_max)) }}
                                           </td>
                                           <td>
                                            {{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_volume_max)) }}
                                        </td>
                                        <td>
                                            {{ $siklus_mikro->sesi_latihan[$value]->kriteria_volume_intensitas }}
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit_sesi" data-siklus-mikro-id="{{ $id_siklus_mikro }}"
                                            data-sesi-latihan-id="{{ $siklus_mikro->sesi_latihan[$value]->id }}"
                                            data-materi-latihan="{{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_materi_latihan)) }}"
                                            data-intensitas-max="{{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_intensitas_max)) }}"
                                            data-volume-max = "{{ implode(",", json_decode($siklus_mikro->sesi_latihan[$value]->json_volume_max)) }}"
                                            data-kriteria-volume-intensitas = "{{ $siklus_mikro->sesi_latihan[$value]->kriteria_volume_intensitas }}"
                                            >Atur</a>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td><span class="text-center help-block">-</span></td>
                                        <td><span class="text-center help-block">-</span></td>
                                        <td><span class="text-center help-block">-</span></td>
                                        <td><span class="text-center help-block">-</span></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#sesi_baru" data-siklus-mikro-id="{{ $id_siklus_mikro }}" data-tanggal="{{ $key }}">Atur</a>   
                                        </td>
                                    </tr>
                                    @endif
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
</div>

</div>
</div>
</div>
</div>
</div>
@endsection

@push("modal")
<div class="modal fade" id="sesi_baru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="{{ url('/program/sesi-latihan/simpan/') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="siklus_mikro_id" value="">
        <input type="hidden" name="tanggal" value="">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sesi Latihan <span id="sesi_latihan"></span> <small>(Materi Latihan, Vol Max, Intensitas Max, Kriteria Latihan)</small></h4>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
            
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Kriteria</label>
                                
                                <select class="form-control" name="kriteria_v_i">
                                    <option value="rendah">Rendah</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="berat">Berat</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">  
                        <div class="form-group label-floating">
                            <label class="control-label">Materi Latihan</label>
                            <textarea required="" class="form-control" name="materi_latihan" rows="2" cols="10" id="materi"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>                                             
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Intensitas Max</label>
                            <textarea required="" id="intensitas" class="form-control" name="intensitas_max" rows="2" cols="10"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Volume Max</label>
                            <textarea required="" id="volume" class="form-control" name="volume_max" rows="2" cols="10"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_sesi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="{{ url('/program/sesi-latihan/update/') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="siklus_mikro_id" value="">
        <input type="hidden" name="sesi_latihan_id" value="">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sesi Latihan <span id="sesi_latihan"></span> <small>(Materi Latihan, Vol Max, Intensitas Max, Kriteria Latihan)</small></h4>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
            
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Kriteria</label>
                                
                                <select class="form-control" name="kriteria_v_i">
                                    <option value="rendah">Rendah</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="berat">Berat</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">  
                        <div class="form-group label-floating">
                            <label class="control-label">Materi Latihan</label>
                            <textarea required="" class="form-control" name="materi_latihan" rows="2" cols="10" id="materi"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>                                             
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Intensitas Max</label>
                            <textarea required="" id="intensitas" class="form-control" name="intensitas_max" rows="2" cols="10"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Volume Max</label>
                            <textarea required="" id="volume" class="form-control" name="volume_max" rows="2" cols="10"></textarea>
                            <p class="help-block">Gunakan koma(,) untuk pemisah</p>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endpush

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
        // $('#mulai').datepicker();
        $("button[name='hapus']").confirm({
            submitForm:true,
        });

        $("#sesi_baru").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget);
            var siklus_mikro_id = button.data("siklus-mikro-id");
            var tanggal = button.data("tanggal");

            $("input[name='siklus_mikro_id']").val(siklus_mikro_id);
            $("input[name='tanggal']").val(tanggal);
        });

        $("#edit_sesi").on("show.bs.modal", function(event){
            $(".label-floating").removeClass("is-empty");
            var button = $(event.relatedTarget);
            var siklus_mikro_id = button.data("siklus-mikro-id");
            var sesi_latihan_id = button.data("sesi-latihan-id");
            var materi_latihan = button.data("materi-latihan");
            var intensitas_max = button.data("intensitas-max");
            var volume_max = button.data("volume-max");
            var kriteria_volume_intensitas = button.data("kriteria-volume-intensitas");
            $("input[name='siklus_mikro_id']").val(siklus_mikro_id);
            $("input[name='sesi_latihan_id']").val(sesi_latihan_id);
            $("select[name='kriteria_v_i']").val(kriteria_volume_intensitas);
            $("textarea[name='materi_latihan']").val(materi_latihan);
            $("textarea[name='intensitas_max']").val(intensitas_max);
            $("textarea[name='volume_max']").val(volume_max);

        });
    });
</script>
@endpush
