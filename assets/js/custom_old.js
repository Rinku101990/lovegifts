jQuery(document).ready(function() {

  let activeTab = $('#myTabs a').filter('.active');

  $('#myTabs a').click(function(e) {
    e.preventDefault();

    activeTab.removeClass('active');
    $(activeTab.attr('href')).removeClass('active');


    activeTab = $(this);

    activeTab.addClass("active");
    $(activeTab.attr('href')).addClass('active');
   
  });
});
// JavaScript Document

// JavaScript Document
 

//owlcarousel call slide


/*

dependencies:

//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js
//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js
//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js

*/

