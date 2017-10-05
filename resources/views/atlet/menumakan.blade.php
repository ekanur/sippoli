@extends("layout")
@push("style")
<style type="text/css">
	.label.label-default{
		background-color: #7b7b7b !important;
	}
</style>
@endpush
@section("content")
<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                	<div class="pull-left">
                                		<h4 class="card-title">Program Makan - Sesi Persiapan Umum</h4>
                                    	<p class="category">22-04-2017 s.d 14-05-2017</p>
                                	</div>
                                	<div class="pull-right">
                                		<a href="#" data-toggle="modal" data-target="#pilihAtlet"><i class="material-icons">add_circle</i></a>
                                	</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-content">
                                    <table class="table">
                                        <thead>
                                            <tr style="font-weight: bolder">
                                            	<th width="2%">#</th>
                                            	<th width="10%">Tanggal</th>
                                            	<th width="20%">Pagi</th>
                                            	<th width="20%">Siang</th>
                                            	<th width="20%">Malam</th>
                                            	<th width="10%">Kalori</th>
                                        	</tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>23/4/2017</td>
                                                <td>
                                                	<ul class="list-inline">
                                                		<li><a href=""><span class="label label-default">Lemper 4gr</span></a></li>
                                                		<li><a href=""><span class="label label-info">Krupuk 6gr</span></a></li>
                                                		<li><a href=""><span class="label label-success">Nasi Goreng 6gr</span></a></li>
                                                		<li><a href="" class="">
                                                		<i class="material-icons" style="font-size:1.25em">add</i> Tambah
                                                	</a></li>
                                                	</ul>
                                                </td>
                                                <td>
                                                	<ul class="list-inline">
                                                		<li><a href=""><span class="label label-default">Lemper 4gr</span></a></li>
                                                		<li><a href=""><span class="label label-info">Krupuk 6gr</span></a></li>
                                                		<li><a href=""><span class="label label-success">Nasi Goreng 6gr</span></a></li>
                                                		<li><a href="" class="">
                                                		<i class="material-icons" style="font-size:1.25em">add</i> Tambah
                                                	</a></li>
                                                	</ul>
                                                </td>
                                                <td>
                                                	<ul class="list-inline">
                                                		<li><a href=""><span class="label label-default">Lemper 4gr</span></a></li>
                                                		<li><a href=""><span class="label label-info">Krupuk 6gr</span></a></li>
                                                		<li><a href=""><span class="label label-success">Nasi Goreng 6gr</span></a></li>
                                                		<li class="pull-right"><a href="" class="">
                                                		<i class="material-icons" style="font-size:1.25em">add</i> Tambah
                                                	</a></li>
                                                	</ul>
                                                </td>
                                                <td>43</td>
                                               {{--  <td>
	                                                <a href=""><i class="material-icons">mode_edit</i></a>
	                                                <a href="" class="del-confrim" data-text="Apakah anda yakin ingin menghapus item tersebut?"><i class="material-icons">delete</i></a>
	                                            </td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>23/4/2017</td>
                                                <td>
                                                	<a href="">Pilih menu</a>
                                                </td>
                                                <td>
                                                	<a href=""><span class="label label-default">Lemper 4gr</span></a> <a href=""><span class="label label-info">Krupuk 6gr</span></a>
                                                </td>
                                                <td>
                                                	<a href="">Pilih menu</a>
                                                </td>
                                                <td>3</td>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-profile" style="margin-top: 50px">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="/img/faces/taufik.jpg">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <p class="card-content">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection