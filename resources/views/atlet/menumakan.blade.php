{{-- {{ dd($data_program_makan['2017/11/01']) }} --}}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    @include("components.program_makan_menu")
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            @if(Request::segment(5) == null)
                @include("atlet.program_makan.persiapan-umum")
            @else
                @include("atlet.program_makan.".Request::segment(5))
            @endif
        </div>
        <div class="col-md-3">
            <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="/img/faces/taufik.jpg">
                  </a>
                </div>

                <div class="content">
                  <h6 class="category text-gray">{{ $program->atlet[0]->cabor->nama }}</h6>
                  <h4 class="card-title">{{ $program->atlet[0]->nama }}</h4>
                  <!-- <p class="card-content">

                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Detail</a> -->
                </div>
                <hr>
                <div class="text-center">
                  <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <h5>19<br><small>Usia</small></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>55<br><small>Berat</small></h5>
                        </div>
                        <div class="col-md-3">
                            <h5 style="text-align:right">Male<br><small>Gender</small></h5>
                        </div>
                    </div>
                  </div>
                  
                  <a href="{{ url("/atlet/".$atlet_id) }}" class="btn btn-primary btn-round">Detail</a>
                
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


{{-- modal detail --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="text-transform: capitalize;">Detail Menu </h4>
          </div>
          <div class="modal-body">
            <div class="col-md-3">
              <div class="form-group label-floating">
                <label class="control-label">Kategori</label>
                <input type="text" readonly="" class="form-control" value="" name="kategori">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group label-floating" id="label-makan">
                <label class="control-label">Makanan</label>
                <input type="text" class="form-control" readonly="" value="" name="makanan">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group label-floating">
                <label class="control-label">Kalori</label>
                <input type="number" class="form-control" readonly="" value="" name="kalori">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group label-floating">
                <label class="control-label">Qty</label>
                <input type="number" class="form-control" name="qty_detail" min="1" readonly="">
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating">
                    <label class="control-label">Total Kalori</label>
                    <input type="number" class="form-control" name="total_kalori" min="1" readonly="">
                    <span class="material-input"></span>
                </div>
            </div>
           
          </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


    {{-- modal edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="text-transform: capitalize;">Edit Menu </h4>
          </div>
          <form action="{{ url("/program-makan/edit") }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="">
          <div class="modal-body">
            <div class="col-md-3">
              <div class="form-group label-floating">
                <label class="control-label">Kategori</label>
                <input type="text" readonly="" class="form-control" value="" name="kategori_edit">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group label-floating" id="label-makan">
                <label class="control-label">Makanan</label>
                <input type="text" class="form-control" readonly="" value="" name="makanan_edit">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group label-floating">
                <label class="control-label">Kalori</label>
                <input type="number" class="form-control" readonly="" value="" name="kalori_edit">
                <span class="material-input"></span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group label-floating">
                <label class="control-label">Qty</label>
                <input type="number" class="form-control" name="qty_edit" min="1">
                <span class="material-input"></span></div>
            </div>
            <div class="col-md-2">
                <div class="form-group label-floating">
                    <label class="control-label">Total Kalori</label>
                    <input type="number" class="form-control" name="total_kalori_edit" min="1" readonly="">
                    <span class="material-input"></span>
                </div>
            </div>
           
          </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
					$("#list_makan").append("<option value='"+ value.id +"'>"+ value.nama +" - "+ value.kalori +" kal</option>");
				});
			});

		$('#pilihMenu').on('show.bs.modal', function (event) {
			$("#label-makan").removeClass("is-empty");
            $("input[name='qty']").val('');
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
					
					$("#list_makan").append("<option value='"+ value.id +"'>"+ value.nama +" - "+ value.kalori +" kal</option>");
				});
			});
		});

        $('#modalDetail').on('show.bs.modal', function (event) {
            $(".label-floating").removeClass("is-empty");
          var button = $(event.relatedTarget); // Button that triggered the modal
          var id = button.data('id');
          var kategori = button.data('kategori');
          var nama = button.data('nama');
          var kalori = button.data('kalori');
          var qty = button.data('qty');
          var total_kalori = button.data('total_kalori');

           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          // var modal = $(this);
          $("input[name='kategori']").val(kategori);
          $("input[name='makanan']").val(nama);
          $("input[name='kalori']").val(kalori);
          $("input[name='qty_detail']").val(qty);
          $("input[name='total_kalori']").val(total_kalori);

        });

        $('#modalEdit').on('show.bs.modal', function (event) {
            $(".label-floating").removeClass("is-empty");
          var button = $(event.relatedTarget); // Button that triggered the modal
          var id = button.data('id');
          var kategori = button.data('kategori');
          var nama = button.data('nama');
          var kalori = button.data('kalori');
          var qty = button.data('qty');
          var total_kalori = button.data('total_kalori');

           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          // var modal = $(this);
          $("input[name='id']").val(id);
          $("input[name='kategori_edit']").val(kategori);
          $("input[name='makanan_edit']").val(nama);
          $("input[name='kalori_edit']").val(kalori);
          $("input[name='qty_edit']").val(qty);
          $("input[name='total_kalori_edit']").val(total_kalori);

        });

        $("input[name='qty_edit']").bind('keyup mouseup', function(){
            var qty = $(this).val();
            var kalori = $("input[name='kalori_edit']").val();
            var total_kalori = qty*kalori;
            $("input[name='total_kalori_edit']").val(total_kalori);
        });

        $('.del_confirm_menu_makan').confirm();
	});
</script>
@endpush