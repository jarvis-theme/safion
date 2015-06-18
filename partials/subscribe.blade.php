<div id="newsletter" class="col-xs-12 col-sm-12 col-lg-6">
	<h4 class="title">Newsletter</h4>
    <div class="block-content">
        <p>Jadilah orang pertama yang mendapatkan info produk terbaru, dan promo dari kami. <br>Daftarkan email anda dan dapatkan segera promo menarik.</p>
        <form class="newsletter-form" action="{{@$mailing->action}}" method="post" target="_blank" novalidate>
            <input type="text" value="" {{ @$mailing->action==''?'disabled="disabled"':'' }} placeholder="Enter your email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL"/>
            <div class="fr">
                <button type="submit" {{ @$mailing->action==''?'disabled="disabled"':'' }}>SUBSCRIBE</button>
            </div>
            <div class="clr"></div>
        </form>
    </div>
</div>