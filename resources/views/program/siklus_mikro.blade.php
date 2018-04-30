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
    <div class="col-md-12">
{{--         <h3 class="title text-center">PROGRAM LATIHAN DAN PROGRAM MAKAN</h3>
        <br> --}}
        <div class="nav-center">
          @include("components.program_menu")
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
                                            <th>Pekan (tanggal)</th>
                                            <th>Intensitas</th>
                                            <th>Volume</th>
                                            <th>Peaking</th>
                                            <th>Fase</th>
                                            {{-- <th>Sesi Latihan</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
{{--                                     @if (null == sizeof($siklus_mikro))
                                        <tr>
                                             <td colspan="8">
                                                <h4 class="text-muted text-center">Siklus Mikro Belum Tersedia</h4>
                                            </td>
                                        </tr>
                                    @endif --}}
                                    {{-- {{dd($data_pekan)}} --}}
                                        @foreach ($data_pekan as $data_pekan)
                                        <tr>
                                            <td>
                                                @if (isset($data_pekan['siklus_mikro_id']))
                                                <a href="{{ url('/program/'.$id_program.'/mikro/'.$data_pekan['siklus_mikro_id']) }}"><strong>Pekan ke {{$data_pekan['pekan']}}</strong></a> ({{ $data_pekan['tanggal'][0] }} s.d {{ $data_pekan['tanggal'][6] }})
                                                @else

                                                Pekan ke {{$data_pekan['pekan']}} ({{ $data_pekan['tanggal'][0] }} s.d {{ $data_pekan['tanggal'][6] }})
                                                @endif
                                            </td>
                                            <td>@isset (json_decode($data_pekan['ivp'])->intensitas)
                                                {{ json_decode($data_pekan['ivp'])->intensitas }}%
                                            @endisset</td>
                                            <td>@isset (json_decode($data_pekan['ivp'])->volume)
                                                {{ json_decode($data_pekan['ivp'])->volume }}%
                                            @endisset</td>
                                            <td>@isset (json_decode($data_pekan['ivp'])->peaking)
                                                {{ json_decode($data_pekan['ivp'])->peaking }}%
                                            @endisset</td>
                                            <td>{{ $data_pekan['fase'] }}</td>
                                            {{-- <td><a href="">Lihat</a></td> --}}
                                            <td>
{{--                                                 <a href="{{ url('/program/'.$id_program.'/mikro/'.$mikro->id.'/edit/') }}"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ url('/program/'.$id_program.'/mikro/'.$mikro->id.'/hapus/') }}" class="del-confrim" data-text="Apakah anda yakin ingin menghapus item tersebut?"><i class="material-icons">delete</i></a> --}}
                                                @if (isset($data_pekan['siklus_mikro_id']))
                                                    <a href="#" data-toggle="modal" data-target="#editModal" data-pekan_ke="{{ $data_pekan['pekan'] }}" data-siklus_mikro_id={{ $data_pekan['siklus_mikro_id'] }} data-intensitas={{ json_decode($data_pekan['ivp'])->intensitas }}  data-volume={{ json_decode($data_pekan['ivp'])->volume }} data-peaking={{ json_decode($data_pekan['ivp'])->peaking }} data-pekan_ke={{ $data_pekan['pekan'] }}>Edit</a>
                                                @else
                                                    <a href="#" data-toggle="modal" data-target="#baruModal" data-pekan_ke={{ $data_pekan['pekan'] }}>Edit</a>
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="card">
                    <div class="card-header" data-background-color="purple">
                            <h4 class="card-title">Diagram Periodisasi</h4>
                    </div>
                      <div class="card-content">
                        <div id="chart" style="width:100%; height: 550px">
                          @if (null == sizeof($array_siklus_mikro))
                              <h4 class="text-center text-muted">Diagram Periodisasi Belum Tersedia</h4>
                          @endif

                        </div>
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



@endsection

@push('modal')
<div class="modal fade" id="baruModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
    <form action="{{ url('/program/'.$id_program.'/mikro/simpan') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="program_id" value="{{ $id_program }}">
        <input type="hidden" name="pekan_ke">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pekan ke <span id="pekan_ke"></span> <small>(Intensitas, Volume, dan Peaking)</small></h4>
      </div>
      <div class="modal-body">
        <div class="container">
            
        
        <div class="row">                          
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Intensitas</label>
                    <div class="input-group">
                        <input class="form-control" name="intensitas_baru" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Volume</label>
                    <div class="input-group">
                        <input class="form-control" name="volume_baru" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Peaking</label>
                    <div class="input-group">
                        <input class="form-control" name="peaking_baru" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form action="{{ url('/program/'.$id_program.'/mikro/update') }}" method="post">
        {{ csrf_field() }}
        
        <input type="hidden" name="program_id" value="{{ $id_program }}">
        <input type="hidden" name="siklus_mikro_id">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pekan ke <span class="pekan_ke"></span> <small>(Intensitas, Volume, dan Peaking)</small></h4>
      </div>
      <div class="modal-body">
        <div class="container">
            
        
        <div class="row">                          
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Intensitas</label>
                    <div class="input-group">
                        <input class="form-control" name="intensitas" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Volume</label>
                    <div class="input-group">
                        <input class="form-control" name="volume" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Peaking</label>
                    <div class="input-group">
                        <input class="form-control" name="peaking" type="number" min="1" required="">
                        <div class="input-group-addon">
                            <i>%</i>
                        </div>
                    </div>
                <span class="material-input"></span></div>
            </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mulai').datepicker();
            $('.del-confrim').confirm();


            $('#editModal').on('show.bs.modal', function (event) {
              $(".label-floating").removeClass("is-empty");
              var button = $(event.relatedTarget); // Button that triggered the modal
              var siklus_mikro_id = button.data('siklus_mikro_id');
              var intensitas = button.data('intensitas');
              var volume = button.data('volume');
              var peaking = button.data('peaking');
              var pekan_ke = button.data("pekan_ke");


               // Extract info from data-* attributes
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              // var modal = $(this);
              $("input[name='siklus_mikro_id']").val(siklus_mikro_id);
              $("input[name='intensitas']").val(intensitas);
              $("input[name='volume']").val(volume);
              $("input[name='peaking']").val(peaking);
              $(".pekan_ke").text(pekan_ke);

            });

            $('#baruModal').on('show.bs.modal', function (event) {
              $(".label-floating").removeClass("is-empty");
              var button = $(event.relatedTarget); // Button that triggered the modal
              var pekan_ke = button.data("pekan_ke");
               // Extract info from data-* attributes
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              $("input[name='pekan_ke']").val(pekan_ke);
              $("#pekan_ke").text(pekan_ke);

            });
        });
    </script>
@endpush

@if (0 !== sizeof($array_siklus_mikro))
    @push('script')
      <script type="text/javascript" src="{{ url('/js/googlechart.loader.js') }}"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Pekan', 'Volume', 'Intensitas', 'Peaking'],
            @foreach ($array_siklus_mikro as $siklus_mikro)
              {{ json_encode($siklus_mikro) }},
            @endforeach
          ]);

          var options = {
            hAxis: {title: 'Pekan',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            colors: ['blue', 'red', 'black'],
            chartArea: {width: '95%', height: '85%'},
            legend: {position: 'in'},
          };

          var chart = new google.visualization.AreaChart(document.getElementById('chart'));
          chart.draw(data, options);
        }
      </script>
    @endpush
@endif