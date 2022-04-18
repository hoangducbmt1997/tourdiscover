
<script type="text/javascript">
$(function() {
    $( "#text-search" ).autocomplete({
        source: "<?= base_url()?>/product/search/1",
    });
});
</script>

<div id="overlay"></div><!--OVERLAY-->
		<div class="container-toggle-menu">
			<div class="button-kebap">
				<span class="btn-1" ></span>
				<span class="btn-2"></span>
				<span class="btn-3"></span>
			</div><!--BUTTON TOGGLE RIGHT-->
			
			<div class="menu-btn">
				<span class="top"></span>
				<span class="mid"></span>
				<span class="bot"></span>
			</div><!--BUTTON TOGGLE LEFT-->
			<div id="nav-aside-left">
				<ul class="nav-inner">
					<li class="nav-inner-item-contact">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-google-plus-g"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
					</li>
					<li class="nav-inner-item line"><div class="nav-inner-line"></div></li>
					<li class="nav-inner-item active"><a href="<?= base_url()?>">Home</a></li>
					<li class="nav-inner-item"><a href="#">Destinations</a></li>
					<li class="nav-inner-item"><a href="#">Travel Styles</a></li>
					<li class="nav-inner-item"><a href="#">Gallery</a></li>
					<li class="nav-inner-item"><a href="#">Deals</a></li>
					<li class="nav-inner-item"><a href="#">Contact Us</a></li>
				</ul>
			</div><!--NAVBAR TOGGLE LEFT-->
		</div>
		<div id="nav-aside-right" class="s-closed">
			<div class="container-nav-aside-right ">
			<form action="<?= site_url('product/search')?>" method="get">
				<input type="text" placeholder="Where do you go..." name="key-search" >
				<div class="text-select"><p>Select month:</p></div>
				<select class="dropdown"  >
					<option>&emsp;&emsp;January</option>
					<option >&emsp;&emsp;February</option>
					<option >&emsp;&emsp;March</option>
					<option >&emsp;&emsp;April</option>
					<option >&emsp;&emsp;May</option>
					<option >&emsp;&emsp;June</option>
					<option >&emsp;&emsp;July</option>
					<option >&emsp;&emsp;August</option>
					<option >&emsp;&emsp;September</option>
					<option >&emsp;&emsp;October</option>
					<option >&emsp;&emsp;November</option>
					<option >&emsp;&emsp;December</option>
				</select>
				<button class="btn btn-success" type="submit">Search Tour</button>
				</form>
			</div>
		</div><!--NAVBAR TOGGLE RIGHT-->
		<div id="nav-on">
			<div class="container-menu-show container">
				<div class="container-logo col-lg-3 ">
					<a href="<?= base_url()?>">
						<img src="<?php echo public_url()?>site/image/logo.png" height="40px" width="133px">
					</a>
				</div>
				<div class="container-option col-lg-9">
				<form action="<?= site_url('product/search')?>" method="get">
					<input type="text" placeholder="Where do you go..." name="key-search" id="text-search">
					<div class="text-select"><p>Select month:</p></div>
					<select class="dropdown" >
						<option value="1">&emsp;&emsp;January</option>
						<option value="2">&emsp;&emsp;February</option>
						<option value="3">&emsp;&emsp;March</option>
						<option value="4">&emsp;&emsp;April</option>
						<option value="5">&emsp;&emsp;May</option>
						<option value="6">&emsp;&emsp;June</option>
						<option value="7">&emsp;&emsp;July</option>
						<option value="8">&emsp;&emsp;August</option>
						<option value="9">&emsp;&emsp;September</option>
						<option value="10">&emsp;&emsp;October</option>
						<option value="11">&emsp;&emsp;November</option>
						<option value="12">&emsp;&emsp;December</option>
					</select>
					<div class="menu-show-line"></div>
					<button class="btn btn-success" type="submit">Search Tour</button>
					</form>
				</div>
			</div><!--NAVBAR ON-->
		</div>
		<div id="nav-below">
			<div class ="container-menu-hide container">
				<nav  class="navbar navbar-expand-md bg-blue navbar-dark" >
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url()?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="#">Destinations</a>
							<div class="dropdown-content">
								<a href="#">About 1</a>
								<a href="#">About 2</a>
								<a href="#">About 3</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Travel Styles</a>
							<div class="dropdown-content">
								<a href="#">Our Tours 1</a>
								<a href="#">Our Tours 2</a>
								<a href="#">Our Tours 3</a>
							</div>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="#">Gallery</a>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="#">Deals</a>
							<div class="dropdown-content">
								<a href="#">Blogs</a>
							</div>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="#">Contact Us</a>
						</li>
					</ul>
					<div class="container-icon-sign-up">
					<ul>
						<?php if(isset($user_info)):?>
						<li><a class="icon-user" href=""><i class="fas fa-user"></i></a>&nbsp;&nbsp;</li>
						<li class="icon-sign-up">							
						<a href="<?= site_url('user/logout') ?>">Logout<i class="fas fa-sign-in-alt"></i></a>
						<?php else :?>
						<li class="icon-sign-up">
						<a href="<?= site_url('user/login') ?>">Sign In<i class="fas fa-sign-in-alt"></i></a>
						</li>
	 					<?php endif;?>
						
						</ul>
					</div>
				</nav>
			</div>
		</div><!--NAVBAR BELOW-->