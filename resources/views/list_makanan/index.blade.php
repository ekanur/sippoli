@extends('layout')

@push('style')
  <style media="screen">
    .action-td {
      text-align: right;
    }
    .action-td .action-btn {
      margin-right: 0px;
      margin-left: 4px;
      padding-right: 0px;
      padding-left: 4px;
    }
  </style>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Daftar Makanan</h4>
            <!-- <p class="category">Lorem ipsum dolor sit amet</p> -->
          </div>
          <div class="card-content">
            <table class="table">
              <tbody>
                <tr>
                    <th align="center" rowspan="2">No.</th>
                    <th align="center" rowspan="2">Nama Makanan</th>
                    <th align="center" rowspan="2">Kategori</th>
                    <th align="center" colspan="6" >Informasi Nilai Gizi </th>
                </tr>
                <tr>
                  <th align="center">Kalori(g)</th>
                  <th align="center">Lemak(g)</th>
                  <th align="center">Protein(g)</th>
                  <th align="center">Karbohidrat(g)</th>
                  <th align="center">Kalsium(g)</th>
                  <th align="center">Natrium(g)</th>
                </tr>


                <tr>
                  <td align="center">1</td>
                  <td align="center">Apel</td>
                  <td align="center">Buah - buahan</td>
                  <td align="center">10</td>
                  <td align="center">10</td>
                  <td align="center">10</td>
                  <td align="center">80</td>
                  <td align="center">10</td>
                  <td align="center">10</td>
                </tr>

                <tr>
                  <td align="center">2</td>
                  <td align="center">Nasi</td>
                  <td align="center">Karbohidrat</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td align="center">80</td>
                  <td align="center">90</td>
                  <td align="center">10</td>
                  <td align="center">10</td>
                </tr>




              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-3">
      	<div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Tambah Makanan</h4>
            <!-- <p class="category">Lorem ipsum dolor sit amet</p> -->
          </div>
          <div class="card-content">
            <form action="/list_makanan/tambah" method="post">
              <div class="form-group label-floating">
                <label class="control-label">Nama Makanan</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>
              <div class="form-group label-floating">
                <label class="control-label">Kategori Makanan</label>
                <select class="form-control" name="cateogry">
                  <option value="Karbohidrat">Karbohidrat</option>
                  <option value="Protein">Protein</option>
                  <option value="Sayur-sayuran">Sayur-sayuran</option>
                  <option value="Buah-buahan">Buah-buahan</option>
                  <option value="Buah-buahan">Susu</option>
                </select>
              </div>

              <h4>Informasi Nilai Gizi</h4>
              <div class="form-group label-floating">
                <label class="control-label">Kalori</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">Lemak</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">protein</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">karbohidrat</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">Kalsium</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">Natrium</label>
                <input class="form-control" type="text" name="name" value="" required>
              </div>



              <div class="text-right">
                <button class="btn btn-success btn-sm" type="submit">Tambah</button>
              </div>
            </form>
          </div>
      	</div>
      </div>
    </div>
  </div>

@endsection
