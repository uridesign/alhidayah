$(document).ready(function(){
  $('.panelTuningPlus').click(function(){
    var field = $(this).prev();
    field.val( parseFloat(field.val()) + 1 );
  });
  $('.panelTuningMin').click(function(){
    var field = $(this).next();
    field.val( parseFloat(field.val()) - 1 );
  });
});