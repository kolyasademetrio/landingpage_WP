/*jQuery(document).ready(function () {
		(function () {
			var $catItem__linkPhoto = jQuery('.catItem__linkPhoto');

			$catItem__linkPhoto.on('click', function (e) {
				alert(1);
				e.preventDefault();

				var $thisTooltip = jQuery(this).find('.catItem__tooltip');

				if ($thisTooltip.is(':visible')) {
					$thisTooltip.hide();
				} else {
					$thisTooltip.removeAttr('style');
				}

				jQuery(this).find('.catItem__descrHidden').toggle();
			});

		})();
});*/
(function () {
	var $catItem__linkPhoto = jQuery('.catItem__linkPhoto');

	$catItem__linkPhoto.on('click', function (e) {
		e.preventDefault();

		var $thisTooltip = jQuery(this).find('.catItem__tooltip');

		if ($thisTooltip.is(':visible')) {
			$thisTooltip.hide();
		} else {
			$thisTooltip.removeAttr('style');
		}

		jQuery(this).find('.catItem__descrHidden').toggle();
	});

})();

		/*--------------------------------- функция для адаптивного меню -----------------------------*/

		function menuAdapt(menuBtn, menu, header) {

			var $menuBtn = menuBtn,
				$menu = menu,
				$header = header,
				menuHeight;

			$menuBtn.on('click', function () {
				menuHeight = $header.height();
				$menu.css('top', menuHeight);
				$menu.slideToggle();
			});

			jQuery(window).resize(function () {
				if (window.matchMedia('(max-width: 992px)').matches && jQuery($menu).is(':visible')) {
					jQuery($menu).hide();
				} else if (window.matchMedia('(min-width: 992px)').matches) {
					jQuery($menu).show();
				}
			});

		}

		menuAdapt(jQuery('.header .glyphicon.glyphicon-menu-hamburger'), jQuery('.header__navList'), jQuery('.header'));

		/*--------------------------------- функция для адаптивного меню End -------------------------*/


		/*--------------------------------- функция для якоря -------------------------*/

		function ancor(ancor, goal) {

			jQuery(ancor).on('click', function (e) {
				jQuery('html,body').stop().animate({scrollTop: jQuery(goal).offset().top}, 2000);
				e.preventDefault();
			});

		}

		// ancor(jQuery('#choice'), jQuery('.choice'));
		// ancor(jQuery('#feedback'), jQuery('.feedback'));
		// ancor(jQuery('#toPartners'), jQuery('.toPartners'));
		// ancor(jQuery('#ourContacts'), jQuery('.ourContacts'));

		/*--------------------------------- функция для якоря Конец -------------------------*/


		/*--------------------------------- функция для вкладок -----------------------------*/

		function getTabs(tabsClass, sectionsClass, classActive) {
			var $tabs = jQuery('.' + tabsClass),
				$sections = jQuery('.' + sectionsClass);

			$sections.not(':first').addClass('choice__posAbs');

			$tabs.click(function () {
				$tabs.removeClass(classActive).eq(jQuery(this).index()).addClass(classActive);
				$sections.addClass('choice__posAbs').eq(jQuery(this).index()).removeClass('choice__posAbs');
			}).eq(0).addClass(classActive);
		}

		/* вызов функции вкладок */
		// getTabs('choice__tab', 'choice__slider', 'active');

		/*--------------------------------- функция для вкладок End -------------------------*/


		/*--------------------------------- функция для карусели -------------------------*/

		function getCarousel(list, element, arrowRight, arrowLeft) {
			var $list = jQuery('.' + list),
				$element = jQuery('.' + element),
				$arrowRight = jQuery('.' + arrowRight),
				$arrowLeft = jQuery('.' + arrowLeft),
				$carouselSimple__wrap = jQuery('.carouselSimple__wrap'),
				elemWidth = $carouselSimple__wrap.outerWidth(true);

			$element.width(elemWidth);
			$list.css({'left': -elemWidth}).prepend($element.last());

			jQuery(window).resize(function () {

				var $list = jQuery('.' + list),
					$element = jQuery('.' + element),
					$arrowRight = jQuery('.' + arrowRight),
					$arrowLeft = jQuery('.' + arrowLeft),
					$carouselSimple__wrap = jQuery('.carouselSimple__wrap'),
					elemWidth = $carouselSimple__wrap.outerWidth(true);

				$element.width(elemWidth);
				$list.css({'left': -elemWidth});

			});

			function nextSlide() {
				$list.animate({'margin-left': -elemWidth}, 500, function () {
					jQuery('.' + element).first().appendTo($list);
					$list.css({'margin-left': 0});
				});
			}

			function prevSlide() {
				$list.animate({'margin-left': elemWidth}, 500, function () {
					jQuery('.' + element).last().prependTo($list);
					$list.css({'margin-left': 0});
				});
			}

			$arrowRight.click(function () {
				nextSlide();
			});

			$arrowLeft.click(function () {
				prevSlide();
			});
		}

		/* вызов функции для карусели carouselSimple */
		// getCarousel('carouselSimple__list_1', 'carouselSimple__item_1', 'carouselSimple__arrowRight_1', 'carouselSimple__arrowLeft_1');
		// getCarousel('carouselSimple__list_2', 'carouselSimple__item_2', 'carouselSimple__arrowRight_2', 'carouselSimple__arrowLeft_2');
		// getCarousel('carouselSimple__list_3', 'carouselSimple__item_3', 'carouselSimple__arrowRight_3', 'carouselSimple__arrowLeft_3');

		/*--------------------------------- функция для карусели End -------------------------*/


		/*--------------------------------- функция для выравнивания высоты колонок -------------------------*/

		function setMaxHeight(elem) {
			var $elem = jQuery('.' + elem),
				arrAllHeight = [],
				maxHeight;

			$elem.each(function () {
				arrAllHeight.push(jQuery(this).height());
			});

			maxHeight = Math.max.apply(null, arrAllHeight);

			$elem.height(maxHeight);
		}


		/* вызов функции для выравнивания высоты колонок */
		// if (window.matchMedia('only screen and (max-width : 992px)').matches) {

		// 	setMaxHeight('itemQuestion');
		// 	setMaxHeight('itemAnswer');

		// }

		// jQuery(window).resize(function(){

		// 		if ( window.matchMedia('only screen and (max-width : 992px)').matches ) {

		// 			setMaxHeight('itemQuestion');
		// 	  		setMaxHeight('itemAnswer');

		// 		}

		// });

		// setMaxHeight('serviceFooter');

		/*--------------------------------- функция для выравнивания высоты колонок End -------------------------*/

