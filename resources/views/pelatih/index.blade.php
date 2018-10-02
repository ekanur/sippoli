@extends('layout')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" data-background-color="blue">
            <h4 class="title">Edit Profile</h4>
            <p class="category">Complete your profile</p>
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
              			<label class="control-label">Gander</label>
              			<select class="form-control" name="gander">
              			  <option value="l">Laki-laki</option>
                      <option value="p">Perempuan</option>
              			</select>
              		</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group label-floating">
              			<label class="control-label">Email address</label>
              			<input type="email" class="form-control" >
              		</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <p>Untuk mengganti password silahkan <a href="#">klik disini</a></p>
                </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
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
      			<a href="#" class="btn btn-success">Follow</a>
      		</div>
      	</div>
      </div>
    </div>
  </div>
@endsection
