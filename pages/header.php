<?php
$sql_list_danhmuc = "SELECT * FROM danh_muc ORDER BY id_danhmuc ASC";

$query_list_danhmuc = mysqli_query($conn, $sql_list_danhmuc);
?>

<div class="row px-6 bg-primary mb-4">
	<ul class="d-flex justify-content-center list-unstyled mb-0 py-3">
		<li class="fw-bold fs-6 px-3">
			<a href="index.php">Home</a>
		</li>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_list_danhmuc)) {
			$i++;
			?>
			<li class="fw-bold fs-6 px-3">
				<a href="index.php?p=danhmuc&id=<?php echo $row['id_danhmuc'] ?>">
					<?php echo $row['tendanhmuc']; ?>
				</a>
			</li>
		<?php
		}
		?>


	</ul>
</div>