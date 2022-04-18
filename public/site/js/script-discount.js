jQuery(document).ready(
		function($) {
			"use strict";
			$('#customers-testimonials').owlCarousel(
					{
						loop : true,
						center : false,
						items : 3,
						margin : 30,
						autoplay : true,
						dots : true,
						nav : true,
						autoplayTimeout : 4500,
						smartSpeed : 450,
						navText : [ '<i class="fa fa-angle-left"></i>',
								'<i class="fa fa-angle-right"></i>' ],
						responsive : {
							0 : {
								items : 1
							},
							576 : {
								items : 2
							},
							768 : {
								items : 2
							},
							992 : {
								items : 3
							},
							1200 : {
								items : 4
							},

						}
					});
		});

jQuery(document).ready(
		function($) {
			"use strict";
			$('#product-testimonials').owlCarousel(
					{
						loop : true,
						center : false,
						items : 3,
						margin : 30,
						autoplay : true,
						dots : true,
						nav : true,
						autoplayTimeout : 4500,
						smartSpeed : 450,
						navText : [ '<i class="fa fa-angle-left"></i>',
								'<i class="fa fa-angle-right"></i>' ],
						responsive : {
							0 : {
								items : 1
							},

						}
					});
		});
jQuery(document).ready(
		function($) {
			"use strict";
			$('#container-image-place').owlCarousel(
					{
						loop : true,
						center : false,
						items : 3,
						margin : 30,
						autoplay : true,
						dots : true,
						nav : true,
						autoplayTimeout : 4500,
						smartSpeed : 450,
						navText : [ '<i class="fa fa-angle-left"></i>',
								'<i class="fa fa-angle-right"></i>' ],
						responsive : {
							0 : {
								items : 1
							},
							576 : {
								items : 2
							},
							768 : {
								items : 2
							},
							992 : {
								items : 3
							},
							1200 : {
								items : 4
							},

						}
					});
		});