/* global edmontonBgColors, edmontonColor, jQuery, casta, _ */
/**
 * Customizer enhancements for a better user experience.
 *
 * Contains extra logic for our Customizer controls & settings.
 *
 * @since Edmonton 1.0
 */

( function( $ ) {
	wp.customize( 'color_icon_background', function ( value )  {
		value.bind( function ( newValue )  {
			newValue = 'background-color: ' + newValue + ' !important;' + ' cursor: pointer !important';
            $( '.social-media-block' ).attr( 'style', newValue );
		});
    });
    
    wp.customize( 'color_icon', function ( value )  {
        value.bind( function ( newValue )  {
            newValue = 'fill: ' + newValue + ' !important;' + ' cursor: pointer !important';
            $( '.social-media-block svg' ).attr( 'style', newValue );
            newValue = 'color: ' + newValue + ' !important;' + ' cursor: pointer !important';
            $( '.social-media-block img' ).attr( 'style', newValue );
        });
    });

    wp.customize( 'header_width', function ( value )  {
        value.bind( function ( newValue )  {
            console.log( 'newValue: ', newValue );
            //$( '#_customize-input-header_width_text' ).attr( 'value', newValue );
            //$( '#_customize-input-header_width_text' ).val( newValue );
            var api = wp.customize;
            var _wpCustomizeSettings = {
                    "theme":{
                        "stylesheet":"genesis-skins",
                        "active":true
                    },
                    "url":{
                        "preview":"http:\/\/mysite.com\/",
                        "parent":"http:\/\/mysite.com\/wp-admin\/",
                        "activated":"http:\/\/mysite.com\/wp-admin\/themes.php?activated=true&previewed",
                        "ajax":"\/wp-admin\/admin-ajax.php",
                        "allowed":["http:\/\/mysite.com\/"],
                        "isCrossDomain":false,
                    }
                };
            api.setting = window._wpCustomizeSettings;
            api.instance('my_theme_options[header_width_text]').set( newValue );
            
            newValue = 'width: ' + newValue + 'px; ';

            $( 'header' ).attr( 'style', newValue );
	        $( '.header-navigation-wrapper' ).attr( 'style', newValue );
	        $( '.alt-navigation-wrapper' ).attr( 'style', newValue );
	        $( '#site-content' ).attr( 'style', newValue );
            $( '.footer-nav-widgets-wrappe' ).attr( 'style', newValue );
            //newValue = 'fill: ' + newValue + ' !important;' + ' cursor: pointer !important';
            //$( '.social-media-block svg' ).attr( 'style', newValue );
        });
    });
}( jQuery ) );