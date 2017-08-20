@extends("layout")

@section("content")
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" data-background-color="purple">
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
                          <td><a href="{{ url('/atlet') }}"><strong>Septian David</strong></a>, <a href="{{ url('/atlet') }}"><strong>Lee Chong Wei</strong></a>, <a href="{{ url('/atlet') }}"><strong>Zulham Z</strong></a></td>
                          <td>{{ $program->jangka_durasi }} bulan</td>
                          <td>{{ $program->mulai_program }} s.d {{ $program->berakhir_program }}</td>
                          <td>
                            <a href="{{ url('') }}"><i class="material-icons">print</i></a>                            
                            <a href="{{ url('') }}"><i class="material-icons">mode_edit</i></a> 
                            <a href="{{ url('') }}"><i class="material-icons">delete</i></a>
                          </td>
                        </tr>
                      @endforeach
                        
                      </tbody>
                    </table>

        </div>
    </div>
      
    </div>
</div>
@endsection