$(function() {
    
    $('ul #navbar').mouseover(function(){
        $(this).css({"color": "grey"});
    });
    $('ul #navbar').mouseleave(function(){
        $(this).css({"color": "white"});
    });
    
    
    $('.content').mouseenter(function(){
        $(this).css({"background": "#bfbfbf"});
    });
    $('.content img').mouseenter(function(){
        $(this).css({"height":"155px", "width":"155px"});
    });
    
    
    $('.content').mouseleave(function(){
        $(this).css({"background":"white"});
    });
    $('.content img').mouseleave(function(){
        $(this).css({"height":"150px", "width":"150px"});
    });
    
    
});
