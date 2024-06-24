<?php include("header.php"); ?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar">
            <?php include("menu.php"); ?>
        </nav>

        <main class="col-md-10 content">
            <div class="card">
                <div class="card-header">
                    Transaksi Pembelian
                </div>
                <div class="card-body">
                    <?php include("conn.php"); ?>

                    <form method="POST" action="simpan_transaksi.php">
                        <?php //master ?>
                        <div class="form-group">
                            <label for="Kode_Pembelian">Kode Pembelian :</label>
                            <input type="text" name="Kode_Pembelian" class="form-control" id="Kode_Pembelian" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Tanggal">Tanggal :</label>
                            <input type="date" name="Tanggal" class="form-control" id="Tanggal" readonly>
                        </div>
                        <?php
                        // Ambil data supplier
                        $stmt = $conn->prepare("SELECT Kode_Supplier, Nama FROM supplier");
                        $stmt->execute();
                        $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="form-group">
                            <label for="Kode_Supplier">Kode Supplier :</label>
                            <select name="Kode_Supplier" class="form-control" id="Kode_Supplier" required>
                                <?php
                                if (!empty($suppliers)) {
                                    foreach ($suppliers as $supplier) {
                                        echo "<option value='" . htmlspecialchars($supplier["Kode_Supplier"]) . "'>" . htmlspecialchars($supplier["Kode_Supplier"]) . " - " . htmlspecialchars($supplier["Nama"]) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Tidak ada supplier</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php //akhir master ?>

                        <?php //detail ?>
                        <?php
                        // Ambil data barang
                        $stmt_barang = $conn->prepare("SELECT Kode_Barang, Nama, Harga_Beli FROM barang");
                        $stmt_barang->execute();
                        $barang = $stmt_barang->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_pembelian">
                                    <tr>
                                        <td>
                                            <select name="Kode_Barang[]" class="form-control kode_barang" required>
                                                <option value="">Pilih Barang</option>
                                                <?php
                                                if (!empty($barang)) {
                                                    foreach ($barang as $item) {
                                                        echo "<option value='" . htmlspecialchars($item["Kode_Barang"]) . "' data-nama='" . htmlspecialchars($item["Nama"]) . "' data-harga='" . htmlspecialchars($item["Harga_Beli"]) . "'>" . htmlspecialchars($item["Kode_Barang"]) . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>Tidak ada barang</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="Nama_Barang[]" class="form-control nama_barang" readonly></td>
                                        <td><input type="number" name="Harga[]" class="form-control harga_barang" readonly required></td>
                                        <td><input type="number" name="Jumlah[]" class="form-control jumlah_barang" value="1" required></td>
                                        <td><input type="number" name="Total[]" class="form-control total_barang" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" id="tambah_barang">Tambah Barang</button>
                        </div>

                        <div class="form-group">
                            <label for="Total_Harga">Total Harga :</label>
                            <input type="number" name="Total_Harga" class="form-control" id="Total_Harga" readonly>
                        </div>
                        <?php //akhir detail ?>

                        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                    </form>

                    <script>
                        // Fungsi untuk mengisi Kode_Pembelian dan Tanggal secara otomatis
                        function isiKodePembelianDanTanggal() {
                            let sekarang = new Date();
                            let tahun = sekarang.getFullYear();
                            let bulan = ("0" + (sekarang.getMonth() + 1)).slice(-2);
                            let hari = ("0" + sekarang.getDate()).slice(-2);
                            let jam = ("0" + sekarang.getHours()).slice(-2);
                            let menit = ("0" + sekarang.getMinutes()).slice(-2);
                            let detik = ("0" + sekarang.getSeconds()).slice(-2);
                            let kodePembelian = `Beli${tahun}${bulan}${hari}${jam}${menit}${detik}`;
                            let tanggal = `${tahun}-${bulan}-${hari}`;

                            document.getElementById('Kode_Pembelian').value = kodePembelian;
                            document.getElementById('Tanggal').value = tanggal;
                        }

                        function hitungTotalHarga() {
                            let totalHarga = 0;
                            document.querySelectorAll('.total_barang').forEach(function(total) {
                                totalHarga += parseFloat(total.value) || 0;
                            });
                            document.getElementById('Total_Harga').value = totalHarga;
                        }

                        document.getElementById('tambah_barang').addEventListener('click', function() {
                            var detailPembelian = document.getElementById('detail_pembelian');
                            var newRow = document.createElement('tr');
                            newRow.innerHTML = `
                                <td>
                                    <select name="Kode_Barang[]" class="form-control kode_barang" required>
                                        <option value="">Pilih Barang</option>
                                        <?php
                                        if (!empty($barang)) {
                                            foreach ($barang as $item) {
                                                echo "<option value='" . htmlspecialchars($item["Kode_Barang"]) . "' data-nama='" . htmlspecialchars($item["Nama"]) . "' data-harga='" . htmlspecialchars($item["Harga_Beli"]) . "'>" . htmlspecialchars($item["Kode_Barang"]) . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>Tidak ada barang</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="text" name="Nama_Barang[]" class="form-control nama_barang" readonly></td>
                                <td><input type="number" name="Harga[]" class="form-control harga_barang" readonly required></td>
                                <td><input type="number" name="Jumlah[]" class="form-control jumlah_barang" value="1" required></td>
                                <td><input type="number" name="Total[]" class="form-control total_barang" readonly></td>
                            `;
                            detailPembelian.appendChild(newRow);
                        });

                        document.addEventListener('change', function(e) {
                            if (e.target.classList.contains('kode_barang')) {
                                var selectedOption = e.target.options[e.target.selectedIndex];
                                var nama = selectedOption.getAttribute('data-nama');
                                var harga = selectedOption.getAttribute('data-harga');
                                var row = e.target.closest('tr');
                                row.querySelector('.nama_barang').value = nama;
                                row.querySelector('.harga_barang').value = harga;
                                var jumlah = row.querySelector('.jumlah_barang').value;
                                var total = harga * jumlah;
                                row.querySelector('.total_barang').value = total;
                                hitungTotalHarga();
                            }
                        });

                        document.addEventListener('input', function(e) {
                            if (e.target.classList.contains('jumlah_barang')) {
                                var row = e.target.closest('tr');
                                var harga = row.querySelector('.harga_barang').value;
                                var jumlah = e.target.value;
                                var total = harga * jumlah;
                                row.querySelector('.total_barang').value = total;
                                hitungTotalHarga();
                            }
                        });

                        // Panggil fungsi untuk mengisi Kode_Pembelian dan Tanggal saat halaman dimuat
                        window.onload = isiKodePembelianDanTanggal;
                    </script>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include("footer.php"); ?>
