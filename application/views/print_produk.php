<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #007bff;
            margin-bottom: 5px;
        }
        h3 {
            color: #555;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        tfoot {
            font-weight: bold;
            background-color: #007bff;
            color: white;
        }
        .print-button {
            margin-top: 20px;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        .print-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Penjualan - Rangkuman</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Produk</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($produk as $aa) { ?>
                <tr>
                    <td><?= htmlspecialchars($no); ?></td>
                    <td><?= htmlspecialchars($aa['nama']); ?></td>
                    <td><?= htmlspecialchars($aa['kode_produk']); ?></td>
                    <td><?= htmlspecialchars($aa['stok']); ?></td>
                    <td>Rp. <?= number_format($aa['harga_jual'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($aa['harga_beli'], 0, ',', '.'); ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    window.print();
</script>
</html>
