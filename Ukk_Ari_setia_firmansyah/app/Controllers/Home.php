<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_model;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Teacher_model;




class Home extends BaseController
{
    public function index()
    {
        
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            echo view('login', ['num1' => $num1, 'num2' => $num2]);

    
}
public function aksi_login()
{
    $u = $this->request->getPost('username');
    $p = $this->request->getPost('password');
    $num1 = $this->request->getPost('num1'); // Get the first number from the form
    $num2 = $this->request->getPost('num2'); // Get the second number from the form
    $captchaAnswer = $this->request->getPost('captcha_answer'); // Get captcha answer from the form

    // Check if the CAPTCHA answer is empty
    if (empty($captchaAnswer)) {
        echo '<script>alert("Please enter the CAPTCHA answer."); window.location.href = "' . base_url('/Home') . '";</script>';
        return;
    }

    // Verify CAPTCHA answer
    $correctAnswer = $num1 + $num2;
    if ($captchaAnswer != $correctAnswer) {
        echo '<script>alert("Incorrect CAPTCHA answer. Please try again."); window.location.href = "' . base_url('/Home') . '";</script>';
        return;
    }

    // Proceed with login
    $model = new M_model();
    $data = array(
        'username' => $u,
        'password' => md5($p)
    );
    $cek = $model->getWhere2('user', $data);
    if ($cek > 0) {
        session()->set('id', $cek['id_user']);
        session()->set('username', $cek['username']);
        session()->set('level', $cek['level']);
        return redirect()->to('/Home/dashboard');
    } else {
        return redirect()->to('/Home');
    }
}

   public function reset_password($id)
{
    if (session()->get('id') > 0) {
        $okta = new M_model(); // Menginisialisasi objek M_model
        $data['status'] = $okta->getWhere('user', array('id_user' => session()->get('id'))); // Menggunakan $okta bukan $model
        $where = array('id_user' => $id);
        $user = array('password' => md5('12345'));
        $okta->qedit('user', $user, $where);

        echo view('header');
        echo view('menu', $data);
        echo view('footer');

        return redirect()->to('/Home/user');
    } else {
        return redirect()->to('home');
    }
}


    public function log_out()
    {

        session()->destroy();
        return redirect()->to('Home');
    }

    public function dashboard()
    {
        if (session()->get('id') > 0) {
            $model=new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header');
            echo view('menu',$data);

            $teacherModel = new Teacher_model(); // Buat objek model
            $teacherCount = $teacherModel->getTeacherCount(); // Panggil metode model

            echo view('dashboard', ['teacherCount' => $teacherCount]);
            echo view('footer');
        } else {
            return redirect()->to('/');
        }
    }
    public function user()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $on = 'user.level = level.id_level';
        $diva['okta'] = $model->join2('user', 'level', $on);

        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));

        echo view('header');
        echo view('menu',$data);
        echo view('user', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home/');
    }
}

public function petugas()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on='petugas.user=user.id_user';
            $diva['okta'] = $model->join2('petugas', 'user',$on);
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu',$data );
            echo view('petugas',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_petugas($id)
{
    $model = new M_model(); 
    $where = array('user' => $id);
    $where2 = array('id_user' => $id);
    $model->hapus('petugas', $where);
    $model->hapus('user', $where2);

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus petugas dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);

    return redirect()->to('/Home/petugas');


}

public function tambah_petugas()
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        echo view('header');
        echo view('menu',$data);
        $diva['okta'] = $model->tampil('level');
        

        return view('tambah_petugas', $diva);
        echo view('footer');
        }else{
            return redirect()->to('/Home');
        }
        
    
    }

    public function aksi_tambah_petugas()
{
    $a = $this->request->getPost('username');
    $f = $this->request->getPost('password');
    $level = $this->request->getPost('level');
    $nama_petugas = $this->request->getPost('nama_petugas');
    $g = $this->request->getPost('alamat');
    $h = $this->request->getPost('email');
    $jk = $this->request->getPost('jk');
    $ttl = $this->request->getPost('ttl');
    $nohp = $this->request->getPost('nohp');
    $nik = $this->request->getPost('nik');
     $foto= $this->request->getFile('foto');
        if($foto->isValid() && ! $foto->hasMoved())
        {
            $imageName = $foto->getName();
            $foto->move('images/',$imageName);
        }


    $data1 = array(
        'username' => $a,
        'password' =>md5($f),
        'level' => '2',
        'foto' => $imageName,
        'created_at'=>date('Y-m-d-H:i:s')
    );

    $darrel = new M_model();
    $darrel->simpan('user', $data1);

    $where = array('username' => $a);
    $ayu = $darrel->getWhere2('user', $where);
    $id = $ayu['id_user'];

    $data2 = array(
        'nama_petugas' => $nama_petugas,
        'alamat' => $g,
        'email' => $h,
        'jk' => $jk,
        'ttl' => $ttl,
        'nohp' => $nohp,
        'nik' => $nik,
        'created_at'=>date('Y-m-d-H:i:s'),
        'user' => $id
    );

    $darrel->simpan('petugas', $data2);

    return redirect()->to('/Home/petugas');
}

public function edit_petugas($user)
    {
        if(session()->get('id')>0){
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jess']=$model->tampil('level');
        $data['jojo']=$model->getWhere('petugas',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('header');
        echo view('menu',$data);
        echo view('edit_petugas',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/petugas');

        }
    }
    public function aksi_edit_petugas()
    {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $level= $this->request->getPost('level');
        $nama_petugas= $this->request->getPost('nama_petugas');
         $alamat= $this->request->getPost('alamat');
          $email= $this->request->getPost('email');
        $jk= $this->request->getPost('jk');
        $ttl= $this->request->getPost('ttl');
        $nohp= $this->request->getPost('nohp');
        $nik= $this->request->getPost('nik');
       
        $id= $this->request->getPost('id');
        $id2= $this->request->getPost('id2');

        $where=array('id_user'=>$id);
        $data1=array(
            'username'=>$a,
           'password' =>md5($b),
            'level'=>'2',

        );
        $darrel=new M_model();
        $darrel->qedit('user', $data1, $where);
        
        $where2=array('user'=>$id2);
        $data2=array(
            'nama_petugas'=>$nama_petugas,
            'alamat'=>$alamat,
            'email'=>$email,
            'jk'=>$jk,
            'ttl'=>$ttl,
            'nohp'=>$nohp,
            'nik'=>$nik
            
        );
        $darrel->qedit('petugas', $data2,$where2);

        return redirect()->to('/Home/petugas');

    }

    public function peminjam()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on='peminjam.user=user.id_user';
            $diva['okta'] = $model->join2('peminjam', 'user',$on);
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu',$data );
            echo view('peminjam',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_peminjam($id)
{
    $model = new M_model(); 
    $where = array('user' => $id);
    $where2 = array('id_user' => $id);
    $model->hapus('peminjam', $where);
    $model->hapus('user', $where2);

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus peminjam dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);

    return redirect()->to('/Home/peminjam');


}

public function tambah_peminjam()
    {
        
        $model=new m_model();

        $diva['okta'] = $model->tampil('level');
        

        return view('tambah_peminjam', $diva);
        echo view('footer');

    
    }

    public function aksi_tambah_peminjam()
{
    $a = $this->request->getPost('username');
    $f = $this->request->getPost('password');
    $level = $this->request->getPost('level');
    $nama_peminjam = $this->request->getPost('nama_peminjam');
    $g = $this->request->getPost('alamat');
    $h = $this->request->getPost('email');
    $jk = $this->request->getPost('jk');
    $ttl = $this->request->getPost('ttl');
    $nohp = $this->request->getPost('nohp');
   
     $foto= $this->request->getFile('foto');
        if($foto->isValid() && ! $foto->hasMoved())
        {
            $imageName = $foto->getName();
            $foto->move('images/',$imageName);
        }


    $data1 = array(
        'username' => $a,
        'password' =>md5($f),
        'level' => '3',
        'foto' => $imageName,
        'created_at'=>date('Y-m-d-H:i:s')
    );

    $darrel = new M_model();
    $darrel->simpan('user', $data1);

    $where = array('username' => $a);
    $ayu = $darrel->getWhere2('user', $where);
    $id = $ayu['id_user'];

    $data2 = array(
        'nama_peminjam' => $nama_peminjam,
        'alamat' => $g,
        'email' => $h,
        'jk' => $jk,
        'ttl' => $ttl,
        'nohp' => $nohp,
       
        'created_at'=>date('Y-m-d-H:i:s'),
        'user' => $id
    );

    $darrel->simpan('peminjam', $data2);

    return redirect()->to('/Home/peminjam');
}

public function edit_peminjam($user)
    {
        if(session()->get('id')>0){
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jess']=$model->tampil('level');
        $data['jojo']=$model->getWhere('peminjam',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('header');
        echo view('menu',$data);
        echo view('edit_peminjam',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/peminjam');

        }
    }
    public function aksi_edit_peminjam()
    {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $level= $this->request->getPost('level');
        $nama_peminjam= $this->request->getPost('nama_peminjam');
         $alamat= $this->request->getPost('alamat');
          $email= $this->request->getPost('email');
        $jk= $this->request->getPost('jk');
        $ttl= $this->request->getPost('ttl');
        $nohp= $this->request->getPost('nohp');
       
        $id= $this->request->getPost('id');
        $id2= $this->request->getPost('id2');

        $where=array('id_user'=>$id);
        $data1=array(
            'username'=>$a,
           'password' =>md5($b),
            'level'=>'3',

        );
        $darrel=new M_model();
        $darrel->qedit('user', $data1, $where);
        
        $where2=array('user'=>$id2);
        $data2=array(
            'nama_peminjam'=>$nama_peminjam,
            'alamat'=>$alamat,
            'email'=>$email,
            'jk'=>$jk,
            'ttl'=>$ttl,
            'nohp'=>$nohp
            
            
        );
        $darrel->qedit('peminjam', $data2,$where2);

        return redirect()->to('/Home/peminjam');

    }

     public function buku()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
           
          $diva['okta'] = $model->tampil('buku');
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu',$data );
            echo view('buku',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_buku($id)
    {
        $model=new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_buku'=>$id);
        echo view('header');
            echo view('menu',$data);
            echo view('footer');
        $model->hapus('buku',$where);
        return redirect()->to('/Home/buku');
    }

    public function tambah_buku()
    {
        // if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        echo view('header');
        echo view('menu',$data);
        $diva['okta'] = $model->tampil('buku');
        return view('tambah_buku', $diva);
        echo view('footer');
        // }else{
        //  return redirect()->to('/Home');
        // }
        
    
    }

    public function aksi_tambah_buku()
    {
        $a=$this->request->getPost('id_buku');
        $b=$this->request->getPost('judul');
        $c=$this->request->getPost('penulis');
        $d=$this->request->getPost('penerbit');
        $e=$this->request->getPost('tahun');


        
        
        $simpan=array(
            'id_buku'=>$a,
            'judul'=>$b,
            'penulis'=>$c,
            'penerbit'=>$d,
            'tahun'=>$e,
            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('buku',$simpan);
        return redirect()->to('/Home/buku');
    }



public function edit_buku($id)
    {
       
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_buku'=>$id);
        echo view('header');
        echo view('menu',$data);
        $data['jojo']=$model->getWhere('buku',$where);
        return view('edit_buku',$data);
        echo view('footer');
        
    }

    public function aksi_edit_buku()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('judul');
         $b=$this->request->getPost('penulis');
          $c=$this->request->getPost('penerbit');
           $d=$this->request->getPost('tahun');




        $where=array('id_buku'=>$id);
        $simpan=array(
            'judul'=>$a,
            'penulis'=>$b,
            'penerbit'=>$c,
            'tahun'=>$d

        );
        $model=new M_model();
        $model->qedit('buku',$simpan, $where);
        return redirect()->to('/Home/buku');

    }


      public function cari_b()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $result = $model->filter2($awal, $akhir);

        $kui['duar'] = $result;
        echo view('header');
        echo view('menu',$data);
        echo view('c_b', $kui);
        echo view('footer');
    } else {
        return redirect()->to('/Home/sampah');
    }
}

 public function katagori()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
           
          $diva['okta'] = $model->tampil('katagori');
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu',$data );
            echo view('katagori',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_katagori($id)
    {
        $model=new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_katagori'=>$id);
        echo view('header');
            echo view('menu',$data);
            echo view('footer');
        $model->hapus('katagori',$where);
        return redirect()->to('/Home/katagori');
    }

    public function tambah_katagori()
    {
        // if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        echo view('header');
        echo view('menu',$data);
        $diva['okta'] = $model->tampil('katagori');
        return view('tambah_katagori', $diva);
        echo view('footer');
        // }else{
        //  return redirect()->to('/Home');
        // }
        
    
    }

    public function aksi_tambah_katagori()
    {
        $a=$this->request->getPost('id_katagori');
        $b=$this->request->getPost('nama_katagori');



        
        
        $simpan=array(
            'id_katagori'=>$a,
            'nama_katagori'=>$b,

            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('katagori',$simpan);
        return redirect()->to('/Home/katagori');
    }



public function edit_katagori($id)
    {
       
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_katagori'=>$id);
        echo view('header');
        echo view('menu',$data);
        $data['jojo']=$model->getWhere('katagori',$where);
        return view('edit_katagori',$data);
        echo view('footer');
        
    }

    public function aksi_edit_katagori()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('nama_katagori');





        $where=array('id_katagori'=>$id);
        $simpan=array(
            'nama_katagori'=>$a
        );
        $model=new M_model();
        $model->qedit('katagori',$simpan, $where);
        return redirect()->to('/Home/katagori');

    }

 public function peminjaman()
    {
        if (session()->get('id') > 0) {
            $model = new M_model();
             $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on = 'peminjaman.peminjam = peminjam.id_peminjam';
             $on2 = 'peminjaman.buku = buku.id_buku';
            $diva['okta'] = $model->join3('peminjaman','peminjam','buku', $on, $on2);
            echo view('header');
            echo view('menu',$data);
            echo view('peminjaman', $diva);
            echo view('footer');
        } else {
            return redirect()->to('/Home/peminjaman');
        }
    }

  public function tambah_peminjaman()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $diva['okta'] = $model->tampil('peminjam');
        $diva['okt'] = $model->tampil('buku');
        echo view('header');
        echo view('menu',$data);
        echo view('tambah_peminjaman', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home');
    }
}

 public function aksi_tambah_peminjaman()
    {
        $a=$this->request->getPost('id_peminjaman');
        $b=$this->request->getPost('peminjam');
        $f=$this->request->getPost('buku');
        $c=$this->request->getPost('tanggal');
        $d=$this->request->getPost('tgl_kembali');
        $e=$this->request->getPost('status');

      
        $simpan=array(
            'id_peminjaman'=>$a,
            'peminjam'=>$b,
            'buku'=>$f,
            'tanggal'=>$c,
            'tgl_kembali'=>$d,
            'status'=>$e,

            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('peminjaman',$simpan);
        return redirect()->to('/Home/peminjaman');
    }

     public function hapus_peminjaman($id)
    {
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_peminjaman'=>$id);
        echo view('header');
           echo view('menu',$data);
            echo view('footer');
        $model->hapus('peminjaman',$where);
        return redirect()->to('/Home/peminjaman');
    }

    public function edit_peminjaman($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_peminjaman '=>$id);
        $data['jess']=$model->tampil('peminjam');
        $data['jesss']=$model->tampil('buku');
        $data['jojo']=$model->getWhere('peminjaman',$where);
        echo view('header');
        echo view('menu',$data);
        return view('edit_peminjaman',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_peminjaman');
        }
    }

    public function aksi_edit_peminjaman()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('peminjam');
        $b=$this->request->getPost('buku');
        $c=$this->request->getPost('tanggal');
        $d=$this->request->getPost('tgl_kembali');
        $e=$this->request->getPost('status');




        $where=array('id_peminjaman'=>$id);
        $simpan=array(
            'peminjam'=>$a,
            'buku'=>$b,
            'tanggal'=>$c,
            'tgl_kembali'=>$d,
            'status'=>$e

        );
        $model=new M_model();
        $model->qedit('peminjaman',$simpan, $where);
        return redirect()->to('/Home/peminjaman');

    }

    public function koleksi()
    {
        if (session()->get('id') > 0) {
            $model = new M_model();
             $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on = 'koleksi.peminjam = peminjam.id_peminjam';
             $on2 = 'koleksi.buku = buku.id_buku';
            $diva['okta'] = $model->join3('koleksi','peminjam','buku', $on, $on2);
            echo view('header');
            echo view('menu',$data);
            echo view('koleksi', $diva);
            echo view('footer');
        } else {
            return redirect()->to('/Home/koleksi');
        }
    }

  public function tambah_koleksi()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $diva['okta'] = $model->tampil('peminjam');
        $diva['okt'] = $model->tampil('buku');
        echo view('header');
        echo view('menu',$data);
        echo view('tambah_koleksi', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home');
    }
}

 public function aksi_tambah_koleksi()
    {
        $a=$this->request->getPost('id_koleksi');
        $b=$this->request->getPost('peminjam');
        $f=$this->request->getPost('buku');


      
        $simpan=array(
            'id_koleksi'=>$a,
            'peminjam'=>$b,
            'buku'=>$f,


            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('koleksi',$simpan);
        return redirect()->to('/Home/koleksi');
    }

     public function hapus_koleksi($id)
    {
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_koleksi'=>$id);
        echo view('header');
           echo view('menu',$data);
            echo view('footer');
        $model->hapus('koleksi',$where);
        return redirect()->to('/Home/koleksi');
    }

    public function edit_koleksi($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_koleksi '=>$id);
        $data['jess']=$model->tampil('peminjam');
        $data['jesss']=$model->tampil('buku');
        $data['jojo']=$model->getWhere('koleksi',$where);
        echo view('header');
        echo view('menu',$data);
        return view('edit_koleksi',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_koleksi');
        }
    }

    public function aksi_edit_koleksi()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('peminjam');
        $b=$this->request->getPost('buku');




        $where=array('id_koleksi'=>$id);
        $simpan=array(
            'peminjam'=>$a,
            'buku'=>$b

        );
        $model=new M_model();
        $model->qedit('koleksi',$simpan, $where);
        return redirect()->to('/Home/koleksi');

    }



 public function ulasan()
    {
        if (session()->get('id') > 0) {
            $model = new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on = 'ulasan.peminjam = peminjam.id_peminjam';
            $on1 = 'ulasan.buku = buku.id_buku';
            $diva['okta'] = $model->join3('ulasan', 'peminjam', 'buku', $on, $on1);
            echo view('header');
            echo view('menu',$data);
            echo view('ulasan', $diva);
            echo view('footer');
        } else {
            return redirect()->to('/Home/ulasan');
        }
    }

    public function hapus_ulasan($id)
    {
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_ulasan'=>$id);
        echo view('header');
           echo view('menu',$data);
            echo view('footer');
        $model->hapus('ulasan',$where);
        return redirect()->to('/Home/ulasan');
    }

    public function hapus_katagoribuku($id)
    {
        $model=new M_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_katagoribuku'=>$id);
        echo view('header');
           echo view('menu',$data);
            echo view('footer');
        $model->hapus('katagoribuku',$where);
        return redirect()->to('/Home/katagoribuku');
    }

    public function tambah_ulasan()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $diva['okta'] = $model->tampil('peminjam');
        $diva['okt'] = $model->tampil('buku');
        echo view('header');
        echo view('menu',$data);
        echo view('tambah_ulasan', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home');
    }
}

 public function aksi_tambah_ulasan()
    {
        $a=$this->request->getPost('id_ulasan');
        $b=$this->request->getPost('peminjam');
        $c=$this->request->getPost('buku');
        $d=$this->request->getPost('ulasan');
        $e=$this->request->getPost('rating');

      
        $simpan=array(
            'id_ulasan'=>$a,
            'peminjam'=>$b,
            'buku'=>$c,
            'ulasan'=>$d,
            'rating'=>$e,

            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('ulasan',$simpan);
        return redirect()->to('/Home/ulasan');
    }

public function edit_ulasan($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_ulasan '=>$id);
        $data['jess']=$model->tampil('peminjam');
        $data['jesss']=$model->tampil('buku');
        $data['jojo']=$model->getWhere('ulasan',$where);
        echo view('header');
        echo view('menu',$data);
        return view('edit_ulasan',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_ulasan');
        }
    }

    public function aksi_edit_ulasan()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('peminjam');
        $b=$this->request->getPost('buku');
        $c=$this->request->getPost('ulasan');
        $d=$this->request->getPost('rating');





        $where=array('id_ulasan'=>$id);
        $simpan=array(
            'peminjam'=>$a,
            'buku'=>$b,
            'ulasan'=>$c,
            'rating'=>$d

        );
        $model=new M_model();
        $model->qedit('ulasan',$simpan, $where);
        return redirect()->to('/Home/ulasan');

    }


    public function katagoribuku()
    {
        if (session()->get('id') > 0) {
            $model = new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $on = 'katagoribuku.buku = buku.id_buku';
            $on1 = 'katagoribuku.katagori = katagori.id_katagori';
            $diva['okta'] = $model->join3('katagoribuku', 'buku', 'katagori', $on, $on1);
            echo view('header');
            echo view('menu',$data);
            echo view('katagoribuku', $diva);
            echo view('footer');
        } else {
            return redirect()->to('/Home/katagoribuku');
        }
    }

    public function tambah_katagoribuku()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        
        $diva['okt'] = $model->tampil('buku');
        $diva['okta'] = $model->tampil('katagori');
        echo view('header');
        echo view('menu',$data);
        echo view('tambah_katagoribuku', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home');
    }
}

 public function aksi_tambah_katagoribuku()
    {
        $a=$this->request->getPost('id_katagoribuku');
        $c=$this->request->getPost('buku');
        $b=$this->request->getPost('katagori');

      
        $simpan=array(
            'id_katagoribuku'=>$a,
            
            'buku'=>$c,
            'katagori'=>$b,

            'created_at'=>date('Y-m-d-H:i:s')
            
        );
        $model=new M_model();
        $model->simpan('katagoribuku',$simpan);
        return redirect()->to('/Home/katagoribuku');
    }

public function edit_katagoribuku($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
         $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        $where=array('id_katagoribuku '=>$id);
        $data['jess']=$model->tampil('buku');
        $data['je']=$model->tampil('katagori');
        $data['jojo']=$model->getWhere('katagoribuku',$where);
        echo view('header');
        echo view('menu',$data);
        return view('edit_katagoribuku',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_katagoribuku');
        }
    }

    public function aksi_edit_katagoribuku()
    {
        $id=$this->request->getPost('id');

        $b=$this->request->getPost('buku');
        $c=$this->request->getPost('katagori');






        $where=array('id_katagoribuku'=>$id);
        $simpan=array(
            
            'buku'=>$b,
            'katagori'=>$c

        );
        $model=new M_model();
        $model->qedit('katagoribuku',$simpan, $where);
        return redirect()->to('/Home/katagoribuku');

    }


    public function pdf_b()
{
    $model = new M_model();
    $awal = $this->request->getPost('awal');
    $akhir = $this->request->getPost('akhir');
    $result = $model->filter2($awal, $akhir);

    $kui['duar'] = $result;

    // Load the 'c_b' view into a variable instead of echoing it directly.
    $pdf_view = view('c_b', $kui);

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($pdf_view);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('my.pdf', ['Attachment' => 0]);
}




    public function excel_barang()
{
    $model = new M_model();
    $awal = $this->request->getPost('awal');
    $akhir = $this->request->getPost('akhir');
    $data = $model->filter2($awal, $akhir);

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the headers for the Excel file
    $sheet->setCellValue('A1', 'Nama Peminjam');
    $sheet->setCellValue('B1', 'Judul Buku');
    $sheet->setCellValue('C1', 'Tanggal Peminjaman');
    $sheet->setCellValue('D1', 'Tanggal Pengembalian');
    $sheet->setCellValue('E1', 'Status Peminjaman');

    // $sheet->setCellValue('G1', 'Kelas');
    // $sheet->setCellValue('H1', 'Rombel');
    // $sheet->setCellValue('J1', 'Guru');
    // $sheet->setCellValue('K1', 'Mapel');

    // Set the data from the filtered results
    $row = 2;
    foreach ($data as $item) {
        $sheet->setCellValue('A' . $row, $item->nama_peminjam);
        $sheet->setCellValue('B' . $row, $item->judul);
        $sheet->setCellValue('C' . $row, $item->tanggal);
        $sheet->setCellValue('D' . $row, $item->tgl_kembali);
        $sheet->setCellValue('E' . $row, $item->status);
 
        // $sheet->setCellValue('G' . $row, $item->tingkat);
        // $sheet->setCellValue('H' . $row, $item->rombel);
        // $sheet->setCellValue('J' . $row, $item->nama_guru);
        // $sheet->setCellValue('K' . $row, $item->nama_mapel);
        $row++;
    }

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $fileName = 'Data Laporan peminjaman buku.xlsx';

    // Set the appropriate headers to download the Excel file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');

    // Output the file to the browser
    $writer->save('php://output');
}

    public function l_brg()
{
    // Periksa level pengguna
    $userLevel = session()->get('level');

    // Tentukan level yang diizinkan untuk mengakses fungsi
    $allowedLevels = [1, 2, 4];

    if (in_array($userLevel, $allowedLevels)) {
        $model = new M_model();
        $data['status'] = $model->getWhere('user', array('id_user' => session()->get('id')));
        $kui['kunci'] = 'view_b';

        echo view('header');
        echo view('menu', $data);
        echo view('filter', $kui);
        echo view('footer');
    } else {
        return redirect()->to('/home/');
    }
}


     public function log()
    {
        if(session()->get('level')== 1) {
        $model=new M_model();
        $where=array('log.id_user'=>session()->get('id'));
            $on='log.id_user=user.id_user';
            $diva ['okta']= $model->join_w('log', 'user',$on, $where);
            echo view('header');
            echo view('menu');
            echo view('log',$diva);
            echo view('footer');
        
    }else{
        return redirect()->to('/Home');
    }
    }





}
