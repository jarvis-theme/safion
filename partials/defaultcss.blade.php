	<!-- Default css-->
	{{favicon()}} 
	{{generate_theme_css('safion/assets/css/reset.css')}} 
	{{--generate_theme_css('safion/assets/css/bootstrap.css')--}} 
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	@if($tema->isiCss=='')	
	{{generate_theme_css('safion/assets/css/style.css?v=001')}} 
	@else 	
	{{generate_theme_css('safion/assets/css/editstyle.css')}} 
	@endif	
	{{generate_theme_css('safion/assets/css/flexslider.css')}} 
	{{generate_theme_css('safion/assets/css/owl.carousel.css')}} 
	{{generate_theme_css('safion/assets/css/owl.theme.css')}} 
	{{generate_theme_css('safion/assets/css/jquery.fancybox.css')}} 
	<!-- Other -->