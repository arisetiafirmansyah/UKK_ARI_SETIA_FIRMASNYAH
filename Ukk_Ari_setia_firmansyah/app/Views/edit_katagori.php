
<div class="container">
  <form action="<?= base_url('/home/aksi_edit_katagori/?')?>"method="post">
    <input type="hidden" name="id" value="<?php echo $jojo->id_katagori?>">


<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_katagori">Katagori<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama_katagori" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_katagori" placeholder="Isi Tanggal nama_katagori" required="required" type="text" value="<?php echo $jojo->nama_katagori?>">
            </div>
          </div>



        
       
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>

</tr>
</body>
</html>

