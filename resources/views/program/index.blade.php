@extends("layout")
@section("content")
<div class="row-center">
    <div class="col-md-12 col-md-offset-0">
        <h3 class="title text-center">PROGRAM LATIHAN DAN PROGRAM MAKAN</h3>
        <br>
        <div class="nav-center" style="margin-left:300px">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist" >
                <!--
    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
-->
                <li class="active">
                    <a href="#deskripsi" role="tab" data-toggle="tab" style="margin-bottom:20px">
                        <i class="material-icons">info</i>Deskripsi
                    </a>
                </li>
                <li>
                    <a href="#pilihatlet" role="tab" data-toggle="tab">
                        <i class="material-icons">search</i>Pilih Atlet
                    </a>
                </li>
                <li>
                    <a href="#prolat" role="tab" data-toggle="tab">
                        <i class="material-icons">directions_run</i>Program Latihan
                    </a>
                </li>
                <li>
                    <a href="#promak" role="tab" data-toggle="tab">
                        <i class="material-icons">restaurant</i>Program Makan
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="deskripsi">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Deskripsi tentang program latihan dan program makan</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                        Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                        <br>
                        <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="pilihatlet">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Pilih Atlet</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                        Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                        <br>
                        <br> Dramatically maintain clicks-and-mortar solutions without functional solutions.
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="prolat">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Rancangan Program Latihan</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                      <div class="col-md-3">
                        Nama atlet
                      </div>
                        <div class="row col-md-2" style="margin-left:10px">
                          <label for="hari">HARI</label> <br>
                          <select name="Hari">
                            <option value="">Pilih</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">SESI</label> <br>
                          <select name="sesi">
                            <option value="">Pilih</option>
                            <option value="senin">Pagi</option>
                            <option value="selasa">Siang</option>
                            <option value="rabu">Sore</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">ITEM LATIHAN </label> <br>
                          <select name="itemlatihan">
                            <option value="">Pilih</option>
                            <option value="senin">Lari</option>
                            <option value="selasa">Sit Up</option>
                            <option value="rabu">Back Up</option>
                          </select>
                        </div>

                        <div class="row">
                          <button type="submit" class="btn btn-info">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="promak">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="card-title">Rancangan Program Makan</h4>
                        <p class="category">
                            More information here
                        </p>
                    </div>
                    <div class="card-content">
                      <div class="col-md-3">
                        Nama atlet
                      </div>
                        <div class="row col-md-2" style="margin-left:10px">
                          <label for="hari">HARI</label> <br>
                          <select name="Hari">
                            <option value="">Pilih</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">SESI</label> <br>
                          <select name="sesi">
                            <option value="">Pilih</option>
                            <option value="pagi">Pagi</option>
                            <option value="siang">Siang</option>
                            <option value="sore">Sore</option>
                          </select>
                        </div>

                        <div class="row col-md-2">
                          <label for="hari">ITEM MAKANAN</label> <br>
                          <select name="itemlatihan">
                            <option value="">Pilih</option>
                            <option value="karbo">Karbohidrat</option>
                            <option value="protein">Protein</option>
                            <option value="sayur">Sayuran</option>
                            <option value="buah">Buah</option>
                          </select>
                        </div>

                        <div class="row">
                          <button type="submit" class="btn btn-info">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
