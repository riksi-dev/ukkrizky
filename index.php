<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Perhitungan Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" a href="style.css">
</head>
<body>
    <div class="text-center mb-3">
        <img src="images/LOGOO_UKK.webp" alt="Logo" style="width: 200px; height: 90;">
    </div>
    <div class="container mt-9">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center"><b>Aplikasi Perhitungan Diskon</b></h2>
                <form method="POST" class="border rounded bg-light p-6" id="discountForm">
                    <label class="form-label">Harga Barang (Rp)</label>
                    <input type="text" name="harga" class="form-control" placeholder="Masukan harga barang" required>

                    <label class="form-label">Diskon (%)</label>
                    <input type="text" maxlength="10" name="diskon" class="form-control" placeholder="Masukan diskon (0-100)">

                    <button type="submit" class="btn btn-primary w-100 mt-2" name="hitung"><b>Hitung</b></button>
                    <button type="button" class="btn btn-primary w-100 mt-2" onclick="resetForm()"><b>Reset</b></button>
                </form>

<?php
if (isset($_POST['hitung'])) {
    $harga = str_replace(',', '.', $_POST['harga']);
    $diskon = str_replace(',', '.', $_POST['diskon']);

    $harga = floatval(str_replace('.', '', $harga));
    $diskon = floatval($diskon);
    
    if (!is_numeric($harga)) {
        echo "<script>alert('Harga harus berupa angka!');</script>";
    } elseif ($harga <= 0) {
        echo "<script>alert('Harga harus lebih dari 0!');</script>";
    } elseif ($diskon < 0 || $diskon > 100) {
        echo "<script>alert('Diskon harus di angka 0-100!');</script>";
    } else {
        $nilai_diskon = $harga * ($diskon / 100);
        $total_harga = $harga - $nilai_diskon;
        ?>
        <div class="border rounded p-2 bg-light mt-2" id="result">
            <p>Harga Barang : Rp. <b><?php echo number_format($harga, 2, ',', '.'); ?></b></p>
            <p>Diskon <?php echo $diskon; ?>% : Rp. <b><?php echo number_format($nilai_diskon, 2, ',', '.'); ?></b></p>
            <p>Total Harga setelah diskon : Rp. <b><?php echo number_format($total_harga, 2, ',', '.'); ?></b></p>
        </div>
        <?php
    }
}
?>
            </div>
        </div>
    </div>
    <p class="text-center">&copy; UKK RPL 2025 || Rizky || 12 PPLG</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function resetForm() {
            document.getElementById('discountForm').reset();
            let resultDiv = document.getElementById('result');
            if (resultDiv) {
                resultDiv.innerHTML = '';
            }
        }
    </script>
</body>
</html>
