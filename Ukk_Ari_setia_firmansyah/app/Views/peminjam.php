          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Peminjam</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                       <a href="<?= base_url('/home/tambah_peminjam')?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                      <tr>
                        <th>NO</th>
                        <th>Nama Peminjam</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>NO HP</th>
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
          <td><?php echo $evan->nama_peminjam?> </td>
          <td><?php echo $evan->alamat?> </td>
          <td><?php echo $evan->email?> </td>
          <td><?php echo $evan->jk?> </td>
          <td><?php echo $evan->ttl?> </td>
          <td><?php echo $evan->nohp?> </td>

          
          
           <td> 
            <a href="<?=base_url('/home/edit_peminjam/'.$evan->user)?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
            <a href="<?=base_url('/home/hapus_peminjam/'.$evan->user)?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

          </td> 
          

        </tr>
        <?php
      }
      ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
