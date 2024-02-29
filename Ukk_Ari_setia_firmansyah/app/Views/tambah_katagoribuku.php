<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">

        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_katagoribuku/?')?>"method="post">

          

         

<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buku">Judul Buku<span class="required">*</span></label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="katagori">Nama Katagori<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="katagori" placeholder="Enter katagori" name="katagori">
                                <option value="">-PILIH-</option>
                                <?php foreach ($okta as $katagori) : ?>
                                    <option value="<?= $katagori->id_katagori ?>"><?= $katagori ->nama_katagori ?></option>
                                <?php endforeach; ?>
                            </select>
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