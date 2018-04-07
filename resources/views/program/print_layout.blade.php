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
                <td>{{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->persiapan_umum}}</td>
              </tr>
              <tr>
                <th>Persiapan Khusus</th>
                <td>{{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->persiapan_khusus}}</td>
              </tr>
              <tr>
                <th>Pra Kompetisi</th>
                <td>{{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->pra_kompetisi}}</td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6">
            <table class="table">
              <tr>
                <th>Kompetisi</th>
                <td>{{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->kompetisi}}</td>
              </tr>
              <tr>
                <th>Transisi</th>
                <td>{{json_decode($program->kebutuhan_energi->first()->json_kebutuhan_per_siklus_makro)->transisi}}</td>
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
        <h4 class="title">Atlet</h4>
      </div>
      <div class="card-body">
        <p>Berikut adalah daftar atlet yang terdaftar dalam program ini.</p>
        <table class="table">
          <tr>
            <th>#</th>
            <th>Nama Atlet</th>
            <th>Gender</th>
            <th>Umur</th>
            <th>Status</th>
          </tr>
          @foreach ($program->atlet as $key => $atlet)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$atlet->nama}}</td>
              <td>{{$atlet->gender == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
              <td>{{$atlet->umur()}}</td>
              <td>{{$atlet->status}}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <br>
    <div class="card" style="page-break-before: always;">
      <div class="card-header text-center">
        <h4 class="title">Rancangan Program Latihan</h4>
      </div>
      <div class="card-body">
        @foreach ($program->siklus_mikro as $key => $siklus_mikro)
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="text-left col-md-8">
                  <h5 class="title">Pekan ke {{$siklus_mikro->pekan_ke}} <small>({{$siklus_mikro->fase()}})</small></h5>
                </div>
                <div class="text-right col-md-4">
                  <span class="badge badge-info">Intensitas {{json_decode($siklus_mikro->json_volume_intensitas)->intensitas}}</span>
                  <span class="badge badge-danger">Volume {{json_decode($siklus_mikro->json_volume_intensitas)->volume}}</span>
                  <span class="badge badge-success">Peaking {{json_decode($siklus_mikro->json_volume_intensitas)->peaking}}</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              @foreach ($siklus_mikro->sesi_latihan as $key => $sesi_latihan)
                <div class="card">
                  <div class="card-header">
                    <strong>Tanggal : </strong>{{date('d-m-Y', strtotime($sesi_latihan->tanggal))}}
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <strong>Kriteria : </strong>{{$sesi_latihan->kriteria_volume_intensitas}}
                      </div>
                      <div class="col-sm-3">
                        <strong>Materi : </strong>
                        @foreach (json_decode($sesi_latihan->json_materi_latihan) as $key => $materi_latihan)
                          {{$materi_latihan}};
                        @endforeach
                      </div>
                      <div class="col-sm-3">
                        <strong>Intensitas : </strong>
                        @foreach (json_decode($sesi_latihan->json_intensitas_max) as $key => $materi_latihan)
                          {{$materi_latihan}};
                        @endforeach
                      </div>
                      <div class="col-sm-3">
                        <strong>Volume Max : </strong>
                        @foreach (json_decode($sesi_latihan->json_volume_max) as $key => $materi_latihan)
                          {{$materi_latihan}};
                        @endforeach
                      </div>
                    </div>
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sesi</th>
                          <th>Jenis</th>
                          <th>Latihan</th>
                          <th>Volume</th>
                          <th>Intensitas</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sesi_latihan->program_latihan as $key => $program_latihan)
                          <tr>
                            <td>{{$program_latihan->waktu}}</td>
                            <td>{{$program_latihan->jenis_latihan}}</td>
                            <td>{{$program_latihan->list_latihan->nama}}</td>
                            <td>{{$program_latihan->volume}}</td>
                            <td>{{$program_latihan->intensitas}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
              @endforeach
            </div>
          </div>
          <br>
        @endforeach
      </div>
      <div class="card-footer text-muted">
        <small>Terakhir diperbaharui pada <strong>{{date('d M Y H:i:s', strtotime($program->updated_at))}}</strong> oleh <strong>Nama Pelatih Kita</strong></small>
      </div>
    </div>
  </div>
</body>
</html>
