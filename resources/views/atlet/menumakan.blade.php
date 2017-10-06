@extends("layout")
@push("style")
<style type="text/css">
	.label.label-default{
		background-color: #7b7b7b !important;
	}
    .label a{color:white;}
</style>
@endpush
@section("content")
<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
										<h4 class="card-title">Program Makan - Sesi Persiapan Umum</h4>
                                    	<p class="category">{{ $date_range["persiapan_umum"][0] }} s.d {{ $date_range["persiapan_umum"][sizeof($date_range["persiapan_umum"])-1] }}</p>
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
                                        	@php
                                        		$i=1;
                                        	@endphp
                                        	@foreach ($date_range["persiapan_umum"] as $persiapan_umum)
                                        		                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ $persiapan_umum }}</td>
                                                <td>
                                                	<a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}" data-waktu="pagi">Pilih menu</a>
                                                </td>
                                                <td>
                                                	<a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}" data-waktu="siang">Pilih menu</a>
                                                </td>
                                                <td>
                                                	<a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}"  data-waktu="malam">Pilih menu</a>
                                                </td>
                                                <td>0</td>
                                            </tr>
                                        	@endforeach
                                            <tr>
                                                <td>3</td>
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
                                                		<li>
                                                            <span class="label label-info">
                                                                <a href="">Krupuk 6gr</a>
                                                            <a href=""><i class="material-icons" style="font-size:1.25em">mode_edit</i></a> 
                                                            <a href=""><i class="material-icons" style="font-size:1.25em">clear</i></a>
                                                            </span> 

                                                        </li>
                                                		<li><span class="label label-success"><a href="">Nasi Goreng 6gr</a>
                                                            <a href=""><i class="material-icons" style="font-size:1.25em">mode_edit</i></a> 
                                                            <a href=""><i class="material-icons" style="font-size:1.25em">clear</i></a> 
                                                            
                                                        </span></li>
                                                		<li class="pull-left" style="margin-top:10px"><a href="" class="">
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

@push('modal')
	<div class="modal fade" id="pilihMenu" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" style="text-transform: capitalize;">Pilih Menu <span id="waktu"></span></h4>
	      </div>
	      <div class="modal-body">
	       <form action="{{ url('/program-makan/simpan') }}" method="post">
	       	{{ csrf_field() }}
	       	<input type="hidden" name="waktu">
	       	<input type="hidden" name="tanggal">
	       	<input type="hidden" name="program_id" value="{{ $id_program }}">
	       	<input type="hidden" name="atlet_id"  value="{{ $atlet_id }}">
	       	<div class="col-md-3">
              <div class="form-group label-floating">
                <label class="control-label">Kategori</label>
                <select name="kategori" id="kategori" required="" class="form-control">
                	<option value="karbohidrat">Karbohidrat</option>
                	<option value="protein">Protein</option>
                	<option value="lemak">Lemak</option>
                	<option value="vitamin">Vitamin</option>
                	<option value="mineral">Mineral</option>
                	<option value="air">Air</option>
                </select>
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group label-floating" id="label-makan">
                <label class="control-label">Makanan</label>
                <select name="list_makanan" id="list_makan" required="" class="form-control">
                	
                </select>
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group label-floating">
                <label class="control-label">Qty <small>(gram)</small></label>
                <input type="number" class="form-control" name="qty" min="1" required="">
                <span class="material-input"></span>
              <span class="material-input"></span></div>
            </div>
	       
	      </div>
	      		<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Simpan</button>
		    	</div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div>
@endpush

@push('script')
	<script type="text/javascript">
	$(document).ready(function(){
		$.get("{{ url('makanan/karbohidrat') }}", function(data){
				
				$.each(data, function(key, value){
					$("#list_makan option").remove();
					$("#list_makan").append("<option value='"+ value.id +"'>"+ value.nama +"</option>");
				});
			});

		$('#pilihMenu').on('show.bs.modal', function (event) {
			$("#label-makan").removeClass("is-empty");
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var waktu = button.data('waktu');
		  var tanggal = button.data('tanggal');

		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this);
		  $("input[name='waktu']").val(waktu);
		  $("input[name='tanggal']").val(tanggal);
		  modal.find("#waktu").text(waktu);

		});

		$("#kategori").change(function(){
			$("#label-makan").removeClass("is-empty");
			$("#list_makan option").remove();
			var kategori = $(this).val();
			$.get("{{ url('makanan') }}/"+kategori, function(data){
				
				$.each(data, function(key, value){
					
					$("#list_makan").append("<option value='"+ value.id +"'>"+ value.nama +"</option>");
				});
			});
		});
	});
</script>
@endpush