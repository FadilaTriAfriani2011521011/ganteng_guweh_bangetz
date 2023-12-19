<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$ada_error = false;
$result = '';

$id_kriteria_bilal = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if (!$id_kriteria_bilal) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
	$query = mysqli_query($koneksi, "SELECT * FROM kriteria_bilal WHERE id_kriteria_bilal = '$id_kriteria_bilal'");
	$cek_bilal = mysqli_num_rows($query);

	if ($cek_bilal <= 0) {
		$ada_error = 'Maaf, data tidak dapat diproses.';
	} else {
		mysqli_query($koneksi, "DELETE FROM kriteria_bilal WHERE id_kriteria_bilal = '$id_kriteria_bilal';");
		// mysqli_query($koneksi, "DELETE FROM sub_kriteria WHERE id_kriteria_bilal = '$id_kriteria_bilal';");
		redirect_to('list-kriteria-bl.php?status=sukses-hapus');
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
