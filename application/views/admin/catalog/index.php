<!--load ra file head + data -->
<?php $this->load->view('admin/catalog/head.php',$this->data) ?>
<div class="line"></div>
<div class="wrapper">
<?php $this->load->view('admin/message',$this->data)?>
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck"></span>
			<h6>Danh sách danh mục sản phẩm</h6>
			<div class="num f12">
				Tổng số: <b><?= count($list)?></b>
			</div>
		</div>
		<form action="<?= admin_url('catalog')?>"
			method="get" class="form" name="filter">
			<table cellpadding="0" cellspacing="0" width="100%"
				class="sTable mTable myTable withCheck" id="checkAll">
				<thead>
					<tr>
						<td style="width: 10px;"><img src="<?= public_url('admin')?>/images/icons/tableArrows.png" /></td>
						<td style="width: 80px;">ID</td>
						<td style="width: 80px;">Thứ tự hiển thị</td>
						<td>Tên danh mục</td>
						<td>Hình ảnh</td>
						<td style="width: 100px;">Hành động</td>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="6">
							<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('catalog/delete_all') ?>"> 
								<span style='color: white;'>Xóa hết </span>
								</a>
								
							</div>
							<div class="pagination">
					          <?= $this->pagination->create_links()?>
			             </div>
							
						</td>
				
					</tr>
				</tfoot>

				<tbody>
					<!-- Filter -->
					<?php foreach ($list as $row):?>
					<tr class="row_<?= $row->id?>" align="center">
						<td><input type="checkbox" name="id[]" value="<?= $row->id?>" /></td>

						<td class="textC"><?= $row->id?></td>
						
						<td class="textC"><?= $row->sort_order?></td>

						<td><span title="<?= $row->name?>" class="tipS"> <?= $row->name?></span></td>
						
						<td><img style="width:150px;height:100px"
								src="<?= public_url('/upload/catalog/'.$row->image_link)?>"></td>


						<td class="option"><a href="<?= admin_url('catalog/edit/'.$row->id)?>" title="Chỉnh sửa"
							class="tipS "> <img src="<?= public_url('admin')?>/images/icons/color/edit.png" />
						</a> <a href="<?= admin_url('catalog/delete/'.$row->id) ?>" title="Xóa"
							class="tipS verify_action"> <img
								src="<?= public_url('admin')?>/images/icons/color/delete.png" />
						</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</form>
	</div>
</div>
<div class="clear mt30"></div>