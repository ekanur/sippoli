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
          @include("components.program_menu");
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
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <ol class="breadcrumb">
                                      <li>Siklus Mikro</li>
                                    </ol>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bulan, Pekan</th>
                                            <th>Intensitas</th>
                                            <th>Volume</th>
                                            <th>Fase</th>
                                            {{-- <th>Sesi Latihan</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (null == sizeof($dataMikro))
                                        <tr>
                                             <td colspan="7">
                                                <h4 class="text-muted text-center">Siklus Mikro Belum Tersedia</h4>
                                            </td>
                                        </tr>
                                    @endif
                                        @foreach ($dataMikro as $dataMikro)
                                        <tr>
                                            <td><a href="{{ url('program/'.$id_program.'/mikro/'.$dataMikro->id) }}">{{$dataMikro->namaBulan()}}, pekan ke {{$dataMikro->pekan_ke}}</a></td>
                                            <td>{{ json_decode($dataMikro->json_volume_intensitas)->intensitas }}%</td>
                                            <td>{{ json_decode($dataMikro->json_volume_intensitas)->volume }}%</td>
                                            <td>Persiapan Umum</td>
                                            {{-- <td><a href="">Lihat</a></td> --}}
                                            <td>
                                                <a href="{{ url('/program/'.$id_program.'/mikro/'.$dataMikro->id.'/edit/') }}"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ url('/program/'.$id_program.'/mikro/'.$dataMikro->id.'/hapus/') }}" ><i class="material-icons">delete</i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form @if(isset($detail_siklus_mikro)) action="{{ url('/program/'.$id_program.'/mikro/'.$id_siklus_mikro.'/ubah') }}"  @else action="{{ url('program/mikro/simpan') }}" @endif method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                  <label class="control-label">Pekan</label>
                                                    <select name="pekan" class="form-control">
                                                        <optgroup label="Agustus">
                                                            <option value="1" @if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 1) selected="" @endif @endif>1</option>
                                                            <option value="2"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 2) selected="" @endif @endif>2</option>
                                                            <option value="3"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 3) selected="" @endif @endif>3</option>
                                                            <option value="4"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 4) selected="" @endif @endif>4</option>
                                                        </optgroup>
                                                        <optgroup label="September">
                                                            <option value="5"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 5) selected="" @endif @endif>5</option>
                                                            <option value="6"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 6) selected="" @endif @endif>6</option>
                                                            <option value="7"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 7) selected="" @endif @endif>7</option>
                                                            <option value="8"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 8) selected="" @endif @endif>8</option>
                                                        </optgroup>
                                                        <optgroup label="Oktober">
                                                            <option value="9"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 9) selected="" @endif @endif>9</option>
                                                            <option value="10"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 10) selected="" @endif @endif>10</option>
                                                            <option value="11"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 11) selected="" @endif @endif>11</option>
                                                            <option value="12"@if(isset($detail_siklus_mikro)) @if($detail_siklus_mikro->pekan_ke == 12) selected="" @endif @endif>12</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Intensitas</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="intensitas" type="number" min="1" required="" @if(isset($detail_siklus_mikro)) value="{{ json_decode($detail_siklus_mikro->json_volume_intensitas)->intensitas }}"  @endif/>
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
                                                        <input class="form-control" name="volume" type="number" min="1" required="" @if(isset($detail_siklus_mikro)) value="{{ json_decode($detail_siklus_mikro->json_volume_intensitas)->volume }}"  @endif />
                                                        <div class="input-group-addon">
                                                            <i>%</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <button class="text-center btn btn-info" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
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
