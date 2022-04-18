<!-- head -->
<?php $this->load->view('admin/slide/head', $this->data)?>

<div class="line"></div>

<div id="main_slide" class="wrapper">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck"
				id="titleCheck"></span>
			<h6>Danh sách bài viết</h6>
			<div class="num f12">
				Số lượng: <b><?= $total_rows?></b>
			</div>
		</div>

		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll"
			class="sTable mTable myTable">


			<thead>
				<tr>
					<td style="width: 21px;"><img
						src="<?= public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width: 60px;">Mã số</td>
					<td>Tên</td>
					<td>Ảnh</td>
					<td>Thứ tự hiển thị</td>
					<td style="width: 120px;">Hành động</td>
				</tr>
			</thead>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a url="<?= admin_url('slide/delete_all')?>" class="button blueB"
								id="submit" href="#submit"> <span style="color: white;">Xóa hết</span>
							</a>
						</div>
						<div class="pagination"></div>
					</td>
				</tr>
			</tfoot>

			<tbody class="list_item">
			     <?php foreach ($list as $row):?>
			     <tr class="row_<?= $row->id?>" align="center">
					<td><input type="checkbox" value="<?= $row->id?>" name="id[]"></td>
					<td class="textC"><?= $row->id?></td>
					<td><a target="_blank" title="" class="tipS" href=""> <b><?= $row->name?></b></a>

					</td>
					<td>
						<div class="image_thumb">

							<img style="width: 200px; height: 100px"
								src="<?= public_url('/upload/slide/'.$row->image_link)?>">
							<div class="clear"></div>
						</div>
					</td>
					<td><?= $row->sort_order ?></td>
					<td class="option textC"><a title="Xem chi tiết slide" class="tipS"
						target="_blank" href="<?php $row->link?>"> <img
							src="<?= public_url('admin/images')?>/icons/color/view.png">
					</a> <a class="tipS" title="Chỉnh sửa"
						href="<?= admin_url('slide/edit/'.$row->id)?>"> <img
							src="<?= public_url('admin/images')?>/icons/color/edit.png">
					</a> <a class="tipS verify_action" title="Xóa"
						href="<?= admin_url('slide/delete/'.$row->id)?>"> <img
							src="<?= public_url('admin/images')?>/icons/color/delete.png">
					</a></td>
				</tr>
				<?php endforeach;?>
		   </tbody>

		</table>
	</div>

</div>


