$(function() {


$( "#sortable1, #sortable2" ).sortable({
    connectWith: ".connectedSortable",
     start: function(event,ui){
    ui.helper.data('from-id',  $(this).parent().attr('id') )
    },
  stop: function(event, ui){

        $("#sortable1").find("li").each(function(){

            index = parseInt($(this).index()+1);

            $(this).find(".count").text(index);
        });
    },
  update: function()
    {

        var order = $(this).sortable("serialize")+'&action=updateListeOrder';
       
        $.post("../Categories/updateList", order, function(theResponse)
        {

            $(".reponse").html(theResponse).fadeIn("fast");
            setTimeout(function()
            {
                $(".reponse").fadeOut("slow");
            }, 2000);
        });
    }

   
}).disableSelection();



 $( "#droppable" ).droppable({
    activeClass: "ui-state-highlight",
    drop: function( event, ui ) {
 
     
    var id = '&id='+ui.draggable.data("elementid");
    

    $.post("../Categories/ajax_delete", id, function(theResponse)
    {
          
             $('#content').empty();
            $("#content").html(theResponse).fadeIn("fast");
            setTimeout(function()
            {
                $(".reponse").fadeOut("slow");
            }, 2000);
     });
       
    }
    
    
});

$( "#add-form").on("submit",function(e) {

    e.preventDefault();
    var name = $(this).serialize();

   $.post("../Categories/ajax_add", name, function(theResponse)
    {
            $('#content').empty();
            $("#content").html(theResponse).fadeIn("fast");

            setTimeout(function()
            {
                $(".reponse").fadeOut("slow");
            }, 2000);
     });
    
        return false;
});





});