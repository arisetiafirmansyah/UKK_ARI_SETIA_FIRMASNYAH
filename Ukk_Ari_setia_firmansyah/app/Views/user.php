

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <!--  <a href="<?= base_url('/home/tambah_user')?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a> -->
                      <tr>
                        <th>NO</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Reset pasword</th>
                      </tr>
                    </thead>
                 
           <tbody>
                        <?php
      $no=1;
      foreach ($okta as $evan) {

        ?>

       <tr>

          <td><?php echo $no++ ?></td>
          <td><img src="<?=base_url('images/'.$evan->foto)?>" height="100px"></td>
          <td><?php echo $evan->username?> </td>
          <td><?php echo $evan->nama_level?> </td>



          <td>
          <a class="btn btn-warning" href="<?php echo base_url('home/reset_password/'. $evan->id_user) ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
          Reset Password</a>
        </td>

        <?php
      }
      ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
