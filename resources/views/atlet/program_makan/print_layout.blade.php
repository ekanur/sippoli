<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<title>Sippoli</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" media="all">

  <style media="all">
  	body {
      background: white;
      -webkit-print-color-adjust: exact;
    }
    ul.no_bullet {
      list-style: none;
      padding: 0;
    }
    .badge {
      border: 0px;
    }
    .text-small {
      font-size: 12px;
    }
  </style>
</head>

<body onload="window.print();">
  <div class="container">
    <div class="card">
      <div class="card-header text-center">
        <h4 class="title">Detail Program</h4>
      </div>
      <div class="card-body">
        <p>Berikut adalah detail dari program dengan nama <i>{{$program->nama}}</i></p>
        <table class="table">
          <tr>
            <th>Nama Program</th>
            <td>{{$program->nama}}</td>
          </tr>
          <tr>
            <th>Jangka Program</th>
            <td>{{$program->jangka_durasi}}</td>
          </tr>
          <tr>
            <th>Masa Program</th>
            <td><i>{{date('d M Y', strtotime($program->mulai_program))}}</i> s/d <i>{{date('d M Y', strtotime($program->berakhir_program))}}</i></td>
          </tr>
          <tr>
            <th>Pembagian Pekan</th>
            <td>
              <ul class="no_bullet">
                <li>Persiapan Umum : {{json_decode($program->siklus_makro)->persiapan_umum}}</li>
                <li>Persiapan Khusus : {{json_decode($program->siklus_makro)->persiapan_khusus}}</li>
                <li>Pra Kompetisi : {{json_decode($program->siklus_makro)->pra_kompetisi}}</li>
                <li>Kompetisi : {{json_decode($program->siklus_makro)->kompetisi}}</li>
                <li>Transisi : {{json_decode($program->siklus_makro)->transisi}}</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Deskripsi Program</th>
            <td>
              <p>{{$program->deskripsi}}</p>
            </td>
          </tr>
        </table>
      </div>
      <div class="card-footer text-muted">
        <small>Terakhir diperbaharui pada <strong>{{date('d M Y H:i:s', strtotime($program->updated_at))}}</strong> oleh <strong>Nama Pelatih Kita</strong></small>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header text-center">
        <h4 class="title">Kebutuhan Energi</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <table class="table">
              <tr>
                <th>Persiapan Umum</th>
                <td>@unless(count($program->kebutuhan_energi)==0){{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->persiapan_umum}}@endunless</td>
              </tr>
              <tr>
                <th>Persiapan Khusus</th>
                <td>@unless(count($program->kebutuhan_energi)==0){{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->persiapan_khusus}}@endunless</td>
              </tr>
              <tr>
                <th>Pra Kompetisi</th>
                <td>@unless(count($program->kebutuhan_energi)==0){{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->pra_kompetisi}}@endunless</td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6">
            <table class="table">
              <tr>
                <th>Kompetisi</th>
                <td>@unless(count($program->kebutuhan_energi)==0){{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->kompetisi}}@endunless</td>
              </tr>
              <tr>
                <th>Transisi</th>
                <td>@unless(count($program->kebutuhan_energi)==0){{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->transisi}}@endunless</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <small>Terakhir diperbaharui pada <strong>{{date('d M Y H:i:s', strtotime($program->updated_at))}}</strong> oleh <strong>Nama Pelatih Kita</strong></small>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header text-center">
        <h4 class="title">Program Makan</h4>
      </div>
      <div class="card-body">
        <div class="card">
          <div class="card-header">
            <h5>Persiapan Umum</h5>
          </div>
          <div class="card-body">
            @foreach ($date_range_persiapan_umum as $key => $tanggal)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      {{$tanggal}}
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-3">
                          Pagi
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'pagi')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Siang
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'siang')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Malam
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'malam')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Persiapan Khusus</h5>
          </div>
          <div class="card-body">
            @foreach ($date_range_persiapan_khusus as $key => $tanggal)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      {{$tanggal}}
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-3">
                          Pagi
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'pagi')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Siang
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'siang')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Malam
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'malam')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Persiapan Pra Kompetisi</h5>
          </div>
          <div class="card-body">
            @foreach ($date_range_pra_kompetisi as $key => $tanggal)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      {{$tanggal}}
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-3">
                          Pagi
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'pagi')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Siang
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'siang')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Malam
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'malam')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Persiapan Kompetisi</h5>
          </div>
          <div class="card-body">
            @foreach ($date_range_kompetisi as $key => $tanggal)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      {{$tanggal}}
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-3">
                          Pagi
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'pagi')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Siang
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'siang')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Malam
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'malam')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Persiapan Transisi</h5>
          </div>
          <div class="card-body">
            @foreach ($date_range_transisi as $key => $tanggal)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      {{$tanggal}}
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-3">
                          Pagi
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'pagi')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Siang
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'siang')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div><hr>
                      <div class="row">
                        <div class="col-sm-3">
                          Malam
                        </div>
                        <div class="col-sm-9">
                          @if (array_key_exists($tanggal, $data_program_makan))
                            <ul>
                              @foreach ($data_program_makan[$tanggal] as $key => $program_makan)
                                @if ($program_makan->waktu == 'malam')
                                  <li>
                                    {{$program_makan->list_makanan->nama}}
                                    <span class="badge badge-info">{{$program_makan->list_makanan->kategori}}</span>
                                    <span class="badge badge-danger">{{$program_makan->list_makanan->kalori}} kkal</span>
                                  </li>
                                @endif
                              @endforeach
                          </ul>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <small>Terakhir diperbaharui pada <strong>{{date('d M Y H:i:s', strtotime($program->updated_at))}}</strong> oleh <strong>Nama Pelatih Kita</strong></small>
      </div>
    </div>
  </div>
</body>
</html>
