<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">

        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_ulasan/?')?>"method="post">

         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peminjam">Nama Peminjam<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="peminjam" placeholder="Enter peminjam" name="peminjam">
                                <option value="">-PILIH-</option>
                                <?php foreach ($okta as $peminjam) : ?>
                                    <option value="<?= $peminjam->id_peminjam ?>"><?= $peminjam->nama_peminjam ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buku">Nama Peminjam<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="buku" placeholder="Enter buku" name="buku">
                                <option value="">-PILIH-</option>
                                <?php foreach ($okt as $buku) : ?>
                                    <option value="<?= $buku->id_buku ?>"><?= $buku->judul ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

         <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ulasan">Ulasan<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ulasan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ulasan" placeholder="Isi ulasan" required="required" type="text">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating">Rating<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="rating" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="rating" placeholder="Isi rating" required="required" type="text">
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