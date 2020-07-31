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

    wp.customize( 'header_logo_position', function ( value )  {
        value.bind( function ( value )  {

            switch ( value ) {

                case 'left':
                    $( '#site-header' ).after( $( 'style' ).html( '@media (min-width: 1000px) { .header-titles { display: flex; flex-direction: row; justify-content: flex-start; align-items: center;  margin-top: 0.5em; } .site-description { margin-left: 60px; } }' ) );
                    break;

                case 'center':
                    $( '#site-header' ).after( $( 'style' ).html( '@media (min-width: 1000px) { .header-titles { display: flex; flex-direction: column; justify-content: center; align-items: center; } }' ) );
                    break;

                case 'right':                
                    $( '#site-header' ).after( $( 'style' ).html( '@media (min-width: 1000px) { .header-titles { display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; margin-top: 0.5em; } .site-title { margin-left: 60px !important; } }' ) );
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

                case 'buttom ':                
                    $( '.catalog-item' ).css( 'margin', '30px 0 0 0' );
                    $( 'main' ).css( 'flex-direction', 'column' );
                    break;
            }
        });
    });
}( jQuery ) );