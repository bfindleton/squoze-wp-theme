/**
 * Handles toggling the main navigation menu for small screens.
 * Layout fixes for sidebar behavior
 */
jQuery( document ).ready( function( $ ) {
	var $masthead = $( '#masthead' ),
	    timeout = false;

	/**
	 * @function jQuery.fn.compare
	 * @parent jQuery.compare
	 *
	 * Compare two elements and return a bitmask as a number representing the following conditions:
	 *
	 * - `000000` -> __0__: Elements are identical
	 * - `000001` -> __1__: The nodes are in different documents (or one is outside of a document)
	 * - `000010` -> __2__: #bar precedes #foo
	 * - `000100` -> __4__: #foo precedes #bar
	 * - `001000` -> __8__: #bar contains #foo
	 * - `010000` -> __16__: #foo contains #bar
	 *
	 * You can check for any of these conditions using a bitwise AND:
	 *
	 *     if( $('#foo').compare($('#bar')) & 2 ) {
	 *       console.log("#bar precedes #foo")
	 *     }
	 *
	 * @param {HTMLElement|jQuery} element an element or jQuery collection to compare against.
	 * @return {Number} A number representing a bitmask deatiling how the elements are positioned from each other.
	 */
	$.fn.compare = function(element){ //usually 
		//element is usually a relatedTarget, but element/c it is we have to avoid a few FF errors
		
		try{ //FF3 freaks out with XUL
			element = element.jquery ? element[0] : element;
		}catch(e){
			return null;
		}
		if (window.HTMLElement) { //make sure we aren't coming from XUL element

			var s = HTMLElement.prototype.toString.call(element)
			if (s == '[xpconnect wrapped native prototype]' || s == '[object XULElement]' || s === '[object Window]') {
				return null;
			}

		}
		if(this[0].compareDocumentPosition){
			return this[0].compareDocumentPosition(element);
		}
		if(this[0] == document && element != document) return 8;
		var number = (this[0] !== element && this[0].contains(element) && 16) + (this[0] != element && element.contains(this[0]) && 8),
			docEl = document.documentElement;
		if(this[0].sourceIndex){
			number += (this[0].sourceIndex < element.sourceIndex && 4)
			number += (this[0].sourceIndex > element.sourceIndex && 2)
			number += (this[0].ownerDocument !== element.ownerDocument ||
				(this[0] != docEl && this[0].sourceIndex <= 0 ) ||
				(element != docEl && element.sourceIndex <= 0 )) && 1
		}else{
			var range = document.createRange(), 
				sourceRange = document.createRange(),
				compare;
			range.selectNode(this[0]);
			sourceRange.selectNode(element);
			compare = range.compareBoundaryPoints(Range.START_TO_START, sourceRange);
			
		}

		return number;
	};
	
	$.fn.smallMenu = function() {
		$masthead.find( '.site-navigation' ).removeClass( 'main-navigation' ).addClass( 'main-small-navigation' );
		$masthead.find( '.site-navigation h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );

		$( '.menu-toggle' ).unbind( 'click' ).click( function() {
			$masthead.find( '.menu' ).toggle();
			$( this ).toggleClass( 'toggled-on' );
		} );
		
		// swap if 3 column layout
		if( $('#primary').compare( $('#tertiary') ) & 2 ) {
			$('#tertiary').insertAfter('#primary');
		}
		// swap for smallifying
		$('#header-search form').prependTo('#below-search');
		// remove height fix now that we're small
		$('#primary').css('min-height', '');
	};
	
	// Check viewport width on first load.
	if ( $( window ).width() < 640 ) {
		$.fn.smallMenu();
	} else {
		// set #primary height if needed
		if ( null !== ( new_height = chk_primary_ht() ) )
			$('#primary').css('min-height', new_height );
	}

	// Check viewport width when user resizes the browser window.
	$( window ).resize( function() {
		var browserWidth = $( window ).width();

		if ( false !== timeout )
			clearTimeout( timeout );

		timeout = setTimeout( function() {
			if ( browserWidth < 640 ) {
				$.fn.smallMenu();
			} else {
				$masthead.find( '.site-navigation' ).removeClass( 'main-small-navigation' ).addClass( 'main-navigation' );
				$masthead.find( '.site-navigation h1' ).removeClass( 'menu-toggle' ).addClass( 'assistive-text' );
				$masthead.find( '.menu' ).removeAttr( 'style' );
				// reset layout
				if ( typeof layout_object != 'undefined' )
					if ( layout_object.layout == 'both' )
						$('#primary').insertAfter('#tertiary');	
				// swap for bigifying
				$('#below-search form').prependTo('#header-search');
				// set #primary height if needed
				if ( null !== ( new_height = chk_primary_ht() ) )
					$('#primary').css('min-height', new_height );
			}
		}, 200 );
	} );
	
	// set #primary height, if needed, so sidebars behave
	function chk_primary_ht() {
	
		var sidebar_height = null;
		
		if ( $('#tertiary').length ) {
			if ( $('#secondary').height() > $('#tertiary').height() ) {
				sidebar_height = $('#secondary').height() + 10;
			} else {
				sidebar_height = $('#tertiary').height() + 10;
			}
		}
		
		return sidebar_height;
	}
	
} );