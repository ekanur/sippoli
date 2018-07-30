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
            <h4 class="title">{{ $tes->judul }}</h4>
          </div>
          <div class="card-content">
{{--             <center>
              <iframe width="560" height="315" src="{{ $tes->video }}" frameborder="0" allowfullscreen></iframe>
            </center> --}}
            <br>
            <p>{!! $tes->deskripsi !!}</p>
            <br>
          </div>
        </div>
      </div>

      <!-- Modal -->
      
    </div>
  </div>

@endsection
