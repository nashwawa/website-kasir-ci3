<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 320px;
            margin: auto;
            border: 2px solid #000;
            padding: 15px;
            text-align: center;
            background: #f8f8f8;
            border-radius: 10px;
        }
        hr {
            border: none;
            border-top: 2px dashed #000;
        }
        .header img {
            width: 70px;
        }
        .info, .items, .total, .payment-history {
            text-align: left;
        }
        .items td {
            padding: 5px;
        }
        .barcode {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Shop Logo">
        <h2>iTaBooks Shop</h2>
        <p>Jl. Sadewa Pandawa 207, Kra<br>Phone : (0812) 33758482<br>Email : iTaBooks@gmail.com</p>
        <p><?= $nota ?></p>
    </div>
    <hr>
    <div class="info">
        <p><strong><?= $penjualan->tanggal; ?></strong> &nbsp;&nbsp; <?= $penjualan->nama; ?><br><strong>Alamat :</strong> &nbsp;&nbsp; <?= $penjualan->alamat; ?></p>
        <p><strong>No. 0-4</strong></p>
    </div>
    <hr>
    <div class="items">
        <table width="100%">
        <?php $total = 0; $no = 1; foreach ($detail as $aa) { ?>
            <tr>
                <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($no); ?></td>
                <!-- <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($aa['kode_penjualan']); ?></td> -->
                <td style="font-size: 16px;"><?= htmlspecialchars($aa['nama']); ?> <br><?= htmlspecialchars($aa['jumlah']); ?> pcs</td>
                <td align="right" style="font-size: 16px;">Rp.
                    <?= number_format($aa['harga_jual'], 0, ',', '.'); ?></td>
                <td class="text-right" style="font-size: 17px;">Rp.
                    <?= number_format($aa['jumlah'] * $aa['harga_jual'], 0, ',', '.'); ?></td>
            </tr>
        <?php 
            $total = $total+$aa['jumlah'] * $aa['harga_jual']; 
            $no++; 
        } 
        ?>  
        </table>
    </div>
    <hr>
    <div class="total">
       
        <div class="text-right" style="display: flex; justify-content: space-between; align-items: center; font-size: 17px;">
        <h2 style="margin: 0;">Total:</h2>
        <span style="font-size: 20px; font-weight: bold;">Rp. <?= number_format($total, 0, ',', '.'); ?></span>
</div>

    </div>
    <hr>
    <div class="payment">
        <p><strong>Tipe:</strong> Cash &nbsp;&nbsp;&nbsp;&nbsp; <strong>Due:</strong> <?= $penjualan->tanggal; ?></p>
    </div>
    <hr>
    <div class="barcode">
        <img src="barcode.png" alt="Barcode" width="80%">
    </div>
    <p><strong>Terima Kasih Telah Berbelanja!</strong></p>
</body>
<script>
    window.print();
</script>
</html>