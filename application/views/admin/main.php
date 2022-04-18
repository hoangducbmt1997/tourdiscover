<html>
<head>
<?php $this->load->view('admin/head.php')?>
</head>
<body>
	<div class="left_content">
    <?php $this->load->view('admin/left.php')?>
    </div>
	<div id="rightSide">
	<?php $this->load->view('admin/header.php')?>
	<!-- Content -->
	<?php $this->load->view($temp,$this->data) ?>
	<!--End Content -->
	</div>
	<div class="clear"></div>
</body>
</html>