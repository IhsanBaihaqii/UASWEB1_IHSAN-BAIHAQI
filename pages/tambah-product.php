<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
  $kode = $_POST['kode_barang'];
  $nama = $_POST['nama_barang'];
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $satuan = $_POST['satuan'];
  mysqli_query($conn, "
INSERT INTO tbl_barang
(kode_barang, nama_barang, kategori, harga, stok, satuan)
VALUES
('$kode', '$nama', '$kategori', '$harga', '$stok', '$satuan')
");
  header("Location: dashboard.php?page=listProducts");
}
?>
<style>
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }
    
    .card h3 {
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .btn-tambah {
        background: #27ae60;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        margin-right: 10px;
    }
    
    .btn-hapus {
        background: #c0392b;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
</style>
<div class="card">
  <h3>Tambah Produk</h3>
  <form method="post">
    <div class="form-group">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Pakaian">Pakaian</option>
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
        <option value="Alat Tulis">Alat Tulis</option>
      </select>
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input type="number" name="harga" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Stok</label>
      <input type="number" name="stok" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Satuan</label>
      <select name="satuan" required>
        <option value="">-- Pilih Satuan --</option>
        <option value="pcs">pcs</option>
        <option value="box">box</option>
        <option value="kg">kg</option>
        <option value="kg">kg</option>
        <option value="liter">liter</option>
      </select>
    </div>
    <button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
    <a href="dashboard.php?page=listProducts" class="btn btn-hapus">Batal</a>
  </form>
</div>