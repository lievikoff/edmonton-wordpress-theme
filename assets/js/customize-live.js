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
			newValue = 'background-color: ' + newValue + ' !important;' + ' cursor: pointer !important;';
            //$( '.social-media-block' ).attr( 'style', newValue );
            if($('#_customize-input-show_icon_background', window.parent.document).prop('checked')){
                $( '.social-media-block' ).attr( 'style', newValue );
                console.log($('#customize-control-color_icon .kirki-input-container .wp-picker-container .button.wp-color-result .color-alpha', window.parent.document).css('background-color'));
            }
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

    wp.customize( 'header_logo_position', function ( value )  {
        value.bind( function ( value )  {
            
            switch ( value ) {

                case 'left':
                    $( '.header-titles' ).removeClass('center-position right-position');
                    $( '.header-titles' ).addClass('left-position');
                    $(' .header-inner ').removeClass('center-position');
                    break;

                case 'center':
                    $( '.header-titles' ).removeClass('left-position right-position');
                    $( '.header-titles' ).addClass('center-position');
                    $(' .header-inner ').addClass('center-position');
                    break;

                case 'right':                
                    $( '.header-titles' ).removeClass('left-position center-position');
                    $( '.header-titles' ).addClass('right-position');
                    $(' .header-inner ').removeClass('center-position');
                    break;
            }

        });
    });
}( jQuery ) );