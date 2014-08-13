$(document).ready(function(){
	$(".options").hide();
	$(".addTask").hide();
	$(".edit").hide();
	$(".headerSlet").hide();
	$(".addHeading").hide();

  $(".newTaskContainer").click(function(){
    $(this).find(".addTask").filter(":hidden").toggle();
	$(this).find(".newTask").filter(":visible").toggle();
  });
  
  $(".task").hover(function(){
    $(this).find(".options").toggle();
  });
  
  $(".task").click(function(){
    $(this).find(".edit").filter(":hidden").toggle();
	$(this).find(".taskContent").filter(":visible").toggle();
  });
  
  $(".task").mouseleave(function(){
    $(this).find(".edit").filter(":visible").toggle();
	$(this).find(".taskContent").filter(":hidden").toggle();
  });
  
  $(".header").hover(function(){
    $(this).find(".headerSlet").toggle();
  });
  
  $(".newHeadingContainer").click(function(){
    $(this).find(".addHeading").filter(":hidden").toggle();
	$(this).find(".newHeading").filter(":visible").toggle();
  });
  
  
  
});

