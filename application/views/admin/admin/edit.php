<!--  load ra file head + data-->
<?php $this->load->view('admin/admin/head.php',$this->data) ?>
<div class="line"></div>
<div class="wrapper">

	<div class="widget">
		<div class="title">
			<h6>Cập nhật quản trị viên</h6>
		</div>
		<form class="form" id="form" action="" method="post"
			enctype="multipart/form-data">
			<fieldset>
				<div class="formRow">
					<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"> <input name="name" id="param_name"
							value="<?= $info->name ?>" type="text">
						</span> <span class="autocheck"></span>
						<div class="clear error"><?php echo form_error('name')?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_username">Username:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"> <input name="username" id="param_username"
							value="<?= $info->username?>" type="text"></span> <span
							class="autocheck"></span>
						<div class="clear error"><?php echo form_error('username')?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_password">Password:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"> <input name="password" id="param_password"
							type="password">
						<p class="nf_update_password">Nếu cập nhật mật khẩu thì mới nhập giá trị</p>
							</span>

							
							<span class="autocheck"></span>
						<div class="clear error"><?php echo form_error('password')?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_re_password">Nhập lại mật khẩu:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"> <input name="re_password"
							id="param_re_password" type="password"></span> <span
							class="autocheck"></span>
						<div class="clear error"><?php echo form_error('re_password')?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formSubmit">
					<input type="submit" value="Cập nhật" class="redB">
				</div>
			</fieldset>
		</form>
	</div>
</div>