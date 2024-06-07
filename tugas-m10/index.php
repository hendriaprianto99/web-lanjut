<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Barang</title>
</head>
<body>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DATA BARANG</div>
                <div class="card-body">
                    <a href="tambah-barang.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">NO.</th>
                            <th scope="col">KODE</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('conn.php');
                        $no = 1;
                        $result = $connection->query("SELECT * FROM barang");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['Kode'] ?></td>
                                    <td><?php echo $row['Nama'] ?></td>
                                    <td><?php echo $row['Harga'] ?></td>
                                    <td class="text-center">
                                        <a href="edit-barang.php?Kode=<?php echo $row['Kode'] ?>"
                                           class="btn btn-sm btn-primary">EDIT</a>
                                        <a href="hapus-barang.php?Kode=<?php echo $row['Kode'] ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">HAPUS</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "Data Kosong";
                        }
                        $connection->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
