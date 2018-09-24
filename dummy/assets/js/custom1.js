// JavaScript Document
 jQuery(document).ready(function() {
   var activeTab = $('#myTabs1 a').filter('.active');

  $('#myTabs1 a').click(function(e) {
    e.preventDefault();

    activeTab.removeClass('active');
    $(activeTab.attr('href')).removeClass('active');


    activeTab = $(this);

    activeTab.addClass("active");
    $(activeTab.attr('href')).addClass('active');
  });
});