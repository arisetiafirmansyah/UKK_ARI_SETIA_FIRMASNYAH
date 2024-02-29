<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Laporan Peminjaman Barang</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
          <a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
     
      <form class="form-horizontal form-label-left" novalidate action="<?= ($kunci == 'view_b') ? base_url('home/cari_b') : '#' ?>" method="post">

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal awal </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal akhir</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" class="btn btn-warning"><i class="fa fa-print"></i></button>
          </div>
        </div>
      </form>

    </div>

    <!-- <div class="x_content"> -->
    <form class="form-horizontal form-label-left" novalidate action="<?= ($kunci == 'view_b') ? base_url('home/pdf_b') : '#' ?>" method="post">
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal awal </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal akhir</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
          <button id="send" type="submit" class="btn btn-danger"><i class="fa fa-print"></i></button>
        </div>
      </div>
    </form>

    <form class="form-horizontal form-label-left" novalidate action="<?= ($kunci == 'view_b') ? base_url('home/excel_barang') : '#' ?>" method="post">
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal awal </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal akhir</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
