$(document).ready(function() {

	var $menuBtn = $('.menu-btn');
	var $closemenuBtn = $('.button-kebap');
	var $closemenuoverlay = $('#overlay');
	var $nav = $('#nav-aside-left');
	var $stylebox = $('#style-box');
	var $styleli = $stylebox.find('li');
	var flag = 0;

	$menuBtn.on('click', function() {
		var $this = $(this);
		$this.toggleClass("active");
		$this.next('#nav-aside-left').toggleClass("open");
		$('#nav-aside-right').addClass('s-closed').removeClass('s-opened');
		$closemenuoverlay.show();
		flag++;
		if(flag==2)
		{
			$closemenuoverlay.hide();
			flag=flag%2;
		}
	});
	$nav.addClass('leftslide');
	$closemenuBtn.on('click',function(){
		flag=0;
		var $this = $(this);
		$this.toggleClass("active");
		$nav.removeClass('open');
		$menuBtn.removeClass("active");
		$closemenuoverlay.show();
		$('#nav-aside-right').removeClass('s-closed').addClass('s-opened');
	});

	$closemenuoverlay.on('click',function(){
		flag=0;
		$closemenuoverlay.hide();
		$nav.removeClass('open');
		$menuBtn.removeClass("active");
		$('#nav-aside-right').addClass('s-closed').removeClass('s-opened');
	});



});
