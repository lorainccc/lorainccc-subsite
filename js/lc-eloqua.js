/**
 * LCCC Tracking Scripts
 *
	*/

/** Begin Eloqua tracking script **/
	var _elqQ = _elqQ || [];
	_elqQ.push(['elqSetSiteId', '577764303']);
	_elqQ.push(['elqTrackPageView']);

	(function () {
					function async_load() {
									var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
									s.src = '//img04.en25.com/i/elqCfg.min.js';
									var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
					}
					if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
					else if (window.attachEvent) window.attachEvent('onload', async_load); 
	})();
/** End Eloqua tracking script **/