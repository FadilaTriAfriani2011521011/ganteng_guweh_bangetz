<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$errors = array();
$sukses = false;

$query = $pdo->prepare('SELECT bobot_kh FROM kriteria_kh');
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);

$total_bobot_kh = 0;

while ($hasil = $query->fetch()) {
    if (is_numeric($hasil['bobot_kh'])) {
        $total_bobot_kh += floatval($hasil['bobot_kh']);
    } 
}

if (isset($_POST['submit_kh'])) :
	$kode_kriteria_kh = $_POST['kode_kriteria_kh'];
	$nama_kh = $_POST['nama_kh'];
	$type_kh = $_POST['type_kh'];
	$bobot_kh = $_POST['bobot_kh'];
	$ada_pilihan_kh = $_POST['ada_pilihan_kh'];

	$total_bobot_kh += floatval($bobot_kh); 
    if ($total_bobot_kh > 1) {
        $errors[] = "Total bobot dari semua kriteria melebihi 1. Harap periksa kembali kriteria Anda.";
    }

	if ($bobot_kh < 0) {
        $errors[] = 'Bobot tidak boleh kurang dari 0!';
    }
    if ($bobot_kh >= 1) {
        $errors[] = 'Bobot tidak boleh sama besar dari 1!';
    }

	if (!$kode_kriteria_kh) {
		$errors[] = 'Kode kriteria tidak boleh kosong';
	}
	// Validasi Nama Kriteria
	if (!$nama_kh) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}
	// Validasi Tipe
	if (!$type_kh) {
		$errors[] = 'Type kriteria tidak boleh kosong';
	}
	// Validasi Bobot
	if (!$bobot_kh) {
		$errors[] = 'Bobot kriteria tidak boleh kosong';
	}

	if (empty($errors)) :

		$simpan_kh = mysqli_query($koneksi, "INSERT INTO kriteria_kh (id_kriteria_kh, kode_kriteria_kh, nama_kh, type_kh, bobot_kh, ada_pilihan_kh) VALUES ('', '$kode_kriteria_kh', '$nama_kh', '$type_kh', '$bobot_kh', '$ada_pilihan_kh')");
		if ($simpan_kh) {
			redirect_to('list-kriteria-kh.php?status=sukses-baru');
		} else {
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;
?>

<?php
$page = "Kriteria";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>

	<a href="list-kriteria-kh.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?php if (!empty($errors)) : ?>
	<div class="alert alert-info">
		<?php foreach ($errors as $error) : ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Kriteria</h6>
	</div>

	<form action="tambah-kriteria-kh.php" method="post">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Kriteria</label>
					<input autocomplete="off" type="text" name="kode_kriteria_kh" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Kriteria</label>
					<input autocomplete="off" type="text" name="nama_kh" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Type Kriteria</label>
					<select name="type_kh" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="Benefit">Benefit</option>
						<option value="Cost">Cost</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Kriteria</label>
					<input autocomplete="off" type="number" name="bobot_kh" required step="0.01" class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Cara Penilaian</label>
					<select name="ada_pilihan_kh" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="0">Input Langsung</option>
						<option value="1">Pilihan Himpunan Fuzzy</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<button name="submit_kh" value="submit_kh" type="submit_kh" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
		</div>
	</form>
</div>


<?php
require_once('template/footer.php');
?>