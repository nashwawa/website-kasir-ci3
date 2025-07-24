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
        <h3><?= date_format(date_create($tanggal1), "d M Y"); ?> - <?= date_format(date_create($tanggal2), "d M Y"); ?></h3>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nota</th>
                    <th>Nominal</th>
                    <th>Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0; 
                $no = 1; 
                foreach ($penjualan as $aa) { ?>
                <tr>
                    <td><?= $no; ?></td> 
                    <td><?= date_format(date_create($aa['tanggal']), "d M Y"); ?></td>
                    <td><?= htmlspecialchars($aa['kode_penjualan']); ?></td>
                    <td>Rp. <?= number_format($aa['total_harga'], 0, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($aa['nama']); ?></td> <!-- Nama pelanggan ditampilkan -->
                </tr>
                <?php 
                    $total += $aa['total_harga']; 
                    $no++; 
                } ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="3" class="text-right" style="font-size: 17px;">Total Harga:</td>
                    <td class="text-right" style="font-size: 17px;">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <button class="print-button" onclick="window.print()">Cetak Laporan</button>
    </div>
</body>
</html>
