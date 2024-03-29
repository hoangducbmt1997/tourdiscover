<!-- load view head + data -->
<?php $this->load->view('admin/product/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
	<!-- Form -->
	<form enctype="multipart/form-data" method="post"
		action="" id="form" class="form">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img class="titleIcon"
						src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
					<h6>Cập nhật sản phẩm</h6>
				</div>

				<ul class="tabs">
					<li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
					<li class=""><a href="#tab2">SEO Onpage</a></li>
					<li class=""><a href="#tab3">Bài viết</a></li>

				</ul>

				<div class="tab_container">
					<div class="tab_content pd0" id="tab1" style="display: block;">
						<div class="formRow">
							<label for="param_name" class="formLeft">Tên :<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
                                    <input type="text" _autocheck="true"
									id="param_name" value="<?= $product->name?>" name="name"></span> <span class="autocheck"
									name="name_autocheck"></span>
								<div class="clear error" name="name_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft">Hình ảnh :<span class="req">*</span></label>
							<div class="formRight">
								<div class="left">
                                    <input type="file" name="image" id="image" size="25">
                                    <br/>
                                    <img src="<?= base_url('public/upload/product/'.$product->image_link)?>" style=" width:100px;height:70px;margin:15px 0px 0px 0px ">
								</div>
								<div class="clear error" name="image_error"></div>
							</div>
							<div class="clear"></div>
						</div>
                        <?php $image_list = json_decode($product->image_list); ?>
						<div class="formRow">
							<label class="formLeft">Ảnh kèm theo :</label>
							<div class="formRight">
								<div class="left">
									<input type="file" multiple="" name="image_list[]"
                                        id="image_list" size="25">
                                        <br/>
										<?php if(is_array($image_list)) :?>
                                        <?php foreach ($image_list as $img): ?>
                                            <img src="<?= base_url('public/upload/product/'.$img)?>" style=" width:100px;height:70px;margin:15px 15px 0px 0px">
                                        <?php endforeach;?>
										<?php endif; ?>
								</div>
								<div class="clear error" name="image_list_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Price -->
						<div class="formRow">
							<label for="param_price" class="formLeft"> Giá : <span
								class="req">*</span>
							</label>
							<div class="formRight">
								<span class="oneTwo"> <input type="text" _autocheck="true"
									class="format_number" value="<?= $product->price?>" id="param_price" style="width: 100px"
									name="price"> <img
									src="<?= public_url('admin')?>/crown/images/icons/notifications/information.png"
									style="margin-bottom: -8px" class="tipS"
									original-title="Giá bán sử dụng để giao dịch">
								</span> <span class="autocheck" name="price_autocheck"></span>
								<div class="clear error" name="price_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Price sale -->
						<div class="formRow">
							<label for="param_discount" class="formLeft"> Giảm giá (VND) <span></span>:
							</label>
							<div class="formRight">
								<span> <input type="text" class="format_number" value="<?= $product->discount?>"
									id="param_discount" style="width: 100px" name="discount"> <img
									src="<?= public_url('admin')?>/crown/images/icons/notifications/information.png"
									style="margin-bottom: -8px" class="tipS"
									original-title="Số tiền giảm giảm giá">
								</span> <span class="autocheck" name="discount_autocheck"></span>
								<div class="clear error" name="discount_error"></div>
							</div>
							<div class="clear"></div>
						</div>


						<div class="formRow">
							<label for="param_cat" class="formLeft">Danh mục :<span
								class="req">*</span></label>
							<div class="formRight">
								<select name="catalog" class="left">
									<option value=""></option>
									<!-- kiểm tra danh mục có danh mục con hay ko -->
                    				<?php foreach ($catalogs as $row):?>
                    				<?php if(count($row->subs) > 0):?>
                      				<optgroup label="<?= $row->name?>">
                      				    <?php foreach ($row->subs as $sub):?>
                               			<option value="<?= $sub->id?>" <?php if($sub->id == $product->catalog_id) echo 'selected';?>> <?= $sub->name?> </option>
                    	                <?php endforeach;?>
                               		</optgroup> 
                               		<?php endif;?>
                               		<?php endforeach;?>
                    		</select> <span class="autocheck"
									name="cat_autocheck"> </span>
								<div class="clear error" name="cat_error"></div>
							</div>
							<div class="clear"></div>
						</div>


						<!-- hot product -->
						<div class="formRow">
							<label for="param_warranty" class="formLeft"> Nổi bật : </label>
							<div class="formRight">
								<span class="oneFour">
								<select name="hot_product" class="left">
								<?php if($product->hot_product==1):?>
									<option value="1" selected >Có</option>
									<option value="0">Không</option	>
									<?php else:?>
									<option value="0" selected >Không</option>
									<option value="1">Có</option	>
								<?php endif; ?>
									
					
									</select>
								</span> <span class="autocheck"
									name="warranty_autocheck"></span>
								<div class="clear error" name="warranty_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label for="param_sale" class="formLeft">Mô tả phụ sản phẩm :<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4" id="param_content_decrip"
										name="content_decrip"><?=$product->content_decrip?></textarea></span> <span class="autocheck"
									name="sale_autocheck"></span>
								<div class="clear error" name="content_decrip_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label for="param_sale" class="formLeft">Tặng quà :</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4" id="param_gifts" 
										name="gifts"><?= $product->gifts?></textarea></span> <span class="autocheck"
									name="sale_autocheck"></span>
								<div class="clear error" name="sale_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow hide"></div>
					</div>

					<div class="tab_content pd0" id="tab2" style="display: none;">

						<div class="formRow">
							<label for="param_site_title" class="formLeft">Title :</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4"
										_autocheck="true" id="param_site_title" name="site_title"><?= $product->site_title?></textarea></span>
								<span class="autocheck" name="site_title_autocheck"></span>
								<div class="clear error" name="site_title_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label for="param_meta_desc" class="formLeft">Meta description :</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4"
										_autocheck="true" id="param_meta_desc" name="meta_desc"><?= $product->meta_desc?></textarea></span>
								<span class="autocheck" name="meta_desc_autocheck"></span>
								<div class="clear error" name="meta_desc_error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label for="param_meta_key" class="formLeft">Meta keywords :</label>
							<div class="formRight">
								<span class="oneTwo"><textarea cols="" rows="4"
										_autocheck="true" id="param_meta_key" name="meta_key"><?= $product->meta_key?></textarea></span>
								<span class="autocheck" name="meta_key_autocheck"></span>
								<div class="clear error" name="meta_key_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow hide"></div>
					</div>

					<div class="tab_content pd0" id="tab3" style="display: none;">
						<div class="formRow">
							<label class="formLeft">Nội dung :</label>
							<div class="formRight">
								<textarea class="editor" id="editor" name="content"><?= $product->content?></textarea>
								<div class="clear error" name="content_error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow hide"></div>
					</div>


				</div>
				<!-- End tab_container-->

				<div class="formSubmit">
					<input type="submit" class="redB" value="Cập nhật"> <input
						type="reset" class="basic" value="Hủy bỏ">
				</div>
				<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<div class="clear mt30"></div>
