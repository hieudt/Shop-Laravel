 $( "#resizable-grid" ).sortable({
   placeholder: "ui-state-highlight"
 });
 var drag_item =  $( "#resizable-grid .drag-item" );

 $( drag_item ).append('<div class="dismiss">x</div>');
 $( drag_item ).find(".dismiss").on("click" , function(){
  $(this).parent().hide();
 });
