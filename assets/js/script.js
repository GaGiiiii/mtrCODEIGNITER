// =================================  SIDEBAR ================================= //

$(function(){

  // menu 1

	$('#slide-submenu').on('click',function() {			        
        $(this).closest('.list-group').fadeOut('slide',function(){
        	$('.mini-submenu').fadeIn();	
        });
        
      });

	$('.mini-submenu').on('click',function(){		
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
	});

// menu 2

	$('#slide-submenu2').on('click',function() {			        
        $(this).closest('.list-group').fadeOut('slide',function(){
        	$('.mini-submenu2').fadeIn();	
        });
        
      });

	$('.mini-submenu2').on('click',function(){		
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu2').hide();
	});

  // menu 3

  $('#slide-submenu3').on('click',function() {              
        $(this).closest('.list-group').fadeOut('slide',function(){
          $('.mini-submenu3').fadeIn(); 
        });
        
      });

  $('.mini-submenu3').on('click',function(){    
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu3').hide();
  });

});

// =================================  SIDEBAR ================================= //

// =================================  RESPONSIVE CONTENT IN BODY POST DIV ================================= //

var width = $('.card-text').width();
$('div.content *').css("max-width", width);

$(window).resize(function() {
  var width = $('.card-text').width();
  $('div.content *').css("max-width", width);
});

// =================================  RESPONSIVE CONTENT IN BODY POST DIV ================================= //

// =================================  RESPONSIVE LOGIN FAILED ================================= //

var width2 = $('.col-lg-10').width();
$('#login_failed').css("max-width", width2);

$(window).resize(function() {
  var width2 = $('.col-lg-10').width();
  $('#login_failed').css("max-width", width);
});

// =================================  RESPONSIVE LOGIN FAILED ================================= //

// =================================  DROPDOWN LEVELS ================================= //

$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

// =================================  DROPDOWN LEVELS ================================= //




$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});