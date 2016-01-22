(function($){
	$(function(){ // document ready

		// inits

		$('.clt_col_main .clt_tooltip_help').tooltipster({
			position: 'bottom-left',
			maxWidth: 300,
			delay: 100
		});

		$('.clt_col_aside .clt_tooltip_help').tooltipster({
			position: 'bottom',
			maxWidth: 300,
			delay: 100
		});

		$('#more_articles').owlCarousel({
			loop: false,
			margin:0,
			nav:true,
			mouseDrag: false,
			items: 1
		});

		tabsInit();
		switchesInit();
		accordionInit();

		$('.clt_toggle_box').click(function(){
			$(this).hide();
			$('#' + $(this).data('toggle-target')).slideToggle(300);
		});

		// functions

		function tabsInit()
		{
			$('.clt_tabs_container').each(function(){
				default_tab = $(this).find('> .clt_tabs').data('default');

				if(typeof default_tab !== 'undefined')
				{
					default_tab = parseInt(default_tab);
					id = $(this).find('> .clt_tabs > li:eq('+ (default_tab - 1) +')').addClass('clt_tab_active').find('> a').attr('href');
					$(this).find('> .clt_tabs_content > ' + id).addClass('clt_show_content');
				}
				else
					$(this).find('> .clt_tabs_content:first').addClass('clt_show_content');
			});

			$('.clt_tabs > li > a').click(function(e){
				e.preventDefault();

				id = $(this).attr('href');

				$(this).closest('.clt_tabs').find('> li.clt_tab_active').removeClass('clt_tab_active');
				$(this).closest('li').addClass('clt_tab_active');

				$(this).closest('.clt_tabs_container').find('> .clt_tabs_content > .clt_show_content').removeClass('clt_show_content');
				$(this).closest('.clt_tabs_container').find('> .clt_tabs_content > ' + id).addClass('clt_show_content');
			});
		}

		function switchesInit()
		{
			$('.clt_switch').each(function(){
				$(this).find('input[type="radio"]:checked').closest('.clt_switch_button').addClass('clt_switch_active');
			})

			$('.clt_switch .clt_switch_button').click(function(){
				$(this).closest('.clt_switch').find('> .clt_switch_button.clt_switch_active').removeClass('clt_switch_active');
				$(this).closest('.clt_switch_button').addClass('clt_switch_active');
			});
		}

		function accordionInit()
		{
			$('.clt_accr_head').click(function(){
				$(this).toggleClass('clt_accr_active').find('> div').toggleClass('clt_accr_head_top_margin').closest('li').toggleClass('clt_li_active')
					.find('> .clt_accr_content').stop().slideToggle(300);
				//$(this).find('> div').toggleClass('clt_accr_head_top_margin');

				clt_accordion = $(this).closest('.clt_accordion');
				clt_accordion.find('> .clt_li_active > .clt_accr_head').not(this).removeClass('clt_accr_active').find('> div').removeClass('clt_accr_head_top_margin').closest('li').removeClass('clt_li_active')
					.find('> .clt_accr_content').stop().slideUp(300);

			});
		}

	});
})(jQuery);