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
                $( '.social-media-block' ).attr( 'style', newValue );            }
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

    wp.customize( 'content_sidebar_position', function ( value )  {
        value.bind( function ( value )  {

            switch ( value ) {

                case 'left':
                    $( '.catalog-item' ).css( 'margin', '30px 0 0 30px' );
                    $( 'main' ).css( 'flex-direction', 'row-reverse' );
                    break;

                case 'right':
                    $( '.catalog-item' ).css( 'margin', '30px 30px 0 0' );
                    $( 'main' ).css( 'flex-direction', 'row' );
                    break;

                case 'top':                
                    $( '.catalog-item' ).css( 'margin', '30px 0 0 0' );
                    $( 'main' ).css( 'flex-direction', 'column-reverse' );
                    break;

                case 'bottom':                
                    $( '.catalog-item' ).css( 'margin', '30px 0 0 0' );
                    $( 'main' ).css( 'flex-direction', 'column' );
                    break;
            }
        });
    });

    wp.customize( 'content_post_font', function ( value )  {
        value.bind( function ( value )  {
            let item = $('select[data-id="content_post_item_font"]', window.parent.document).val();
            $(item).css(value);
        });
    });
}( jQuery ) );