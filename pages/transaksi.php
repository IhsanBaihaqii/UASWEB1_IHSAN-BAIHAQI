<?php
include "koneksi.php";

// ambil data barang
$q = mysqli_query($conn, "SELECT * FROM tbl_barang");
$data_barang = mysqli_fetch_all($q, MYSQLI_ASSOC);

// session keranjang
if (!isset($_SESSION['barang'])) {
    $_SESSION['barang'] = [];
}

$keranjang = $_SESSION['barang'];
$grandtotal = 0;
?>

<style>
form {
    margin-bottom: 20px;
}
label {
    font-weight: bold;
}
select, input {
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    width: 200px;
}
button {
    padding: 8px 12px;
    background-color: #27ae60;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer
}
button:hover {
    background-color: #1e8449;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}
th {
    background-color: #f8f8f8;
}
</style>

<form method="post">
    <h2>TRANSAKSI</h2>
    <label>Barang</label><br>
    <select name="id_barang" required>
        <option value="">-- pilih --</option>
        <?php foreach ($data_barang as $b): ?>
            <option value="<?= $b['id_barang'] ?>">
                <?= $b['kode_barang'] ?> | <?= $b['nama_barang'] ?>
            </option>
        <?php endforeach ?>
    </select><br><br>

    <label>Jumlah</label><br>
    <input type="number" name="jumlah" value="1" min="1" required><br><br>

    <button type="submit" name="tambah_barang">Tambah</button>
</form>


<hr>

<?php if (!empty($keranjang)): ?>
<table border="1" cellpadding="8">
<tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Aksi</th>
</tr>

<?php foreach ($keranjang as $k): 
    $total = $k['harga'] * $k['qty'];
    $grandtotal += $total;
?>
<tr>
    <td><?= $k['kode'] ?></td>
    <td><?= $k['nama'] ?></td>
    <td><?= number_format($k['harga']) ?></td>
    <td><?= $k['qty'] ?></td>
    <td><?= number_format($total) ?></td>
    <td><a href="?hapus=<?= $k['id_barang'] ?>">Hapus</a></td>
</tr>
<?php endforeach ?>

<tr>
    <td colspan="4"><b>Grand Total</b></td>
    <td colspan="2"><b><?= number_format($grandtotal) ?></b></td>
</tr>
</table>

<br>

<form method="post">
    <input type="hidden" name="id_customer" value="2">
    <button type="submit" name="simpan_transaksi">
        Simpan Transaksi
    </button>
</form>

<br>
<a href="?reset=1">Reset Keranjang</a>
<?php else: ?>
<p>Keranjang kosong</p>
<?php endif ?>