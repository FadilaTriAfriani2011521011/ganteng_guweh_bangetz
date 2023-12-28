<?php
require_once('includes/init.php');

$user_role = get_role();
if ($user_role == 'admin') {

	$page = "Perhitungan Khatib";
	require_once('template/header.php');

	mysqli_query($koneksi, "TRUNCATE TABLE hasil;");

	$kriteria_kh = array();
	$q1 = mysqli_query($koneksi, "SELECT * FROM kriteria_kh ORDER BY kode_kriteria_kh ASC");
	while ($krit = mysqli_fetch_array($q1)) {
		$kriteria_kh[$krit['id_kriteria_kh']]['id_kriteria_kh'] = $krit['id_kriteria_kh'];
		$kriteria_kh[$krit['id_kriteria_kh']]['kode_kriteria_kh'] = $krit['kode_kriteria_kh'];
		$kriteria_kh[$krit['id_kriteria_kh']]['nama_kh'] = $krit['nama_kh'];
		$kriteria_kh[$krit['id_kriteria_kh']]['type_kh'] = $krit['type_kh'];
		$kriteria_kh[$krit['id_kriteria_kh']]['bobot_kh'] = $krit['bobot_kh'];
		$kriteria_kh[$krit['id_kriteria_kh']]['ada_pilihan_kh'] = $krit['ada_pilihan_kh'];
	}

	$alternatif_kh = array();
	$q2 = mysqli_query($koneksi, "SELECT * FROM alternatif");
	while ($alt = mysqli_fetch_array($q2)) {
		$alternatif_kh[$alt['id_alternatif']]['id_alternatif'] = $alt['id_alternatif'];
		$alternatif_kh[$alt['id_alternatif']]['nama'] = $alt['nama'];
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
							<?php foreach ($kriteria_kh as $key): ?>
								<th>
									<?= $key['kode_kriteria_kh'] ?>
								</th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatif_kh as $keys): ?>
							<tr align="center">
								<td>
									<?= $no; ?>
								</td>
								<td align="left">
									<?= $keys['nama'] ?>
								</td>
								<?php foreach ($kriteria_kh as $key): ?>
									<td>
										<?php
										$id_alternatif = mysqli_real_escape_string($koneksi, $keys['id_alternatif']);
										$id_kriteria_kh = mysqli_real_escape_string($koneksi, $key['id_kriteria_kh']);
										
										$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai FROM penilaian_kh 
										JOIN sub_kriteria ON penilaian_kh.id_sub_kriteria = sub_kriteria.id_sub_kriteria 
										WHERE penilaian_kh.id_alternatif='{$id_alternatif}' 
										AND penilaian_kh.id_kriteria_kh='{$id_kriteria_kh}'");
										


										$data_kh = mysqli_fetch_array($q4);
										if ($data_kh !== null) {
											echo $data_kh['nilai'];
										}
										?>
									</td>
								<?php endforeach ?>
							</tr>
							<?php
							$no++;
						endforeach ?>
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
							<?php foreach ($kriteria_kh as $key): ?>
								<th>
									<?= $key['kode_kriteria_kh'] ?>
								</th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatif_kh as $keys): ?>
							<tr align="center">
								<td>
									<?= $no; ?>
								</td>
								<td align="left">
									<?= $keys['nama'] ?>
								</td>
								<?php foreach ($kriteria_kh as $key): ?>
									<td>
										<?php
										$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai FROM penilaian_kh JOIN sub_kriteria ON penilaian_kh.nilai_kh=sub_kriteria.id_sub_kriteria WHERE penilaian_kh.id_alternatif='{$keys['id_alternatif']}' AND penilaian_kh.id_kriteria_kh='{$key['id_kriteria_kh']}'");
										$dt1 = mysqli_fetch_array($q4);

										$q5 = mysqli_query($koneksi, "SELECT MAX(sub_kriteria.nilai) as max, MIN(sub_kriteria.nilai) as min, kriteria_kh.type_kh FROM penilaian_kh JOIN sub_kriteria ON penilaian_kh.nilai_kh=sub_kriteria.id_sub_kriteria JOIN kriteria_kh ON penilaian_kh.id_kriteria_kh=kriteria_kh.id_kriteria_kh WHERE penilaian_kh.id_kriteria_kh='{$key['id_kriteria_kh']}'");
										$dt2 = mysqli_fetch_array($q5);

										// Check if $dt1 and $dt2 are not null before accessing their array offsets
										if ($dt1 !== null && $dt2 !== null) {
											// Check if $dt2['max'] is not zero before performing division
											if ($dt2['type_kh'] == "Benefit" && $dt2['max'] != 0) {
												echo $dt1['nilai'] / $dt2['max'];
											} else {
												// Add additional check to prevent division by zero
												if ($dt1['nilai'] != 0) {
													echo $dt2['min'] / $dt1['nilai'];
												} else {
													echo "N/A"; // Handle division by zero gracefully, you can customize this part based on your requirements
												}
											}
										} else {
											echo "N/A"; // Handle the case where $dt1 or $dt2 is null
										}
										?>
									</td>
								<?php endforeach ?>


							</tr>
							<?php
							$no++;
						endforeach ?>
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
							<?php foreach ($kriteria_kh as $key): ?>
								<th>
									<?= $key['kode_kriteria_kh'] ?> (
									<?= $key['type_kh'] ?>)
								</th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<tr align="center">
							<?php foreach ($kriteria_kh as $key): ?>
								<td>
									<?php
									echo $key['bobot_kh'];
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
						foreach ($alternatif_kh as $keys): ?>
							<tr align="center">
								<td>
									<?= $no; ?>
								</td>
								<td align="left">
									<?= $keys['nama'] ?>
								</td>
								<td>
									SUM
									<?php
									$nilai_v = 0;
									foreach ($kriteria_kh as $key):
										$bobot = $key['bobot_kh'];
										$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai FROM penilaian_kh JOIN sub_kriteria ON penilaian_kh.nilai_kh=sub_kriteria.id_sub_kriteria WHERE penilaian_kh.id_alternatif='{$keys['id_alternatif']}' AND penilaian_kh.id_kriteria_kh='{$key['id_kriteria_kh']}'");
										$dt1 = mysqli_fetch_array($q4);

										$q5 = mysqli_query($koneksi, "SELECT MAX(sub_kriteria.nilai) as max, MIN(sub_kriteria.nilai) as min, kriteria_kh.type_kh FROM penilaian_kh JOIN sub_kriteria ON penilaian_kh.nilai_kh=sub_kriteria.id_sub_kriteria JOIN kriteria_kh ON penilaian_kh.id_kriteria_kh=kriteria_kh.id_kriteria_kh WHERE penilaian_kh.id_kriteria_kh='{$key['id_kriteria_kh']}'");
										$dt2 = mysqli_fetch_array($q5);

										// Check if $dt1 and $dt2 are not null before accessing their array offsets
										if ($dt1 !== null && $dt2 !== null) {
											// Check if $dt2['max'] is not null and not zero before performing division
											if ($dt2['type_kh'] == "Benefit" && isset($dt2['max']) && $dt2['max'] != 0) {
												$nilai_r = $dt1['nilai'] / $dt2['max'];
											} else {
												// Add additional check to prevent division by zero
												if (isset($dt1['nilai']) && $dt1['nilai'] != 0) {
													$nilai_r = $dt2['min'] / $dt1['nilai'];
												} else {
													$nilai_r = 0; // or any default value you prefer
												}
											}
											$nilai_penjumlahan = $bobot * $nilai_r;
											$nilai_v += $nilai_penjumlahan;
											echo "(" . $bobot . "x" . $nilai_r . ") ";
										} else {
											echo "(N/A) "; // Handle the case where $dt1 or $dt2 is null
										}
									endforeach ?>
								</td>

								<td>
									<?php
									echo $nilai_v;
									mysqli_query($koneksi, "INSERT INTO hasil_kh (id_alternatif, nilai_kh) VALUES ('{$keys['id_alternatif']}', '$nilai_v')");
									?>
								</td>

							</tr>
							<?php
							$no++;
						endforeach ?>
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