@extends('layout')

@push('style')
  <style media="screen">
    h4.title{
      text-transform: uppercase;
    }
  </style>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">{{ $latihan->nama }} @if($latihan->pelatih_id == 1) <small class="material-icons pull-right"><a class="" href="{{ url('/latihan/'.$latihan->id."/edit") }}">mode_edit</a></small> @endif</h4>
            <p class="category">
              {{ $latihan->kategori }} - {{ ucwords($latihan->cabor->nama) }}
            </p>
          </div>
          <div class="card-content">
{{--             <center>
              <iframe width="560" height="315" src="{{ $latihan->video }}" frameborder="0" allowfullscreen></iframe>
            </center> --}}
            <br>
            <p>{!! $latihan->deskripsi !!}</p>
            <br>
          </div>
        </div>
      </div>

      <!-- Modal -->
      
    </div>
  </div>

@endsection
