<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Data Peserta Sertifikasi</title>
</head>
<body>
    <div class="container">
    <h2>Data Peserta Sertifikasi</h2>
    <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a>
    <a href="sertifikasi.php"><button type="button" class="btn btn-primary">Sertifikasi</button></a><br><br><br>
    <a href="formulir.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
        <br><br>
        <form action="index.php" method="get">
            <div class="form-group">
                <label for="cari">Cari:</label>
                <input type="text" class="form-control" id="cari" name="cari" placeholder="Masukkan Nama Peserta">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Skema</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

<?php 
include 'koneksi.php';
$no = 1;

// Tambahkan kondisi WHERE untuk pencarian jika nilai 'cari' diset
$where = isset($_GET['cari']) ? "WHERE nm_peserta LIKE '%{$_GET['cari']}%'" : "";
                
$sql = mysqli_query($koneksi, "SELECT * FROM tb_peserta $where") or die(mysqli_error($koneksi));

while ($data = mysqli_fetch_array($sql)) {
?>
                <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $data['kd_skema']; ?></td>
                    <td><?php echo $data['nm_peserta']; ?></td>
                    <td><?php echo $data['jekel']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id_peserta']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id_peserta']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
    </div>
</body>
</html>
