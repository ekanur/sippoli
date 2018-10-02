@extends("layout")
@section("content")

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="/atlet/tambah/" class="btn btn-success btn-round" style="margin: 20px auto 50px auto">Tambah Atlet</a>
      </div>
      @forelse ($atlet as $atlet)
          <div class="col-md-4" style="margin-bottom: 2.25em">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="/img/faces/taufik.jpg" />
                  </a>
                </div>

                <div class="content">
                  <h6 class="category text-gray">{{ ucwords($atlet->cabor->nama) }}</h6>
                  <h4 class="card-title"><a href="{{ url('/atlet/'.$atlet->id) }}">{{ ucwords($atlet->nama) }}</a></h4>
                  <!-- <p class="card-content">

                  </p>
                  <a href="#pablo" class="btn btn-success">Detail</a> -->
                </div>
                <hr>
                {{-- <div class="text-center">
                  <div class="row">
                      <div class="col-md-3 col-md-offset-1">
                          <h5>19<br><small>Usia</small></h5>
                      </div>
                      <div class="col-md-4">
                          <h5>Mahasiswa<br><small>Status</small></h5>
                      </div>
                      <div class="col-md-3">
                          <h5 style="text-align:right">45/156<br><small>Berat/Tinggi</small></h5>
                      </div>
                  </div>
                
                </div> --}}
              </div>
          </div>
      @empty
        <div class="col-md-12 text-center">
          <h3 class="text-muted ">Data Atlet Belum Tersedia</h3>
          
        </div>
      @endforelse

          </div>
  

</div>


@endsection
