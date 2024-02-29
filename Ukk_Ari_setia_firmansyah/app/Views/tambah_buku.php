<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_buku/?')?>"method="post">


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul Buku<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="judul" placeholder="Isi judul" required="required" type="text">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penulis">Penulis<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="penulis" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="penulis" placeholder="Isi penulis" required="required" type="text">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerbit">Penerbit<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="penerbit" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="penerbit" placeholder="Isi penerbit" required="required" type="text">
            </div>
          </div>

         <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun Ajaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tahun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tahun" placeholder="Isi tahun" required="required" type="text">
            </div>
          </div>

          
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>