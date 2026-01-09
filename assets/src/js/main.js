import 'babel-polyfill';

import General from './_generalScripts';



const App = {



	/**

	 * App.init

	 */

	init() {

		// General scripts

		function initGeneral() {

			return new General();

		}

		initGeneral();

		$('header .header-bottom .inner ul .item').on('mouseover',function(){
			$('.dropdown-menu').removeClass('show');
			$(this).find('.dropdown-menu').addClass('show');
		});
		$('header').on('mouseleave',function(){
			$('.dropdown-menu').removeClass('show');
		});

	}



};



document.addEventListener('DOMContentLoaded', () => {

	App.init();

});

