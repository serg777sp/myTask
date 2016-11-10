$( document ).ready(function(){
    var el = $("a.list-group-item[data-active='"+$('title').text()+"']");
    $('a.list-group-item.active').removeClass('active');
    el.addClass('active');
    
});