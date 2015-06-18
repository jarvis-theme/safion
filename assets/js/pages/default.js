define(['jquery','bootstrap','noty'], function($)
{
    return new function(){
        var self = this;
        self.run = function(){
            // tampilkan error noty
            var msg = $('#message');
            if(msg.length){
                type = $(msg).attr('class');
                text = $(msg).html();
                noty({"text":text,"layout":"top","type":type});    
            }

            // BACK TO TOP
            $('.back-top').click(function(e) { 
                $('body, html').animate({scrollTop:$('header').offset().top}, 1000); 
                event.preventDefault(); 
            });

            $('footer h4.title').click(function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle(250);
            });
        };
    }
});