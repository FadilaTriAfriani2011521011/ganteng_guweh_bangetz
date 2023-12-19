<?php require_once('includes/init.php');
$user_role = get_role();
if ($user_role == 'admin') {
	$errors = array();
	$sukses = false;

	$id_kriteria_bilal = (isset($_GET['id'])) ? trim($_GET['id']) : '';

	if (isset($_POST['submit_bl'])) {
		$kode_kriteria_bilal = $_POST['kode_kriteria_bilal'];
		$nama_bilal = $_POST['nama_bilal'];
		$type_bilal = $_POST['type_bilal'];
		$bobot_bilal = $_POST['bobot_bilal'];
		$ada_pilihan_bilal = $_POST['ada_pilihan_bilal'];

		if (!$kode_kriteria_bilal) {
			$errors[] = 'Kode kriteria tidak boleh kosong';
		}
		// Validasi Nama Kriteria
		if (!$nama_bilal) {
			$errors[] = 'Nama kriteria tidak boleh kosong';
		}
		// Validasi Tipe
		if (!$type_bilal) {
			$errors[] = 'Type kriteria tidak boleh kosong';
		}
		// Validasi Bobot
		if (!$bobot_bilal) {
			$errors[] = 'Bobot kriteria tidak boleh kosong';
		}

		// Jika lolos validasi lakukan hal di bawah ini
		if (empty($errors)) {

			$update_bilal = mysqli_query($koneksi, "UPDATE kriteria_bilal SET kode_kriteria_bilal = '$kode_kriteria_bilal', nama_bilal = '$nama_bilal', type_bilal = '$type_bilal', bobot_bilal = '$bobot_bilal', ada_pilihan_bilal = '$ada_pilihan_bilal' WHERE id_kriteria_bilal = '$id_kriteria_bilal'");

			if ($update_bilal) {
				redirect_to('list-kriteria-bilal.php?status=sukses-edit');
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

		<a href="list-kriteria-bl.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
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

		<form action="edit-kriteria-bl.php?id=<?php echo $id_kriteria_bl; ?>" method="post">
			<?php
			if (!$id_kriteria_bilal) {
			?>
				<div class="card-body">
					<div class="alert alert-primary">Data tidak ada</div>
				</div>
				<?php
			} else {
				$data = mysqli_query($koneksi, "SELECT * FROM kriteria_bilal WHERE id_kriteria_bilal='$id_kriteria_bilal'");
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
									<input autocomplete="off" type="text" name="kode_kriteria_bilal" required value="<?php echo $d['kode_kriteria_bilal']; ?>" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Nama Kriteria</label>
									<input autocomplete="off" type="text" name="nama_bilal" required value="<?php echo $d['nama_bilal']; ?>" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Type Kriteria</label>
									<select name="type_bilal" class="form-control" required>
										<option value="">--Pilih--</option>
										<option value="Benefit" <?php if ($d['type_bilal'] == "Benefit") {
																	echo "selected";
																} ?>>Benefit</option>
										<option value="Cost" <?php if ($d['type_bilal'] == "Cost") {
																	echo "selected";
																} ?>>Cost</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Bobot Kriteria</label>
									<input autocomplete="off" type="number" name="bobot_bilal" required value="<?php echo $d['bobot_bilal']; ?>" step="0.01" class="form-control" />
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Cara Penilaian</label>
									<select name="ada_pilihan_bilal" class="form-control" required>
										<option value="">--Pilih--</option>
										<option value="0" <?php if ($d['ada_pilihan_bilal'] == "0") {
																echo "selected";
															} ?>>Inputan Langsung</option>
										<option value="1" <?php if ($d['ada_pilihan_bilal'] == "1") {
																echo "selected";
															} ?>>Pilihan Him Fuzzy</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button name="submit_bl" value="submit_bl" type="submit_bl" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
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