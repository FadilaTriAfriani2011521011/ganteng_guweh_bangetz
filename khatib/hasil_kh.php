<?php
require_once('includes/init.php');

$user_role = get_role();
if ($user_role == 'admin') {
?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>

        <a href="cetak.php" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th>Nama Alternatif</th>
                            <th>Nilai</th>
                            <th width="15%">Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM hasil_kh JOIN alternatif ON hasil_kh.id_alternatif=alternatif.id_alternatif ORDER BY hasil_kh.nilai_kh DESC");
                        while ($data = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr align="center">
                                <td align="left"><?= $data['nama'] ?></td>
                                <td><?= $data['nilai_kh'] ?></td>
                                <td><?= $no; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once('template/footer.php');
} else {
    header('Location: login.php');
}
?>
