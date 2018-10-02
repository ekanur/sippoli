<div class="card">
    <div class="card-header" data-background-color="blue">
			<h4 class="card-title">Program Makan - Sesi Persiapan Umum</h4>
        	<p class="category">{{ $date_range[0] }} s.d {{ $date_range[sizeof($date_range)-1] }}</p>
    </div>
    <div class="card-content">
        <ul class="list-inline" style="margin-bottom:30px">
            <li>Kategori Makanan : </li>
            <li><span class="label label-default">Karbohidrat</span></li>
            <li><span class="label label-primary">Protein</span></li>
            <li><span class="label label-success">Lemak</span></li>
            <li><span class="label label-info">Vitamin</span></li>
            <li><span class="label label-warning">Mineral</span></li>
            <li><span class="label label-danger">Air</span></li>
        </ul>
        <div class="table-responsive">
          <table class="table  table-hover table-condensed table-striped">
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
              	@foreach ($date_range as $persiapan_umum)

              	<tr>
                      <td>{{$i++}}</td>
                      <td>{{ date('d-m-y', strtotime($persiapan_umum)) }}</td>
                      <td>
                          @php
                          $total_kalori_pagi = 0;
                          @endphp

                          @if(isset($data_program_makan[$persiapan_umum]))
                              <ul class="">

                              @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                              @if($menu_persiapan_umum->waktu == 'pagi')
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
                                  @endif
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
                          @if(isset($data_program_makan[$persiapan_umum][$x]->waktu))

                              <ul class="">
                                      @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                                      @if($menu_persiapan_umum->waktu == 'siang')
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
                                      @endif
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


                          @if(isset($data_program_makan[$persiapan_umum]))

                                  <ul class="">
                                          @foreach($data_program_makan[$persiapan_umum] as $menu_persiapan_umum)
                                          @if($menu_persiapan_umum->waktu == 'malam')
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
                                          @endif
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
