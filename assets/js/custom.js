jQuery(document).ready(function() {

  let activeTab = $('.myTabs a').filter('.active');

  var parObj = $('.container');
  $('.myTabs a', parObj).click(function(e) {
  	var refObj = $(this).parent().parent();
    e.preventDefault();

    //activeTab.removeClass('active');
    $('.myTabs a', refObj).removeClass('active');
    $(activeTab.attr('href'), refObj).removeClass('active');
    $('.tab-pane', refObj).removeClass('active');


    activeTab = $(this);

    activeTab.addClass("active");
    $(activeTab.attr('href')).addClass('active');
   
  });

});
// JavaScript Document
// JavaScript Document
//owlcarousel call slide