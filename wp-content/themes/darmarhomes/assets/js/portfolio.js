/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
* Copyright by WebMan - www.webmandesign.eu
*
* Portfolio scripts
*****************************************************
*/
jQuery( function() {



/*
*****************************************************
*      PORTFOLIO LIST
*****************************************************
*/
if ( jQuery().quicksand ) {

//Duplicate portfolio list
var portfolioContent = jQuery( '#portfolio-filterable .portfolio-content ul' ),
    contentClone     = portfolioContent.clone();

//Required first run to reset animation
portfolioContent.quicksand(
	contentClone.find( 'li' ), {
		attribute  : 'data-id',
		duration   : 50,
		enhancement  : function(){
				jQuery( '#portfolio-filterable .portfolio-content .desc' ).css( { left: -220, top: -220 } );
				jQuery( '#portfolio-filterable .portfolio-content li' ).hover( function(){
					jQuery( this ).find( '.desc' ).stop().animate( { left: 0, top: 0 }, 150 );
				}, function(){
					jQuery( this ).find( '.desc' ).stop().animate( { left: -220, top: -220 }, 150 );
				});
			}
	}
);

//Portfolio navigation action
jQuery( '#portfolio-filterable .portfolio-nav' ).find( 'a' ).click( function() {

	var $this  = jQuery( this ),
	    target = contentClone.find( 'li.' + $this.data('id') );

	$this.parent().addClass( 'active' ).siblings().removeClass( 'active' );

	portfolioContent.quicksand(
		target, {
			adjustHeight : 'dynamic',
			attribute    : 'data-id',
			duration     : 500,
			enhancement  : function(){
					jQuery( '#portfolio-filterable .portfolio-content .desc' ).css( { left: -220, top: -220 } );
					jQuery( '#portfolio-filterable .portfolio-content li' ).hover( function(){
						jQuery( this ).find( '.desc' ).stop().animate( { left: 0, top: 0 }, 150 );
					}, function(){
						jQuery( this ).find( '.desc' ).stop().animate( { left: -220, top: -220 }, 150 );
					});
				}
		}
	);

	return false;

} );

} // /quicksand



} );