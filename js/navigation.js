/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );


(function($) { // Begin jQuery
	jQuery(function() { // DOM ready
	  // If a link has a dropdown, add sub menu toggle.
	  jQuery('nav ul li a:not(:only-child)').click(function(e) {
		jQuery(this).siblings('.nav-dropdown').toggle();
		// Close one dropdown when selecting another
		jQuery('.nav-dropdown').not(jQuery(this).siblings()).hide();
		e.stopPropagation();
	  });
	  // Clicking away from dropdown will remove the dropdown class
	  jQuery('html').click(function() {
		jQuery('.nav-dropdown').hide();
	  });
	  // Toggle open and close nav styles on click
	  jQuery('#nav-toggle').click(function() {
		jQuery('nav ul').slideToggle();
	  });
	  // Hamburger to X toggle
	  jQuery('#nav-toggle').on('click', function() {
		this.classList.toggle('active');
		this.parentNode.classList.toggle('active');
	  });
	  jQuery(window).on('resize', function() {
		if(jQuery(window).width() > 601 && jQuery(".menu").prop('style', 'display: none;')) {
			// jQuery(".menu").show()
			jQuery(".menu").prop('style', 'display: flex;')
		}
		else {
			jQuery(".menu").prop('style', '')
		}
	  })
	}); // end DOM ready
})(); // end jQuery


(function($) { // Begin jQuery
	jQuery(function() { // DOM ready
	  	// If a link has a dropdown, add sub menu toggle.
	  	jQuery(".carousel").swipe({
			swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
				if (direction == 'left') jQuery(this).carousel('next');
				if (direction == 'right') jQuery(this).carousel('prev');
			},
			allowPageScroll: "vertical" 
		});
	}); // end DOM ready
})(); // end jQuery


function ppoToggleDaycareLikeAction(ele) {
	jQuery(`#${ele.id}`).find(".ppo-not-liked, .ppo-liked").toggle("fast")
}