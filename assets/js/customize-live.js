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
            if( $( '#_customize-input-show_icon_background', window.parent.document ).prop( 'checked' ) ) {
                $( '.social-media-block' ).attr( 'style', newValue );             
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
                    $( '.header-titles' ).removeClass( 'center-position right-position' );
                    $( '.header-titles' ).addClass( 'left-position' );
                    $( '.header-inner' ).removeClass( 'center-position' );
                    break;

                case 'center':
                    $( '.header-titles' ).removeClass( 'left-position right-position' );
                    $( '.header-titles' ).addClass( 'center-position' );
                    $( '.header-inner' ).addClass( 'center-position' );
                    break;

                case 'right':                
                    $( '.header-titles' ).removeClass( 'left-position center-position' );
                    $( '.header-titles' ).addClass( 'right-position' );
                    $( '.header-inner' ).removeClass( 'center-position' );
                    break;
            }

        });
    });

    wp.customize( 'content_sidebar_position', function ( value )  {
        value.bind( function ( value )  {

            switch ( value ) {

                case 'left':
                    $( '#site-content' ).removeClass( 'site-content-row site-content-column site-content-column-reverse' ); 
                    $( '#site-content' ).addClass( 'site-content-row-reverse' );
                    $( '#site-content-main' ).removeClass( 'site-content-main-full' );
                    $( '#site-content-main' ).addClass( 'site-content-main-cut' );
                    $( '#site-content-sitebar' ).removeClass( 'main-sidebar-right main-sidebar-top main-sidebar-bottom' ); 
                    $( '#site-content-sitebar' ).addClass( 'main-sidebar-left' );
                    break;
                    
                case 'right':
                    $( '#site-content' ).removeClass( 'site-content-row-reverse site-content-column site-content-column-reverse' ); 
                    $( '#site-content' ).addClass( 'site-content-row' );
                    $( '#site-content-main' ).removeClass( 'site-content-main-full' );
                    $( '#site-content-main' ).addClass( 'site-content-main-cut' );
                    $( '#site-content-sitebar' ).removeClass( 'main-sidebar-left main-sidebar-top main-sidebar-bottom' ); 
                    $( '#site-content-sitebar' ).addClass( 'main-sidebar-right' );
                    break;

                case 'top':                
                    $( '#site-content' ).removeClass( 'site-content-row site-content-row-reverse site-content-column' ); 
                    $( '#site-content' ).addClass( 'site-content-column-reverse' );
                    $( '#site-content-main' ).removeClass( 'site-content-main-cut' );
                    $( '#site-content-main' ).addClass( 'site-content-main-full' );
                    $( '#site-content-sitebar' ).removeClass( 'main-sidebar-left main-sidebar-right main-sidebar-bottom' ); 
                    $( '#site-content-sitebar' ).addClass( 'main-sidebar-top' );
                    break;

                case 'bottom':                
                    $( '#site-content' ).removeClass( 'site-content-row site-content-row-reverse site-content-column-reverse' ); 
                    $( '#site-content' ).addClass( 'site-content-column' );
                    $( '#site-content-main' ).removeClass( 'site-content-main-cut' );
                    $( '#site-content-main' ).addClass( 'site-content-main-full' );
                    $( '#site-content-sitebar' ).removeClass( 'main-sidebar-left main-sidebar-right main-sidebar-top' ); 
                    $( '#site-content-sitebar' ).addClass( 'main-sidebar-bottom' );
                    break;
            }
        });
    });

    wp.customize( 'content_post_font', function ( value )  {
        value.bind( function ( value )  {
            
            let item = $( 'select[data-id="content_post_item_font"]', window.parent.document ).val();
            $( item ).css( value );
        });
    });

    wp.customize( 'cover_enable', function ( value )  {
        value.bind( function ( value )  {
            if ( value ) {
                $('.cover').css('display','block');
            }
            else {
                $('.cover').css('display','none');
            }
        });
    });

    wp.customize( 'cover_image', function ( value )  {
        value.bind( function ( value )  {
            if ( $( '#_customize-input-cover_enable', window.parent.document ).prop('checked') ) {
                let image = 'no-repeat 100%/ cover url('+ value+')';
                $('.cover').css('background', image);
                /*let coverColor = $('input[data-id="cover_color"]', window.parent.document).val();
                $('[data-id="cover_color"] div button .color-alpha', window.parent.document).css('background', 'inherit');
                coverColor = 'none';*/
            }
        });
    });
    
    wp.customize( 'cover_color', function ( value )  {
        value.bind( function ( value )  {
            if ( $( '#_customize-input-cover_enable', window.parent.document ).prop('checked') ) {
                if ( $( '#customize-control-cover_image', window.parent.document ).children( '.image-wrapper' ).children( '.thumbnail' ).length == 0 ) {
                    $('.cover').css('background', value); 
                }
            }
        });
    });

    wp.customize( 'cover_opacity', function ( value )  {
        value.bind( function ( value )  {
            $('.cover').css('opacity', value);
        });
    });

}( jQuery ) );