<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Creator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .invoice-container {
            background: #ffffff;
            padding: 90px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-soft {
            background-color: #6c757d;
            color: white;
            border-radius: 5px;
        }
        .btn-soft:hover {
            background-color: #5a6268;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .summary-table {
            width: 30%;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="invoice-container p-8">
            <h2 class="text-center font-weight-bold">INVOICE</h2> <br>
            <div class="row">
                <div class="col-md-6">
                    <h5 style="font-size: 19px;">iTaBooks</h5>
                    <p style="font-size: 19px;">Jl. Sadewa Pandawa 207, Kra<br>Phone : (0812) 33758482<br>Email : iTaBooks@gmail.com</p>
                   
                </div>
                <div class="col-md-6 text-md-right">
                    <h5 style="font-size: 19px;">Bill To:</h5>
                    <p style="font-size: 19px;"> <?= $penjualan->nama; ?><br><?= $penjualan->alamat; ?><br> Contact Person : <?= $penjualan->telp; ?></p>
                </div>
                <div class="col-md-6 text-md-left">
                    <h5 style="font-size: 19px;"><strong>Nomor Nota : #<?= $nota ?></strong></h5>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead style=" color: white;">
                        <tr class="text-center">
                            <th style="font-size: 17px;">No</th>
                            <th style="font-size: 17px;">Produk</th>
                            <th style="font-size: 17px;">Jumlah</th>
                            <th style="font-size: 17px;">Harga Jual</th>
                            <th style="font-size: 17px;">Harga Beli</th>
                            <th style="font-size: 17px;">Total</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; $no = 1; foreach ($detail as $aa) { ?>
                        <tr>
                            <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($no); ?></td>
                            <!-- <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($aa['kode_penjualan']); ?></td> -->
                            <td style="font-size: 17px;"><?= htmlspecialchars($aa['nama']); ?></td>
                            <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($aa['jumlah']); ?></td>
                            <td class="text-right" style="font-size: 17px;">Rp.
                                <?= number_format($aa['harga_jual'], 0, ',', '.'); ?></td>
                            <td class="text-right" style="font-size: 17px;">Rp.
                                <?= number_format($aa['harga_beli'], 0, ',', '.'); ?></td>
                            <td class="text-right" style="font-size: 17px;">Rp.
                                <?= number_format($aa['jumlah'] * $aa['harga_jual'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php 
                            $total = $total+$aa['jumlah'] * $aa['harga_jual']; 
                            $no++; 
                        } 
                        ?>
                            

                        <tr class="font-weight-bold" style="background: #D7CCC8;">
                            <td colspan="5" class="text-right" style="font-size: 17px;">Total Harga:</td>
                            <td class="text-right" style="font-size: 17px;">Rp.
                                <?= number_format($total, 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- <button class="btn btn-success">+ Add Item</button> -->
            
            <!-- <table class="table summary-table mt-2">
                <tr>
                    <td style="font-size: 19px;">Sub Total</td>
                    <td class="text-right" style="font-size: 19px;"><strong>$113.00</strong></td>
                </tr>
                <tr>
                    <td style="font-size: 19px;">Tax (10%)</td>
                    <td class="text-right" style="font-size: 19px;"><strong>$1.13</strong></td>
                </tr>
                <tr>
                    <td style="font-size: 19px;"><strong>Total Due</strong></td>
                    <td class="text-right" style="font-size: 19px;"><strong>$114.13</strong></td>
                </tr>
            </table> -->
            
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- <p style="font-size: 17px;"><strong>Terms:</strong> Payment terms: net 30.</p> -->
                    <p style="font-size: 17px;">Thank you for your order!</p>
                </div>
                <div class="col-md-10 text-md-right">
                    <a href="<?= base_url('penjualan/print/'.$nota);?>">
                        <button class="btn btn-success">Cetak Nota PDF</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
