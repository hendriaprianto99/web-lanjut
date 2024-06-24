<?php include("header.php"); ?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar">
            <?php include("menu.php"); ?>
        </nav>

        <main class="col-md-10 content">
            <div class="card">
                <div class="card-header">
                    Laporan Pembelian
                </div>
                <div class="card-body">
                    <?php //isi ?>

<?php
// Include koneksi ke database
include("conn.php");

// Proses form pencarian
$tanggal_awal = isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : date('Y-m-01');
$tanggal_akhir = isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : date('Y-m-01');

// Query untuk mengambil data pembelian berdasarkan rentang tanggal
$sql_pembelian = "SELECT * FROM pembelian WHERE Tanggal BETWEEN :tanggal_awal AND :tanggal_akhir ORDER BY Tanggal ASC";
$stmt_pembelian = $conn->prepare($sql_pembelian);
$stmt_pembelian->bindParam(':tanggal_awal', $tanggal_awal);
$stmt_pembelian->bindParam(':tanggal_akhir', $tanggal_akhir);
$stmt_pembelian->execute();
$pembelians = $stmt_pembelian->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
// Form untuk filter laporan berdasarkan tanggal
echo '<form method="POST" action="laporan_pembelian.php" class="form-inline">';
echo '<div class="form-row">';
echo '<div class="col">';
echo '<input type="date" name="tanggal_awal" class="form-control" placeholder="tanggal_awal">';
echo '</div>';
echo '<div class="col">';
echo '<input type="date" name="tanggal_akhir" class="form-control" placeholder="tanggal_akhir">';
echo '</div>';
echo '<div class="col">';
echo '<button type="submit" class="btn btn-primary">Filter</button>';
echo '</div>';
echo '</div>';
echo '</form>';
?>

        <div class="row mt-4">
            <div class="col-md-12">
                <?php foreach ($pembelians as $pembelian) : ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="card-title">Pembelian: <?= htmlspecialchars($pembelian['Kode_Pembelian']) ?></h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Tanggal: <?= htmlspecialchars($pembelian['Tanggal']) ?></p>
                        <p class="card-text">Kode Supplier:
                            <?= htmlspecialchars($pembelian['Kode_Supplier']) ?></p>
                        <p class="card-text">Total Harga: Rp.
                            <?= number_format($pembelian['Total_Harga'], 0, ',', '.') ?></p>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode Detail Pembelian</th>
                                        <th>Kode Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query untuk mengambil detail pembelian berdasarkan Kode_Pembelian
                                    $sql_detail = "SELECT * FROM detail_pembelian WHERE Kode_Pembelian = :kode_pembelian";
                                    $stmt_detail = $conn->prepare($sql_detail);
                                    $stmt_detail->bindParam(':kode_pembelian', $pembelian['Kode_Pembelian']);
                                    $stmt_detail->execute();
                                    $details = $stmt_detail->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($details as $detail) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($detail['Kode_Detail_Pembelian']) ?></td>
                                        <td><?= htmlspecialchars($detail['Kode_Barang']) ?></td>
                                        <td><?= htmlspecialchars($detail['Jumlah']) ?></td>
                                        <td>Rp. <?= number_format($detail['Harga'], 0, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($detail['Total'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-JFtLNPfC/i4CtBxK8fznGQH5L/2GYtZC6qjs3CpB98tKf6ETcPUn7hCwY4l4ivce"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh/jFcPhJZhY8fRtBANSuJmU8KGUKth/kjL1r"
        crossorigin="anonymous"></script>

                    <?php //akhir isi ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include("footer.php"); ?>