<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video YouTube</title>
    <style>
        /* Teks "Selamat Datang" */
        .welcome-text {
            font-weight: bold; /* Teks tebal */
            color: blue; /* Warna teks biru */
            animation: moveText 2s linear infinite alternate; /* Animasi bergerak */
        }

        /* Animasi untuk membuat teks bergerak */
        @keyframes moveText {
            from { transform: translateX(0); } /* Mulai dari posisi awal */
            to { transform: translateX(20px); } /* Pindahkan ke kanan sejauh 20px */
        }
    </style>
</head>
<body>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <!-- Teks "Selamat Datang" dengan animasi bergerak -->
                <h1 class="h1 welcome-text">Selamat Datang <?php echo session()->get('username') ?></h1>
            </div>
            <!-- Ganti URL video YouTube dengan video yang ingin Anda tampilkan -->
            <iframe width="1200" height="700" src="https://www.youtube.com/embed/OyYQsCfbCLU?si=Kmnq1fy5ee-p17-e" frameborder="0" allowfullscreen></iframe>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <!-- Teks "Super Admin" dengan animasi bergerak -->
                                <div class="super-admin">Peminjam</div> 
                                <!-- Ganti $teacherCount dengan variabel yang berisi jumlah peminjam -->
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teacherCount; ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- Tambahkan informasi tambahan yang Anda ingin tampilkan di sini -->
                                </div>
                            </div>
                            <!-- Bagian lain dari kode Anda -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
