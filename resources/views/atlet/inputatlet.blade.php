@extends("layout")
@section("content")

<div class="container-fluid">
{{--   <div class="row">
      <div class="col-md-12">
        <h4><b>INPUT PROFIL ATLET</b></h4>
    </div>
  </div> --}}
  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Edit/Tambah Data Atlet</h4>

            <!-- <p class="category">Complete your profile</p> -->
          </div>
          <div class="card-content">
            <form action="{{ url('/atlet/save') }}" method="post">
              {{csrf_field()}}

              <div class="row">
                <div class="col-md-6">
              		<div class="form-group">
              			<label class="control-label">Name</label>
              			<input type="text" class="form-control" name="nama_atlet" required="" >
              		</div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
              			<label class="control-label">Gender</label>
              			<select class="form-control" name="jenis_kelamin" required="">
                      <option value="">Pilih</option>
              			  <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
              			</select>
              		</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" name="tglLahirAtlet">
                    <label class="control-label">Tanggal Lahir(YYYY-MM-DD)</label>
                    <input type="date" class="form-control" name="tglLahirAtlet" required="" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label class="control-label">Cabor</label>
                    <select class="form-control" name="cabor_Atlet" required="">
                      <option value="">Pilih</option>
                      @foreach ($cabor as $cabang_olahraga)
                        <option value="{{ $cabang_olahraga->id }}">{{ ucfirst($cabang_olahraga->nama) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

      {{-- <div class="col-md-4">
      	<div class="card card-profile">
      		<div class="card-avatar">
      			<a href="#pablo">
      				<img class="img" src="/uploads/sample-{{random_int(1, 3)}}.jpg" style="min-height: 130px; min-width: 130px;"/>
      			</a>
      		</div>

      		<div class="content">
      			<h4 class="card-title">{{Faker\Factory::create()->name}}</h4>
      			<p class="card-content">
      				Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
      			</p>
      			<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
      		</div>
      	</div>
      </div> --}}
    </div>



    
    </div>
@endsection
