@extends("layout")
@section("content")

<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <h4><b>EVALUASI ATLET</b></h4>
    </div>
  </div>
  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Data Atlet</h4>
            <!-- <p class="category">Complete your profile</p> -->
          </div>
          <div class="card-content">
            <form>
              <div class="row">
                <div class="col-md-6">
              		<div class="form-group label-floating">
              			<label class="control-label">Name</label>
              			<input type="text" class="form-control" >
              		</div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
              			<label class="control-label">Gender</label>
              			<select class="form-control" name="gender">
                      <option value="0">Pilih</option>
              			  <option value="l">Laki-laki</option>
                      <option value="p">Perempuan</option>
              			</select>
              		</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Cabor</label>
                    <select class="form-control" name="cabor">
                        <option value="0">Pilih</option>
                      <option value="l">Voli</option>
                      <option value="p">Bulutangkis</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- <button type="submit" class="btn btn-primary pull-right">Tam</button> -->
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
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
      			<a href="#pablo" class="btn btn-success">Follow</a>
      		</div>
      	</div>
      </div>
    </div>



    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" data-background-color="blue">
              <h4 class="title">Kondisi Akhir Atlet</h4>
              <!-- <p class="category">Complete your profile</p> -->
            </div>
            <div class="card-content">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Berat Badan</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Tinggi Badan</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Resting</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                    <h7>Volume Paru-paru</h7>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Acuan</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Hasil</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Liter</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                    <h7>Skinfold Caliper</h7>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Biceps</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Triceps</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Subscapular</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Abdominal</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">WBR (audio)</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">WBR (visual)</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Speed Anticipation</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Agility</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Flexibility</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group label-floating">
                      <label class="control-label">Vertical Jump</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>


                <div class="row">

                </div>

                <div class="row">

                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Back Strength</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Leg Strength</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                    <h7>Grip Strength</h7>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Kn</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Kr</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                    <h7>Expanding</h7>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Push</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Pull</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Speed</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Sit Up</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Push Up</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating">
                      <label class="control-label">Balanced Beam</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                    <h7>VO2 Max</h7>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">MFT</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Cosmet</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Ergocycle</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Balke</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group label-floating">
                      <label class="control-label">Cooper</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group label-floating">
                      <label class="control-label">Recovery</label>
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
                </div>

                <!-- <button type="submit" class="btn btn-primary pull-right">Tam</button> -->
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
