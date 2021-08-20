$(document).ready(function(){
  $(".inv").hide();
  
  
  $(".marker-toronto").click(function(){
    $(".inv").hide();
    $(".Toronto-txt").fadeIn(500);
  });
  
    $(".marker-windsor").click(function(){
       $(".inv").hide();
    $(".Windsor-txt").fadeIn(500);
  });
  
    $(".marker-edmonton").click(function(){
       $(".inv").hide();
    $(".Edmonton-txt").fadeIn(500);
  });
    $(".marker-quebec").click(function(){
       $(".inv").hide();
    $(".Quebec-txt").fadeIn(500);
  });
  
    $(".marker-winnipeg").click(function(){
       $(".inv").hide();
    $(".Winnipeg-txt").fadeIn(500);
  });

});