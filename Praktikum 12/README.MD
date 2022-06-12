# lab11_ci Praktikum 12
## Lab11 Code Igniter : Framework Lanjutan (CRUD)

<hr>
Nama : Faza Ardan Kusuma<br>
NIM : 312010001<br>
Kelas : TI 20 B1<br>
<hr>

Disini saya mendapatkan tugas dari dosen untuk melanjutkan repository yang sebelumnya untuk melakukan Praktikum yang ke 12. Disini saya akan mempraktekkan CRUD (Create, Read, Update, dan Delete) dalan Code Igniter.<br>
<br>
Saya mulai untuk praktikumnya.<br>

### Membuat Database
Sebelum membuat database, pastikan server MySQL sudah diaktifkan. Kemudian disini saya akan membuat database dengan nama <b>lab_ci4</b>, berikut caranya:<br>
![CreateDB](Pic/createdb.png)

### Membuat Tabel
Setelah membuat database, berikutnya saya membuat tabel.<br>
```
CREATE TABLE artikel ( 
    id INT(11) auto_increment, 
    judul VARCHAR(200) NOT NULL, 
    isi TEXT, 
    gambar VARCHAR(200), 
    status TINYINT(1) DEFAULT 0, 
    slug VARCHAR(200), 
    PRIMARY KEY(id) 
);
```
![CreateTable](Pic/creaetetable.png)<br>
Bila sukses membuat tabel maka muncul seperti berikut :<br>
![CreateTable](Pic/creaetetablesuccess.png)<br>

### Konfigurasi Database
Kemudian membuat konfigurasi untuk menghubungkan dengan database server. Pada file <b>.env</b> saya akan aktifkan konfigurasinya seperti berikut :<br>
![KonfigDB](Pic/env.png)<br>
Dalam konfigurasi ini, untuk password saya hilangkan.<br>

### Membuat Model
Kemudian saya akan membuat file baru dengan nama <b>ArtikelModel.php</b> pada direktori <b>App/Models.</b>File ini berisikan syntax berikut :<br>
```
<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```

### Membuat Controller
Selanjutnya saya akan membuat controller dengan file baru pada direktori <b>app/Controllers</b> dengan nama <b>Artikel.php</b> dengan syntax berikut :<br>
```
<?php
namespace App\Controllers;
use App\Models\ArtikelModel;
class Artikel extends BaseController
{
    public function index()
    { 
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }
}
```

### Membuat View
Setelah selesai membuat Controller, saya akan membuat file baru dengan nama <b>index.php</b> pada direktori <b>app/views</b> dengan syntax berikut :<br>
```
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
<div class="col-sm-8">
    <article class="entry">
        <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"> <?=$row['judul']; ?></a></h2>
        <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?=$row['judul']; ?>">
        <p><br><?= substr($row['isi'], 0, 200); ?></p>
    </article>
    <hr class="divider" />
</div>

<?php endforeach; else: ?>
<div class="col-sm-8">
    <article class="entry">
        <h2>Belum ada data.</h2>
    </article>
</div>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
```
Kemudian saya akan lihat di browser dengan mengakses url artikel tersebut.<br>
![View](Pic/nodata.png)<br>