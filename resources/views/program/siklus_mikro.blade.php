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
                                            <td><a href="{{ url('program/1/mikro/1') }}">{{$dataMikro->bulan}}, pekan ke {{$dataMikro->pekan_ke}}</a></td>
                                            <td>{{ json_decode($dataMikro->json_volume_intensitas)->intensitas }}%</td>
                                            <td>{{ json_decode($dataMikro->json_volume_intensitas)->volume }}%</td>
                                            <td>Persiapan Umum</td>
                                            {{-- <td><a href="">Lihat</a></td> --}}
                                            <td>
                                                <a href="{{ url('program/1/mikro/1') }}"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{{ action('ProgramController@deleteSiklusMikro',[$dataMikro->id]) }}}" ><i class="material-icons">delete</i></a>
                                                <!-- <a href="{{ url('program/1/mikro/1/hapus/') }}"><i class="material-icons">delete</i></a> -->
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ url('program/mikro/save') }}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
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
                                                        <input class="form-control" name="intensitas" type="number" min="1" required="" />
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
                                                        <input class="form-control" name="volume" type="number" min="1" required="" />
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
