<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$ada_error = false;
$result = '';

$id_kriteria_kh = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if (!$id_kriteria_kh) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
	$query = mysqli_query($koneksi, "SELECT * FROM kriteria_kh WHERE id_kriteria_kh = '$id_kriteria_kh'");
	$cek_kh = mysqli_num_rows($query);

	if ($cek_kh <= 0) {
		$ada_error = 'Maaf, data tidak dapat diproses.';
	} else {
		mysqli_query($koneksi, "DELETE FROM kriteria_kh WHERE id_kriteria_kh = '$id_kriteria_kh';");
		mysqli_query($koneksi, "DELETE FROM him_fuzzy WHERE id_kriteria_kh = '$id_kriteria_kh';");
		redirect_to('list-kriteria-kh.php?status=sukses-hapus');
	}
}
?>

<?php
$page = "Kriteria";
require_once('template/header.php');
?>
	<?php if ($ada_error) : ?>
		<?php echo '<div class="alert alert-primary">' . $ada_error . '</div>'; ?>	
	<?php endif; ?>
<?php
require_once('template/footer.php');
?>
