
<div class="container">
  <form action="<?= base_url('/home/aksi_edit_koleksi/?')?>"method="post">
    <input type="hidden" name="id" value="<?php echo $jojo->id_koleksi?>">

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

       
         

           
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>

</tr>
</body>
</html>

