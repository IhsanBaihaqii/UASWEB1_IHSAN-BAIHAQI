<?php
include 'koneksi.php';
$id = $_GET['id'];
/* PROSES UPDATE */
if (isset($_POST['update'])) {
  mysqli_query($conn, "
UPDATE tbl_barang SET
kode_barang='$_POST[kode_barang]',
nama_barang='$_POST[nama_barang]',
kategori='$_POST[kategori]',
harga='$_POST[harga]',
stok='$_POST[stok]',
satuan='$_POST[satuan]'
WHERE id_barang='$id'
");
  header("Location: dashboard.php?page=listproducts");
}
/* AMBIL DATA */
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM tbl_barang WHERE id_barang='$id'")
);
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
    
    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .btn-edit {
        background: #2980b9;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }
    
    .btn-hapus {
        background: #c0392b;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<div class="card">
  <h3>Edit Produk</h3>
  <form method="post">
    <div class="form-group">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" value="<?= $data['kode_barang']; ?>"
        required>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>"
        required>
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <input type="text" name="kategori" value="<?= $data['kategori']; ?>">
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
    </div>
    <div class="form-group">
      <label>Stok</label>
      <input type="number" name="stok" value="<?= $data['stok']; ?>" required>
    </div>
    <div class="form-group">
      <label>Satuan</label>
      <input type="text" name="satuan" value="<?= $data['satuan']; ?>">
    </div>
    <button type="submit" name="update" class="btn-edit">Update</button>
    <a href="dashboard.php?page=listProducts" class="btn-hapus">Batal</a>
  </form>
</div>