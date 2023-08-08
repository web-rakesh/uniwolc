

$(".buttonMenuMobile").click(function(){
  $(".dashboardMenuArea").toggleClass("open");
  $(".dashmenuOverlay").toggleClass("open");
  //$('body').toggleClass("open");
  $('body').css('overflow', 'hidden');	
  //$(".dashmenu_close_btn").addClass("open");
});


$(".dashmenuOverlay").click(function(){
  $(".dashboardMenuArea").removeClass("open");  
  $(".dashmenuOverlay").removeClass("open");
  //$(".dashmenu_close_btn").removeClass("open");
  $('body').css('overflow', 'auto');
});	

/*
$(".dashmenu_close_btn").click(function(){
  $(".dashboard_menu_area").removeClass("open");  
  $(".dashmenu_overlay").removeClass("open");  
  $('body').css('overflow', 'auto');
  $(".dashmenu_close_btn").removeClass("open");
});
*/


$(".accordianHeader .toogleBtn").click(function(){
	$(this).parent().parent().toggleClass("open");	  
});

$(".muiIconBtn").click(function(){
	$(".appSidebar").toggleClass("hide");	  
});


/*=============================================*/
/*--------------- [_Accordion] ----------------*/
/*=============================================*/
$(".appDtlsAccordian .appDtlsAccordianItem .toggleBtn").click(function () {
  $(this).parent().parent().parent().toggleClass('active');
  
});

/*
$('.appDtlsAccordian').find('.appDtlsAccordianHeader').on('click', function () { 
  $(this).toggleClass('active');  
  $('.appDtlsAccordianBody').toggleClass('active');
  $('.appDtlsAccordianHeader').not($(this)).removeClass('active');
  $('.appDtlsAccordianBody').not($(this).next()).removeClass('active');
});
*/



$(".readmore-link").click( function(e) {
  // record if our text is expanded
  var isExpanded =  $(e.target).hasClass("expand");
  
  //close all open paragraphs
  $(".req-desc.expand").removeClass("expand");
  $(".readmore-link.expand").removeClass("expand");
  
  // if target wasn't expand, then expand it
  if (!isExpanded){
    $( e.target ).parent().prev().addClass( "expand" );
    $(e.target).addClass("expand");  
  } 
});





$('.programsCardThumnailSlider').owlCarousel({
  nav: true,
  margin: 15,
  autoplay: false,
  loop: true,
  dots: true,
  smartSpeed: 500,
   navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
  /*animateOut: 'fadeOut',
       animateIn: 'fadeIn',*/
  responsive: {
    0: {
      items: 1
    },
    480: {
      items: 1
    },
    600: {
      items: 1
    },
    767: {
      items: 1
    },
    991: {
      items: 1
    },
    1200: {
      items: 1
    },
    1920: {
      items: 1
    }
  }
});


$('.applyHeighLightSlider').owlCarousel({
  nav: false,
  margin: 0,
  autoplay: true,
  loop: true,
  dots: true,
  smartSpeed: 500,
   navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
  /*animateOut: 'fadeOut',
       animateIn: 'fadeIn',*/
  responsive: {
    0: {
      items: 1
    },
    480: {
      items: 1
    },
    600: {
      items: 1
    },
    767: {
      items: 1
    },
    991: {
      items: 1
    },
    1200: {
      items: 1
    },
    1920: {
      items: 1
    }
  }
});

$(document).ready(function () {
    $('#applicationTable').DataTable();
});