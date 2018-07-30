@extends('layout')

@push('style')
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <style media="screen">
  .tab-pane td a{
    text-transform: capitalize;
  }
  </style>
@endpush

@section('content')


{{-- @if(Session::has('sukses_tambah_latihan'))
  <div class="alert alert-success">
    <a href="/latihan" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span> Nama latihan <u>{{Session::get('sukses_tambah_latihan')}}</u>, berhasil di tambahkan</span>
  </div>
@endif  --}}

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-nav-tabs">
          <div class="card-header" data-background-color="purple">
            Macam-Macam Tes
          </div>
          <div class="card-content">
            
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="100%">&nbsp;</th>
                      </tr>
                    </thead>
                  <tbody>
                      @foreach($tes as $tes)
                      <tr>
                        <td><a href="{{ url('/tes/'.$tes->id) }}">{{$tes->judul}}</a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>

          </div>
        </div>
      </div>

      <!-- Modal -->
      
    </div>
  </div>

@endsection


@push('script')
  <script type="text/javascript" src="{{ url('/js/datatables.min.js') }}"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      $(".table").DataTable();
    });
  </script>
@endpush


