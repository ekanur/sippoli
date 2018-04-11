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
          <form action="{{ url('/latihan/update') }}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{ $latihan->id }}">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Edit Latihan</h4>
            </div>
            <div class="card-content">
                <div class="row">
                  <div class="form-group label-floating col-md-8">
                    <label class="control-label">Nama Latihan</label>
                    <input class="form-control" type="text" name="nameLatihan" value="{{ $latihan->nama }}" required>
                  </div>
                  <div class="form-group label-floating col-md-2">
                    <label class="control-label">Kategori Latihan</label>
                    <select class="form-control" name="cateogryLatihan">
                      <option value="Latihan Fisik" @if($latihan->kategori == 'Latihan Fisik') selected="" @endif>Latihan Fisik</option>
                      <option value="Latihan Cabor" @if($latihan->kategori == 'Latihan Cabor') selected="" @endif>Latihan Cabor</option>
                    </select>
                  </div>
                  <div class="form-group label-floating col-md-2">
                    <label for="" class="control-label">Cabor</label>
                    <select class="form-control" name="cabor_id">
                      @foreach($cabor as $cabor)
                        <option value="{{ $cabor->id }}" @if($cabor->id == $latihan->cabor_id) selected="" @endif>{{ ucwords($cabor->nama) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_latihan" rows="6" cols="80">{!! $latihan->deskripsi !!}</textarea>
                </div>
              <center>
                <button  type="submit" class="btn btn-success">Simpan</button>
              </center>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('script')
  <script type="text/javascript" src="{{ url('/js/tinymce/jquery.tinymce.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('/js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea[name="deskripsi_latihan"]',
      height:300,
      plugins: [
        'media image'
      ],
      toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
  </script>
@endpush
