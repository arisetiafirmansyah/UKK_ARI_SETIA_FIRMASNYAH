
<div class="container">
  <form action="<?= base_url('/home/aksi_edit_buku/?')?>"method="post">
    <input type="hidden" name="id" value="<?php echo $jojo->id_buku?>">

<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul Buku<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="judul" placeholder="Isi Tanggal judul" required="required" type="text" value="<?php echo $jojo->judul?>">
            </div>
          </div>


<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penulis">Penulis<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="penulis" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="penulis" placeholder="Isi Tanggal penulis" required="required" type="text" value="<?php echo $jojo->penulis?>">
            </div>
          </div>

<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerbit">Penerbit<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="penerbit" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="penerbit" placeholder="Isi Tanggal penerbit" required="required" type="text" value="<?php echo $jojo->penerbit?>">
            </div>
          </div>


<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun Terbit<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tahun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tahun" placeholder="Isi Tanggal tahun" required="required" type="text" value="<?php echo $jojo->tahun?>">
            </div>
          </div>


        
       
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>

</tr>
</body>
</html>

