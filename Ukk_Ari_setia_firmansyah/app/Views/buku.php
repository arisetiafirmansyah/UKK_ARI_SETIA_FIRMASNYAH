          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buku</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                       <a href="<?= base_url('/home/tambah_buku')?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                      <tr>
                        <th>NO</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                   
           <tbody>
                        <?php
      $no=1;
      foreach ($okta as $evan) {

        ?>

        <tr>

          <td><?php echo $no++ ?></td>
          <td><?php echo $evan->judul?> </td>
          <td><?php echo $evan->penulis?> </td>
          <td><?php echo $evan->penerbit?> </td>
          <td><?php echo $evan->tahun?> </td>

          
          <td> 
            <a href="<?=base_url('/home/edit_buku/'.$evan->id_buku)?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>

            <a href="<?=base_url('/home/hapus_buku/'.$evan->id_buku)?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

          </td> 
          

        </tr>
        <?php
      }
      ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
