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
        value.bind( function ( newValue )  {
            
            switch ( newValue ) {

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
        value.bind( function ( newValue )  {

            switch ( newValue ) {

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
        value.bind( function ( newValue )  {
            let item = $( 'select[data-id="content_post_item_font"]', window.parent.document ).val();
            $( item ).css( newValue );
        });
    });

    wp.customize( 'cover_enable', function ( value )  {
        value.bind( function ( newValue )  {
            if ( newValue ) {
                $('.cover').css('display','block');
            }
            else {
                $('.cover').css('display','none');
            }
        });
    });

    wp.customize( 'cover_image', function ( value )  {
        value.bind( function ( newValue )  {
            if ( $( '#_customize-input-cover_enable', window.parent.document ).prop('checked') ) {
                let image = 'no-repeat 100%/ cover url('+ newValue+')';
                $('.cover').css('background', image);
            }
        });
    });
    
    wp.customize( 'cover_color', function ( value )  {
        value.bind( function ( newValue )  {
            if ( $( '#_customize-input-cover_enable', window.parent.document ).prop('checked') ) {
               
                if ( $( '#customize-control-cover_image', window.parent.document ).children( '.image-wrapper' ).children( '.thumbnail' ).length == 0 ) {
                    $('.cover').css('background-color', newValue); 
                }
            }
        });
    });

    wp.customize( 'cover_opacity', function ( value )  {
        value.bind( function ( newValue )  {
            $('.cover').css('opacity', newValue);
        });
    });

    wp.customize( 'content_full', function ( value )  {
        value.bind( function ( value )  {

            if ( value ) {
                
                $( '#site-header' ).css( 'width', '100%' );
                $( '.header-navigation-wrapper' ).css( 'width', '100%' );
                $( '.alt-navigation-wrapper' ).css( 'width', '100%' );
                $( '.breadcrumbs ' ).css( 'width', '100%' );
                $( '#main' ).css( 'width', '100%' ); 
            } else {

                value = $('input[data-customize-setting-link="custom_content_width"]', window.parent.document).val();
                
                if ( value >= 1030 && value <= 1700 ){ 

                    value = value + 'px';

                    $( '#site-header' ).css( 'width', value );
                    $( '.header-navigation-wrapper' ).css( 'width', value );
                    $( '.alt-navigation-wrapper' ).css( 'width', value );
                    $( '.breadcrumbs ' ).css( 'width', value );
                    $( '#main' ).css( 'width', value ); 
                    $( '.footer-nav-widgets-wrapper' ).css( 'width', value );
                    $( '#site-footer' ).css( 'width', value );
                }
            }
        });
    });

    wp.customize( 'custom_content_width', function ( value )  {
        value.bind( function ( value )  {

            if ( value >= 1030 && value <= 1700 ){
             
                if ( $( '#_customize-input-content_full', window.parent.document ).prop( 'checked' ) ) {
                    // nothing!
                } else {

                    if ( $( window ).width() >=  parseInt( value ) + 30 ) {
           
                        value = value + 'px';
                        $( '#site-header' ).css( 'width', value );  
                        $( '.header-navigation-wrapper' ).css( 'width', value );
                        $( '.alt-navigation-wrapper' ).css( 'width', value );
                        $( '.breadcrumbs ' ).css( 'width', value );
                        $( '#main' ).css( 'width', value ); 
                        $( '.footer-nav-widgets-wrapper' ).css( 'width', value );
						$( '#site-footer' ).css( 'width', value );
                    } 
                }
            }
        });
    });

    wp.customize( 'show_tagline', function ( value )  {
        value.bind( function ( value )  {

            if ( value == true ) {
                $( '.site-description' ).css( 'display', 'block' );
            } else {
                $( '.site-description' ).css( 'display', 'none' );
            }
        });
    });

    wp.customize( 'breadcrumbs_position', function ( value )  {
        value.bind( function ( newValue )  {
            $( '.breadcrumbs' ).css( 'text-align', newValue );
        });
    });

    wp.customize( 'position_social_footer', function ( value )  {
        value.bind( function ( newValue )  {
            if ( $( window ).width() >= 1000 ) {
                $( '.footer-top' ).css( 'justify-content', newValue );
            }
        });
    });

}( jQuery ) );