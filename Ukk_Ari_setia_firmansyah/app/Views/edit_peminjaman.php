
<div class="container">
  <form action="<?= base_url('/home/aksi_edit_peminjaman/?')?>"method="post">
    <input type="hidden" name="id" value="<?php echo $jojo->id_peminjaman?>">

<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peminjam">Nama Peminjam<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="" placehoder="Enter peminjam" name="peminjam" >
                <option value="<?php echo $jojo->peminjam?>">-PILIH-</option>
                <?php

                foreach ($jess as $evan) {
                  ?>
                  <option value ="<?= $evan->id_peminjam?>"><?php echo $evan->nama_peminjam?>

                </option>
              <?php } ?>
            </select>
          </div> 
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buku">Judul buku<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="buku" placehoder="Enter buku" name="buku" >
                <option value="<?php echo $jojo->buku?>">-PILIH-</option>
                <?php

                foreach ($jesss as $evan) {
                  ?>
                  <option value ="<?= $evan->id_buku?>"><?php echo $evan->judul?>

                </option>
              <?php } ?>
            </select>
          </div> 
        </div>

       
         

            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tanggal" placeholder="Isi Tanggal " required="required" type="date" value="<?php echo $jojo->tanggal?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_kembali">Tanggal Kembali<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tgl_kembali" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tgl_kembali" placeholder="Isi tgl_kembali " required="required" type="date" value="<?php echo $jojo->tgl_kembali?>">
            </div>
          </div>

         <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="status" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="status" placeholder="Isi status" required="required" type="text" value="<?php echo $jojo->status?>">
            </div>
          </div>
       
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>

</tr>
</body>
</html>

