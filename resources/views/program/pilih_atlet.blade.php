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
                        <div class="pull-left">
                            <h4 class="card-title">Pilih Atlet</h4>
                            <p class="category">Atlet yang akan mengikuti program latihan</p>
                        </div>
                        <div class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#pilihAtlet"><i class="material-icons">add_circle</i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-content">
                    {{--  --}}
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">&nbsp;
                            <input type="text" class="pull-right col-md-6" id="cari_atlet" placeholder="Cari Atlet..">

                        </h3>
                      </div>
                      <div class="panel-body">

                        @if (sizeof($program_atlet) === 0)
                            <h4 class="text-center text-muted">Belum Memilih Atlet</h4>
                        @else
                            <ul class="list-inline">

                                @foreach ($program_atlet->atlet as $program_atlet)
                                    <li style=" border:1px solid #ddd">
                                        <img src="{{ url('/uploads/sample-'.rand(1,3).".jpg") }}" alt="nama atlet" style="width: 74px;height: 76px; border:1.5px solid #bcbcbc" class="img-circle pull-left">
                                        <span class="pull-left" style="margin: 5px 10px;">
                                            <p>{{$program_atlet->nama}}</p>
                                        </span>
                                        <div class="dropdown pull-right">
                                          <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-success btn-simple btn-xs">
                                            <i class="material-icons">more_vert</i>
                                          </button>
                                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                                            {{-- <li><a href="{{ url('/program/'.$id_program.'/assessment/'.$program_atlet->id) }}">Assessment</a></li> --}}
                                            <li><a href="{{ url('/program/'.$id_program.'/program-makan/'.$program_atlet->id) }}">Program Makan</a></li>
                                            <li><a href="{{ url('/program/'.$id_program.'/program-makan/'.$program_atlet->id.'/cetak') }}">Print Program Makan</a></li>
                                            <li><a href="{{ url('/program/'.$id_program.'/assessment/'.$program_atlet->id) }}">Assessment</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{ url('/program/'.$id_program.'/hapus-atlet/'.$program_atlet->id) }}">Remove</a></li>
                                          </ul>
                                        </div>


                                    </li>
                                @endforeach
                            </ul>
                        @endif

                      </div>
                      <div class="panel-footer">
                        <ul class="list-inline">
                            <li> <small>Avg. Usia : </small></li>
                            <li> <small>Avg. Berat Badan : </small></li>
                            <li> <small>Avg. Berat Badan : </small></li>
                        </ul>

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
<style>
    #cari_atlet{
        border:0.5px solid #ddd;
        border-radius: 5px;
    }
    .list-inline{
        margin-bottom: 0px;
    }
    .panel-body li{
        margin-right: 5px;
        padding-top:5px;
        padding-bottom: 5px;
        width:250px;
    }
    .list-inline li span .btn{
        margin:0px;
        margin-top: 10px;
        padding:5px;
    }
    .dropdown button{
        padding: 2px !important;
        margin: 0px;
    }
    .dropdown ul{
        width: 50%;
    }
    .dropdown ul li{
        width: 100%;
        padding:0px;
    }
    .dropdown ul li a{
        padding:5px 8px;
    }

div.dataTables_wrapper div.dataTables_paginate {
    margin: 0;
    white-space: nowrap;
    text-align: right;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin: 2px 0;
    white-space: nowrap;
}

.pagination>li>a, .pagination>li>span {
    border: 0 !important;
    border-radius: 30px !important;
    transition: all .3s;
    padding: 0px 11px;
    margin: 0 3px;
    min-width: 30px;
    height: 30px;
    line-height: 30px;
    color: #999999;
    font-weight: 400;
    font-size: 12px;
    text-transform: uppercase;
    background: transparent;
}

.dataTables_filter{
    float:right;
    width: 100%;
}
.dataTables_filter label{
    display:block;
}

.dataTables_filter input{
    width: 100% !important;
}

</style>
@endpush

@push('script')
<script src="{{ url('/js/jquery.datatables.js') }}"></script>
<script type="text/javascript">
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': "{{ csrf_token() }}"
        }
      });
    });
    $(document).ready(function(){


        $('#atlet').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari..",
            }

        });
    });

    $("input[name='pilih_atlet']").change(function(){
        var count = $("input[name='pilih_atlet']:checked").length;
        if(count > 0){
            $("button[name='tambah_atlet']").attr('disabled', false);
            $("#count").text("("+ count +" atlet)");
        }else{
            $("button[name='tambah_atlet']").attr('disabled', true);
            $("#count").text("");
        }
    });

    $("button[name='tambah_atlet']").click(function(){
        var atlet = $(".check_atlet:checkbox:checked").map(function(){
            return this.value;
        }).get();

        $.post("{{ url('pilih-atlet') }}", {id:atlet, program_id:"{{ $id_program }}"})
            .done(function(data){
                // console.log(data);
                window.location.replace("{{ url('/program/'.$id_program.'/atlet') }}");
            });
    });

    $("button[rel='tooltip']").click(function(){
        var id = $(this).data("id");
        $.post("{{ url('/pilih-atlet') }}", {id:id, program_id:"{{ $id_program }}"})
            .done(function(data){
                // console.log(data);
                window.location.replace("{{ url('/program/'.$id_program.'/atlet') }}");
            });
    });
</script>
@endpush

@push('modal')
<div class="modal fade" id="pilihAtlet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
{{--       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Atlet</h4>
      </div> --}}
      <div class="modal-body">
        <table class="table" id="atlet" data-page-length='5'>
            <thead>
                <tr>
                    <th width="8%">#</th>
                    <th width="90%">Profile</th>
                    <th width="2%">Tambah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atlet as $atlet)
                    <tr>
                        <td width="8%">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="check_atlet" name="pilih_atlet" value="{{ $atlet->id }}">

                                </label>
                            </div>
                        </td>
                        <td width="90%">
                            <img src="{{ url('/uploads/sample-'.rand(1,3).".jpg") }}" alt="nama atlet" style="width: 50px;height: 50px; border:1.5px solid #bcbcbc; margin-right:10px" class="img-circle">
                            <span style="font-size:1.15em; font-weight:bolder;">{{ucwords($atlet->nama)}}</span>
                        </td>
                        <td class="text-right"  width="2%">
                            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Pilih {{ ucwords($atlet->nama) }}" data-id="{{ $atlet->id }}">
                                <i class="material-icons">person_add</i>
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" name="tambah_atlet" class="btn btn-primary" disabled="">Tambah <span id="count"></span></button>
      </div>
    </div>
  </div>
</div>
@endpush
