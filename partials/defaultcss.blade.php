	<!-- Default css-->
	{{favicon()}}
	{{generate_theme_css('safion/assets/css/reset.css')}}
	{{generate_theme_css('safion/assets/css/bootstrap.css')}}
	{{generate_theme_css('safion/assets/css/font-awesome.min.css')}}
	@if($tema->isiCss=='')	
	{{generate_theme_css('safion/assets/css/style.css')}}
	@else 	
	{{generate_theme_css('safion/assets/css/editstyle.css')}}
	@endif	
	{{generate_theme_css('safion/assets/css/flexslider.css')}}
	{{generate_theme_css('safion/assets/css/owl.carousel.css')}}
	{{generate_theme_css('safion/assets/css/owl.theme.css')}}
	{{generate_theme_css('safion/assets/css/jquery.fancybox.css')}}
	<!-- Other -->