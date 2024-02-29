
<div class="container">
  <form action="<?= base_url('/home/aksi_edit_ulasan/?')?>"method="post">
    <input type="hidden" name="id" value="<?php echo $jojo->id_ulasan?>">

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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ulasan">Ulasan<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ulasan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ulasan" placeholder="Isi ulasan" required="required" type="text" value="<?php echo $jojo->ulasan?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating">Rating<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="rating" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="rating" placeholder="Isi rating" required="required" type="text" value="<?php echo $jojo->rating?>">
            </div>
          </div>
       
       
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>

</tr>
</body>
</html>

