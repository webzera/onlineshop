(function($) {
    $.fn.sideSlider = function(options) {
        var $this = $(this);
        var settings = $.extend({
            speed        : 1,
            side         : 'right',
            complete : null
        }, options);

        var side = 'marginRight';
        if(settings.side == 'left'){
            side = 'marginLeft';
        }
        var speed_multiplier = parseInt(settings.speed);
        var finish = $this.css(side).replace('px','');
        var distance = $('.sideslider-close').width();
        var start =$('.sideslider').css(side).replace('px','');

        $this.mouseenter(function(){
            if($this.css(side).replace('px','')==start)
            {
                if(side == 'marginRight'){
                    $this.animate({marginRight:"+="+distance},speed_multiplier*1000,function(){finish=$this.css(side).replace('px','');});
                }
                else if(side == 'marginLeft')
                {
                    $this.animate({marginLeft:"+="+distance},speed_multiplier*1000,function(){finish=$this.css(side).replace('px','');});
                }
            }
        });
       $('.sideslider-tab, #sideslider .sideslider-close').click(function()
        {
            if($this.css(side).replace('px','')==finish)
            {
                if(side == 'marginRight'){
                    $this.animate({marginRight:"-="+distance},speed_multiplier*1000,function(){start=$this.css(side).replace('px','');});
                }
                else if(side == 'marginLeft')
                {
                    $this.animate({marginLeft:"-="+distance},speed_multiplier*1000,function(){start=$this.css(side).replace('px','');});
                }
            }
        });
        return $this.each( function() {
            if ( $.isFunction( settings.complete ) ) {
                settings.complete.call( this );
            }
        });
    }
}(jQuery));