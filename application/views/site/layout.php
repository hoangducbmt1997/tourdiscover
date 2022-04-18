<html>
<head>
	<?php $this->load->view('site/head.php')?>
	</head>
<body>
	<div id="wraper">
	<div class="header">
	<?php $this->load->view('site/header.php')?>
	</div>
	</div>
	<div id="content-home" class="content">
	<?php if(isset($message)):?>
	<?php echo '<script type="text/javascript"> alert("'.$message.'")</script>';?>
    <?php endif;?>
	<?php $this->load->view($temp, $this->data); ?>
	</div>
	<div class="footer">
	<?php $this->load->view('site/footer.php',$this->data)?>
	</div>
</body>
	<?php $this->load->view('site/js.php')?>
</html>
