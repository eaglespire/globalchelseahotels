$('#datepicker').datepicker({
    onSelect: function(dateText, inst) {
      $("input[name='something']").val(dateText);
    }
});