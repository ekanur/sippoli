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
                                $x=0;
                                
                        	@endphp
                        	@foreach ($date_range["persiapan_umum"] as $persiapan_umum)
                                
                        	<tr>
                                <td>{{$i++}}</td>
                                <td>{{ $persiapan_umum }}</td>
                                <td>
                                    @php
                                    $total_kalori_pagi = 0;
                                    @endphp
                                    @if(isset($data_program_makan[$persiapan_umum][$x]) && $data_program_makan[$persiapan_umum][$x]->waktu == 'pagi')
                                    <ul class="list-inline">

                                        @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                                            <li>
                                                @component('components.label_makan')
                                                    @slot('id')
                                                    {{ $menu_persiapan_umum->id }}
                                                    @endslot
                                                    
                                                    @slot('kategori')
                                                    {{ $menu_persiapan_umum->list_makanan->kategori }}
                                                    @endslot

                                                    @slot('nama')
                                                    {{ $menu_persiapan_umum->list_makanan->nama }}
                                                    @endslot

                                                    @slot('kalori')
                                                    {{ $menu_persiapan_umum->list_makanan->kalori }}
                                                    @endslot

                                                    @slot('qty')
                                                    {{ $menu_persiapan_umum->qty }}
                                                    @endslot

                                                    @slot('total_kalori')
                                                    {{ $menu_persiapan_umum->total_kalori }}
                                                    @endslot
                                                    @slot('kategori_makanan')
                                                        {{ $label_kategori[$menu_persiapan_umum->list_makanan->kategori] }}
                                                    @endslot
                                                    {{ $menu_persiapan_umum->list_makanan->nama }} {{ $menu_persiapan_umum->qty }}
                                                    @if($menu_persiapan_umum->list_makanan->kategori == 'mineral' || $menu_persiapan_umum->list_makanan->kategori == 'air') liter
                                                    @else 
                                                        gram
                                                    @endif
                                                @endcomponent 

                                            </li>
                                            @php
                                            $total_kalori_pagi = $total_kalori_pagi + $menu_persiapan_umum->total_kalori;
                                            $x++;
                                            @endphp
                                        @endforeach
                                            <li class="pull-left" style="margin-top:10px">
                                                <a href="" class="" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}" data-waktu="pagi"><i class="material-icons" style="font-size:1.25em">add</i> Tambah</a>
                                            </li>
                                    </ul>
                                       
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}" data-waktu="pagi">Pilih menu</a>
                                    @endif
                                	
                                </td>
                                <td>
                                            @php
                                            $total_kalori_siang = 0;
                                            $x=0;
                                            @endphp
                                    @if(isset($data_program_makan[$persiapan_umum][$x]) && $data_program_makan[$persiapan_umum][$x]->waktu == 'siang')
                                        <ul class="list-inline">
                                            @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                                                <li>
                                                    @component('components.label_makan')
                                                        @slot('id')
                                                        {{ $menu_persiapan_umum->id }}
                                                        @endslot
                                                        
                                                        @slot('kategori')
                                                        {{ $menu_persiapan_umum->list_makanan->kategori }}
                                                        @endslot

                                                        @slot('nama')
                                                        {{ $menu_persiapan_umum->list_makanan->nama }}
                                                        @endslot

                                                        @slot('kalori')
                                                        {{ $menu_persiapan_umum->list_makanan->kalori }}
                                                        @endslot

                                                        @slot('qty')
                                                        {{ $menu_persiapan_umum->qty }}
                                                        @endslot

                                                        @slot('total_kalori')
                                                        {{ $menu_persiapan_umum->total_kalori }}
                                                        @endslot

                                                        @slot('kategori_makanan')
                                                            {{ $label_kategori[$menu_persiapan_umum->list_makanan->kategori] }}
                                                        @endslot
                                                        {{ $menu_persiapan_umum->list_makanan->nama }} {{ $menu_persiapan_umum->qty }}
                                                        @if($menu_persiapan_umum->list_makanan->kategori == 'mineral' || $menu_persiapan_umum->list_makanan->kategori == 'air') liter
                                                        @else 
                                                            gram
                                                        @endif
                                                    @endcomponent 

                                                </li>
                                            @php
                                            $total_kalori_siang = $total_kalori_siang + $menu_persiapan_umum->total_kalori;
                                            $x++;
                                            @endphp
                                            @endforeach
                                                <li class="pull-left" style="margin-top:10px">
                                                    <a href="" class="" data-toggle="modal" data-target="#pilihMenu"  data-tanggal="{{ $persiapan_umum }}" data-waktu="siang"><i class="material-icons" style="font-size:1.25em">add</i> Tambah</a>
                                                </li>
                                        </ul>
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}" data-waktu="siang">Pilih menu</a>
                                    @endif
                                	
                                </td>
                                <td>
                                            @php
                                            $total_kalori_malam = 0;
                                            $x=0;
                                            @endphp
                                    @if(isset($data_program_makan[$persiapan_umum][$x]) && $data_program_makan[$persiapan_umum][$x]->waktu == 'malam')
                                        <ul class="list-inline">
                                            @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                                                <li>
                                                    @component('components.label_makan')
                                                        @slot('id')
                                                        {{ $menu_persiapan_umum->id }}
                                                        @endslot
                                                        
                                                        @slot('kategori')
                                                        {{ $menu_persiapan_umum->list_makanan->kategori }}
                                                        @endslot

                                                        @slot('nama')
                                                        {{ $menu_persiapan_umum->list_makanan->nama }}
                                                        @endslot

                                                        @slot('kalori')
                                                        {{ $menu_persiapan_umum->list_makanan->kalori }}
                                                        @endslot

                                                        @slot('qty')
                                                        {{ $menu_persiapan_umum->qty }}
                                                        @endslot

                                                        @slot('total_kalori')
                                                        {{ $menu_persiapan_umum->total_kalori }}
                                                        @endslot
                                                        @slot('kategori_makanan')
                                                            {{ $label_kategori[$menu_persiapan_umum->list_makanan->kategori] }}
                                                        @endslot
                                                        {{ $menu_persiapan_umum->list_makanan->nama }} {{ $menu_persiapan_umum->qty }}
                                                        @if($menu_persiapan_umum->list_makanan->kategori == 'mineral' || $menu_persiapan_umum->list_makanan->kategori == 'air') liter
                                                        @else 
                                                            gram
                                                        @endif
                                                    @endcomponent 

                                                </li>
                                            @php
                                            $total_kalori_malam = $total_kalori_malam + $menu_persiapan_umum->total_kalori;
                                            $x++;
                                            @endphp
                                            @endforeach
                                                <li class="pull-left" style="margin-top:10px">
                                                    <a href="" class="" data-toggle="modal" data-target="#pilihMenu"  data-tanggal="{{ $persiapan_umum }}" data-waktu="malam"><i class="material-icons" style="font-size:1.25em">add</i> Tambah</a>
                                                </li>
                                        </ul>
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#pilihMenu" data-tanggal="{{ $persiapan_umum }}"  data-waktu="malam">Pilih menu</a>
                                    @endif
                                	
                                </td>
                                <td>{{ $total_kalori_pagi + $total_kalori_siang + $total_kalori_malam }}</td>
                            </tr>
{{--                             @php
                            $x++;
                            @endphp --}}
                        	@endforeach
                            
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