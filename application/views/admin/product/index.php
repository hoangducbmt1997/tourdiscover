<!-- head -->
<?php $this->load->view('admin/product/head', $this->data)?>

<div class="line"></div>

<div id="main_product" class="wrapper">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck"
				id="titleCheck"></span>
			<h6>Danh sách sản phẩm</h6>
			<div class="num f12">
				Số lượng: <b><?= $total_rows?></b>
			</div>
		</div>

		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll"
			class="sTable mTable myTable">

			<thead class="filter">
				<tr>
					<td colspan="6">
						<form method="get" action="<?= admin_url('product')?>"
							class="list_filter form">
							<table width="100%" cellspacing="0" cellpadding="0">
								<tbody >
									<tr align="center">
										<td style="width: 50px;" class="label"><label for="filter_id">Mã
												số :</label></td>
										<td class="item"><input type="text" style="width: 55px;"id="filter_id" value="<?= $this->input->get('id')?>" name="id"></td>

										<td style="width: 100px;" class="label"><label for="filter_id">Tên sản phẩm :</label></td>
										<td style="width: 155px;" class="item"><input type="text"
											style="width: 155px;" id="filter_iname"
											value="<?= $this->input->get('name')?>" name="name"></td>

										<td style="width: 80px;" class="label"><label
											for="filter_status">Danh mục :</label></td>
										<td class="item"><select name="catalog">
												<option value=""></option>
												<!-- kiểm tra danh mục có danh mục con hay không -->
										<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 0):?>
    				      				<optgroup label="<?= $row->name?>">
    				      				    <?php foreach ($row->subs as $sub):?>
    				               			<option value="<?= $sub->id?>"
														<?= ($this->input->get('catalog') == $sub->id) ? 'selected' : ''?>> <?= $sub->name?> </option>
    						                <?php endforeach;?>
    				               		</optgroup>
    				               		<?php else:?>
    				               		  <option value="<?= $row->id?>"
													<?= ($this->input->get('catalog') == $row->id) ? 'selected' : ''?>><?= $row->name?></option>
    				               		<?php endif;?>
    				               		<?php endforeach;?>
								</select></td>
										<td class='button-filter-and-reset' style="float:right;display:flex;flex-direction:row;margin-right: 25px;">
										<input style="margin-right: 10px;" type="submit" value="Lọc"class="button blueB"> 
											<input style="margin-right: 10px;" type="reset" onclick="window.location.href = '<?= admin_url('product')?>'; "value="Reset" class="basic">
										</td>
									</tr>
								</tbody>
							</table>
						</form>
					</td>
				</tr>
			</thead>
			<thead>
				<tr>
					<td style="width: 21px;"><img
						src="<?= public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width: 60px;">Mã số</td>
					<td>Hình ảnh</td>
					<td>Giá</td>
					<td style="width: 75px;">Ngày tạo</td>
					<td style="width: 120px;">Hành động</td>
				</tr>
			</thead>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a url="<?= admin_url('product/delete_all')?>"
								class="button blueB" id="submit" href="#submit"> <span
								style="color: white;">Xóa hết</span>
							</a>
						</div>
						<div class="pagination">
					          <?= $this->pagination->create_links()?>
			             </div>
					</td>
				</tr>
			</tfoot>

			<tbody class="list_item">
			     <?php foreach ($list as $row):?>
			     <tr class="row_<?= $row->id?>">
					<td><input type="checkbox" value="<?= $row->id?>"
						name="id[]"></td>
					<td class="textC"><?= $row->id?></td>
					<td>
						<div class="image_thumb">
							<img height="50"
								src="<?= public_url('/upload/product/'.$row->image_link)?>">
							<div class="clear"></div>
						</div> <a target="_blank" title="" class="tipS" href=""> <b><?= $row->name?></b>
					</a>
						<div class="f11">
					  Đã bán: <?= $row->buyed?> | Xem: <?= $row->view?>					
					 </div>
					</td>
					<td style="text-align: right;padding-right:20px;" >
					    <?php if($row->discount > 0):?>
					       <?php $price_new = $row->price - $row->discount;?>
					       <b ><?= number_format($price_new)?> $</b>
						<p style="text-decoration: line-through;text-decoration-color:red"><?= number_format($row->price)?> đ</p>
					    <?php else:?>
					        <b><?= number_format($row->price)?> $</b>
					    <?php endif;?>   				
					</td>
					<td class="textC"><?= get_date($row->created)?></td>
					<td class="option textC">
					<!-- 
					
					<a title="Xem chi tiết sản phẩm"
						class="tipS" target="_blank" href="product/view/9.html"> <img
							src="<?/*= public_url('admin/images')*/?>/icons/color/view.png">
					</a> -->
					 <a class="tipS" title="Chỉnh sửa"
						href="<?= admin_url('product/edit/'.$row->id)?>"> <img
							src="<?= public_url('admin/images')?>/icons/color/edit.png">
					</a> <a class="tipS verify_action" title="Xóa"
						href="<?= admin_url('product/delete/'.$row->id)?>"> <img
							src="<?= public_url('admin/images')?>/icons/color/delete.png">
					</a></td>
				</tr>
				<?php endforeach;?>
		   </tbody>

		</table>
	</div>

</div>


