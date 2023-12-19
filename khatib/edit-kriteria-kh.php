<?php require_once('includes/init.php');
$user_role = get_role();
if ($user_role == 'admin') {
	$errors = array();
	$sukses = false;

	$id_kriteria_kh = (isset($_GET['id'])) ? trim($_GET['id']) : '';

	if (isset($_POST['submit_kh'])) {
		$kode_kriteria_kh = $_POST['kode_kriteria_kh'];
		$nama_kh = $_POST['nama_kh'];
		$type_kh = $_POST['type_kh'];
		$bobot_kh = $_POST['bobot_kh'];
		$ada_pilihan_kh = $_POST['ada_pilihan_kh'];

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

		// Jika lolos validasi lakukan hal di bawah ini
		if (empty($errors)) {

			$update_kh = mysqli_query($koneksi, "UPDATE kriteria_kh SET kode_kriteria_kh = '$kode_kriteria_kh', nama_kh = '$nama_kh', type_kh = '$type_kh', bobot_kh = '$bobot_kh', ada_pilihan_kh = '$ada_pilihan_kh' WHERE id_kriteria_kh = '$id_kriteria_kh'");

			if ($update_kh) {
				redirect_to('list-kriteria-kh.php?status=sukses-edit');
			} else {
				$errors[] = 'Data gagal diupdate';
			}
		}
	}

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
		<div class="alert alert-primary">
			<?php foreach ($errors as $error) : ?>
				<?php echo $error; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Kriteria</h6>
		</div>

		<form action="edit-kriteria-kh.php?id=<?php echo $id_kriteria_kh; ?>" method="post">
			<?php
			if (!$id_kriteria_kh) {
			?>
				<div class="card-body">
					<div class="alert alert-primary">Data tidak ada</div>
				</div>
				<?php
			} else {
				$data = mysqli_query($koneksi, "SELECT * FROM kriteria_kh WHERE id_kriteria_kh='$id_kriteria_kh'");
				$cek = mysqli_num_rows($data);
				if ($cek <= 0) {
				?>
					<div class="card-body">
						<div class="alert alert-primary">Data tidak ada</div>
					</div>
					<?php
				} else {
					while ($d = mysqli_fetch_array($data)) {
					?>
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="font-weight-bold">Kode Kriteria</label>
									<input autocomplete="off" type="text" name="kode_kriteria_kh" required value="<?php echo $d['kode_kriteria_kh']; ?>" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Nama Kriteria</label>
									<input autocomplete="off" type="text" name="nama_kh" required value="<?php echo $d['nama_kh']; ?>" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Type Kriteria</label>
									<select name="type_kh" class="form-control" required>
										<option value="">--Pilih--</option>
										<option value="Benefit" <?php if ($d['type_kh'] == "Benefit") {
																	echo "selected";
																} ?>>Benefit</option>
										<option value="Cost" <?php if ($d['type_kh'] == "Cost") {
																	echo "selected";
																} ?>>Cost</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Bobot Kriteria</label>
									<input autocomplete="off" type="number" name="bobot_kh" required value="<?php echo $d['bobot_kh']; ?>" step="0.01" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Cara Penilaian</label>
									<select name="ada_pilihan_kh" class="form-control" required>
										<option value="">--Pilih--</option>
										<option value="0" <?php if ($d['ada_pilihan_kh'] == "0") {
																echo "selected";
															} ?>>Inputan Langsung</option>
										<option value="1" <?php if ($d['ada_pilihan_kh'] == "1") {
																echo "selected";
															} ?>>Pilihan Sub Kriteria</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button name="submit_kh" value="submit_kh" type="submit_kh" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
							<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
						</div>
			<?php
					}
				}
			}
			?>
		</form>
	</div>

<?php
	require_once('template/footer.php');
} else {
	header('Location: login.php');
}
?>