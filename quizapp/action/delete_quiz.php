<?php
	include '../include/connection.php';
	if (isset($_GET['id_quiz'])) {
	 
		$delSticker = $_GET['id_quiz'];
		$stick_del = "DELETE FROM tbl_quiz WHERE id_quiz = '".$delSticker."'";
		$stick_del_path = "SELECT * FROM tbl_quiz WHERE id_quiz = '".$delSticker."'";

		$delStickerPack = "DELETE FROM tbl_quiz_content WHERE id_quiz = '".$delSticker."'";

		$que_del_path = mysqli_query($conn, $stick_del_path);
		$datas = mysqli_fetch_assoc($que_del_path);

		$tblQC = mysqli_fetch_assoc(mysqli_query($conn, $delStickerPack));


		if($datas['image_quiz']!=""){
			unlink('../image/image_quiz/'.$datas['image_quiz']);
		}

		if ($datas['image_quiz_content']) {
			unlink('../image/image_quiz/'.$delSticker.'/'.$datas['image_quiz']);
		}

		$que_del_pack = mysqli_query($conn, $delStickerPack);
		$que_del = mysqli_query($conn, $stick_del);
		?>
			<script type="text/javascript">
				window.location = '../quiz';
			</script>
		<?php
	}
?>