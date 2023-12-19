<?php
require_once('includes/init.php');

$user_role = get_role();
if ($user_role == 'admin') {

	$page = "Perhitungan";
	require_once('template/header.php');

	mysqli_query($koneksi, "TRUNCATE TABLE hasil;");

	$kriteria_bl = array();
	$q1 = mysqli_query($koneksi, "SELECT * FROM kriteria_bilal ORDER BY kode_kriteria_bilal ASC");
	while ($krit = mysqli_fetch_array($q1)) {
		$kriteria_bl[$krit['id_kriteria_bilal']]['id_kriteria_bilal'] = $krit['id_kriteria_bilal'];
		$kriteria_bl[$krit['id_kriteria_bilal']]['kode_kriteria_bilal'] = $krit['kode_kriteria_bilal'];
		$kriteria_bl[$krit['id_kriteria_bilal']]['nama_bilal'] = $krit['nama_bilal'];
		$kriteria_bl[$krit['id_kriteria_bilal']]['type_bilal'] = $krit['type_bilal'];
		$kriteria_bl[$krit['id_kriteria_bilal']]['bobot_bilal'] = $krit['bobot_bilal'];
		$kriteria_bl[$krit['id_kriteria_bilal']]['ada_pilihan_bilal'] = $krit['ada_pilihan_bilal'];
	}

	$alternatif = array();
	$q2 = mysqli_query($koneksi, "SELECT * FROM alternatif");
	while ($alt = mysqli_fetch_array($q2)) {
		$alternatif[$alt['id_alternatif']]['id_alternatif'] = $alt['id_alternatif'];
		$alternatif[$alt['id_alternatif']]['nama'] = $alt['nama'];
	}
?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matrix Keputusan (X)</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<th width="5%" rowspan="2">No</th>
							<th>Nama Alternatif</th>
							<?php foreach ($kriteria_bl as $key) : ?>
								<th><?= $key['kode_kriteria_bilal'] ?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatif as $keys) : ?>
							<tr align="center">
								<td><?= $no; ?></td>
								<td align="left"><?= $keys['nama'] ?></td>
								<?php foreach ($kriteria_bl as $key) : ?>
									<td>
										<?php
										if ($key['ada_pilihan_bilal'] == 1) {
											$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai_bl FROM penilaian_bl JOIN sub_kriteria WHERE penilaian_bl.nilai_bl=sub_kriteria.id_sub_kriteria AND penilaian_bl.id_alternatif='$keys[id_alternatif]' AND penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$data = mysqli_fetch_array($q4);
											echo $data['nilai_bl'];
										} else {
											$q4 = mysqli_query($koneksi, "SELECT nilai_bl FROM penilaian_bl WHERE id_alternatif='$keys[id_alternatif]' AND id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$data = mysqli_fetch_array($q4);
											echo $data['nilai_bl'];
										}
										?>
									</td>
								<?php endforeach ?>
							</tr>
						<?php
							$no++;
						endforeach
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Ternormalisasi (R)</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<th width="5%" rowspan="2">No</th>
							<th>Nama Alternatif</th>
							<?php foreach ($kriteria_bl as $key) : ?>
								<th><?= $key['kode_kriteria_bilal'] ?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatif as $keys) : ?>
							<tr align="center">
								<td><?= $no; ?></td>
								<td align="left"><?= $keys['nama'] ?></td>
								<?php foreach ($kriteria_bl as $key) : ?>
									<td>
										<?php
										if ($key['ada_pilihan_bilal'] == 1) {
											$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai_bl FROM penilaian_bl JOIN sub_kriteria WHERE penilaian_bl.nilai_bl=sub_kriteria.id_sub_kriteria AND penilaian_bl.id_alternatif='$keys[id_alternatif]' AND penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt1 = mysqli_fetch_array($q4);

											$q5 = mysqli_query($koneksi, "SELECT MAX(sub_kriteria.nilai__bl) as max, MIN(sub_kriteria.nilai_bl) as min, kriteria_bilal.type_bilal FROM penilaian_bl JOIN sub_kriteria ON penilaian_bl.nilai_bl=sub_kriteria.id_sub_kriteria JOIN kriteria_bilal ON penilaian_bl.id_kriteria_bilal=kriteria_bilal.id_kriteria_bilal WHERE penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt2 = mysqli_fetch_array($q5);
											if ($dt2['type_bilal'] == "Benefit") {
												echo $dt1['nilai_bl'] / $dt2['max'];
											} else {
												echo $dt2['min'] / $dt1['nilai_bl'];
											}
										} else {
											$q4 = mysqli_query($koneksi, "SELECT nilai_bl FROM penilaian_bl WHERE id_alternatif='$keys[id_alternatif]' AND id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt1 = mysqli_fetch_array($q4);

											$q5 = mysqli_query($koneksi, "SELECT MAX(penilaian_bl.nilai_bl) as max, MIN(penilaian_bl.nilai_bl) as min, kriteria_bilal.type_bilal FROM penilaian_bl JOIN kriteria_bilal ON penilaian_bl.id_kriteria_bilal=kriteria_bilal.id_kriteria_bilal WHERE penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt2 = mysqli_fetch_array($q5);
											if ($dt2['type_bilal'] == "Benefit") {
												echo $dt1['nilai_bl'] / $dt2['max'];
											} else {
												echo $dt2['min'] / $dt1['nilai_bl'];
											}
										}
										?>
									</td>
								<?php endforeach ?>
							</tr>
						<?php
							$no++;
						endforeach
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Preferensi (W)</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<?php foreach ($kriteria_bl as $key) : ?>
								<th><?= $key['kode_kriteria_bilal'] ?> (<?= $key['type_bilal'] ?>)</th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<tr align="center">
							<?php foreach ($kriteria_bl as $key) : ?>
								<td>
									<?php
									echo $key['bobot_bilal'];
									?>
								</td>
							<?php endforeach ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan (V)</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<th width="5%" rowspan="2">No</th>
							<th>Nama Alternatif</th>
							<th>Perhitungan</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatif as $keys) : ?>
							<tr align="center">
								<td><?= $no; ?></td>
								<td align="left"><?= $keys['nama'] ?></td>
								<td>
									SUM
									<?php
									$nilai_v = 0;
									foreach ($kriteria_bl as $key) :
										$bobot_bl = $key['bobot_bilal'];
										if ($key['ada_pilihan_bilal'] == 1) {
											$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai_bl FROM penilaian_bl JOIN sub_kriteria WHERE penilaian_bl.nilai_bl=sub_kriteria.id_sub_kriteria AND penilaian_bl.id_alternatif='$keys[id_alternatif]' AND penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt1 = mysqli_fetch_array($q4);

											$q5 = mysqli_query($koneksi, "SELECT MAX(sub_kriteria.nilai_bl) as max, MIN(sub_kriteria.nilai_bl) as min, kriteria_bilal.type_bilal FROM penilaian_bl JOIN sub_kriteria ON penilaian_bl.nilai_bl=sub_kriteria.id_sub_kriteria JOIN kriteria_bilal ON penilaian_bl.id_kriteria_bilal=kriteria_bilal.id_kriteria_bilal WHERE penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt2 = mysqli_fetch_array($q5);
											if ($dt2['type_bilal'] == "Benefit") {
												$nilai_r = $dt1['nilai_bl'] / $dt2['max'];
											} else {
												$nilai_r = $dt2['min'] / $dt1['nilai_bl'];
											}
										} else {
											$q4 = mysqli_query($koneksi, "SELECT nilai_bl FROM penilaian_bl WHERE id_alternatif='$keys[id_alternatif]' AND id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt1 = mysqli_fetch_array($q4);

											$q5 = mysqli_query($koneksi, "SELECT MAX(penilaian_bl.nilai_bl) as max, MIN(penilaian_bl.nilai_bl) as min, kriteria_bilal.type_bilal FROM penilaian_bl JOIN kriteria_bilal ON penilaian_bl.id_kriteria_bilal=kriteria_bilal.id_kriteria_bilal WHERE penilaian_bl.id_kriteria_bilal='$key[id_kriteria_bilal]'");
											$dt2 = mysqli_fetch_array($q5);
											if ($dt2['type_bilal'] == "Benefit") {
												$nilai_r = $dt1['nilai_bl'] / $dt2['max'];
											} else {
												$nilai_r = $dt2['min'] / $dt1['nilai_bl'];
											}
										}
										$nilai_penjumlahan_bl = $bobot_bl * $nilai_r;
										$nilai_v += $nilai_penjumlahan_bl;
										echo "(" . $bobot_bl . "x" . $nilai_r . ") ";
									endforeach ?>
								</td>
								<td>
									<?php
									echo $nilai_v;
									mysqli_query($koneksi, "INSERT INTO hasil_bl (id_hasil_bl, id_alternatif, nilai_bl) VALUES ('', '$keys[id_alternatif]', '$nilai_v')");
									?>
								</td>
							</tr>
						<?php
							$no++;
						endforeach
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