jQuery(function($){
	var portfolio = $('#portfolio');
	portfolio.masonry({
		isAnimated: true,
		itemSelector:'.bloc:not(.hidden)',
		isFitWidth:true,
		columnWidth:160
	});

	var bloc = portfolio.find('.bloc:first'); 
	var cssi = {width:bloc.width(),height:bloc.height(),display:'block'};
	var cssiHidden = {width:bloc.width(),height:bloc.height(),display:'none'};
	var cssf = null; 

	portfolio.find('a.thumb').click(function(e){
		var elem = $(this); 
		//var cls = elem.attr('href').replace('#','');
		if (portfolio.find('.unfold').length) {
		    portfolio.find('.unfold').slideUp(
      	      1000, 
      	      function(){
     	          var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi);
      	          portfolio.masonry('reload');
      	          var unfold = elem.parent().addClass('unfold').css(cssf);
			portfolio.masonry('reload');
			if(cssf == null){
				cssf = {
					width : unfold.width(),
					height : unfold.height()
				};
			}
			unfold.css(cssiHidden).animate(cssf, function(){
    	        $(this).slideDown(1000);	
			});
     	      }
        );
		} else {
			var unfold = elem.parent().addClass('unfold').css(cssf);
			portfolio.masonry('reload');
			if(cssf == null){
				cssf = {
					width : unfold.width(),
					height : unfold.height()
				};
			}
			unfold.css(cssiHidden).animate(cssf, function(){
    	        $(this).slideDown(1000);	
			});
		}
		
		
		//unfold.toggle();
	})
	
	portfolio.find('img.close').click(function(e) {
        var elem = $(this);
        document.location.href = '#';portfolio.masonry('reload');
        portfolio.find('.unfold').slideUp(
            1000, 
            function(){
                var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi);
                portfolio.masonry('reload');
            }
        );
		//var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi).toggle(3000);
		//portfolio.masonry('reload');
	})

	if(location.hash != ''){
		$('a[href="'+location.hash+'"]').trigger('click');
	}
})