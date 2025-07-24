<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Penjualan Hari Ini</h4>
                </div>
                <div class="card-body">
                    Rp.
                    <?= number_format($hari_ini)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Penjualan Bulan Ini</h4>
                </div>
                <div class="card-body">
                    Rp.
                    <?= number_format($bulan_ini)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Transaksi Hari Ini</h4>
                </div>
                <div class="card-body">
                    <?= number_format($transaksi)?>
                    Penjualan
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Produk</h4>
                </div>
                <div class="card-body">
                    <?= number_format($produk)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pendapatan</h4>
                </div>
                <div class="card-body">
                    <?= number_format($total_pendapatan)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Modal</h4>
                </div>
                <div class="card-body">
                    <?= number_format($total_modal)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Laba</h4>
                </div>
                <div class="card-body">
                    <?= number_format($laba_bersih)?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php
        $nama_now = date('M');
        $nama_1 = date('M',strtotime("-1 Months"));
        $nama_2 = date('M',strtotime("-2 Months"));
        $nama_3 = date('M',strtotime("-3 Months"));
        $nama_4 = date('M',strtotime("-4 Months"));
        $nama_5 = date('M',strtotime("-5 Months"));
        
        $tanggal = date('Y-m',strtotime("-1 Months"));
        $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_1 = $this->db->get()->row()->total;

        $tanggal = date('Y-m',strtotime("-2 Months"));
        $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_2 = $this->db->get()->row()->total;

        $tanggal = date('Y-m',strtotime("-3 Months"));
        $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_3 = $this->db->get()->row()->total;

        $tanggal = date('Y-m',strtotime("-4 Months"));
        $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_4 = $this->db->get()->row()->total;

        $tanggal = date('Y-m',strtotime("-5 Months"));
        $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_5 = $this->db->get()->row()->total;

        if($bulan_1==NULL){$bulan_1=0;}
        if($bulan_2==NULL){$bulan_2=0;}
        if($bulan_3==NULL){$bulan_3=0;}
        if($bulan_4==NULL){$bulan_4=0;}
        if($bulan_5==NULL){$bulan_5=0;}
        ?>
        <div class="card card-statistic-1">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            <script>
                const xValues = ["<?= $nama_5 ?>", "<?= $nama_4 ?>", "<?= $nama_3 ?>", "<?= $nama_2 ?>", "<?= $nama_1 ?>", "<?= $nama_now ?>"];
                const yValues = [<?= $bulan_5 ?>, <?= $bulan_4 ?>, <?= $bulan_3 ?>, <?= $bulan_2 ?>, <?= $bulan_1 ?>, <?= $bulan_ini ?>];
                const barColors = ["red", "green", "blue", "orange", "brown", "pink"];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: barColors,
                                data: yValues
                            }
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "PENJUALAN 5 BULAN TERAKHIR"
                        }
                    }
                });
            </script>
        </div>
    </div>