<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('img/logo/logo.png') ?>" rel="icon">
  <title>Penjadwalan- Dashboard</title>
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('css/ruang-admin.min.css') ?>" rel="stylesheet">
  <style>
    /* Tambahkan gaya CSS berikut */
    .form-container {
      border: 2px solid blue; /* warna biru */
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                   <h2 style="color: blue; text-align: center;">Form Tambah Peminjam</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- Tambahkan kelas form-container untuk menambahkan gaya batasan -->
                  <form class="form-horizontal form-label-left form-container" novalidate action="<?= base_url('/home/aksi_tambah_peminjam') ?>" method="post" enctype="multipart/form-data">
                    <!-- Isi form di sini -->
                    <div class="form-group">
                      <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage()">
                        <img id="preview" src="" alt="" style="max-width: 100px; margin-top: 10px;">
                      </div>
                    </div>
                    <!-- Form input fields -->
                    <!-- You can add more form inputs here -->
                    <div class="form-group">
                      <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="username" placeholder="Isi username" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="password" placeholder="Isi password" required="required" type="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama_peminjam" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Peminjam<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="nama_peminjam" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_peminjam" placeholder="Isi nama nama_peminjam" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="alamat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="alamat" placeholder="Isi alamat" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="Isi email" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jk" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="jk">
                          <option>Pilih</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ttl" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="ttl" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ttl" placeholder="Isi Tanggal Lahir" required="required" type="date">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nohp" class="control-label col-md-3 col-sm-3 col-xs-12">NOHP<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="nohp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nohp" placeholder="Isi nama nohp" required="required" type="text">
                      </div>
                    </div>
                    <!-- End of form input fields -->
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
        </div>
      </div>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('js/ruang-admin.min.js') ?>"></script>
  <!-- Optional: Add more scripts here -->
</body>

</html>
