(function ($){
    // Get the path to action from CakePHP
    var autoCompleteSource = urlToAutocompleteAction;
    $('#autocompleteDep').autocomplete({
        source: autoCompleteSource,
        minLength: 1,
        select: function( event, ui ) {
            $("#depCity-id").val(ui.item.value);
            $("#autocompleteDep").val(ui.item.label);
            return false;
        }
    });
    $('#autocompleteDest').autocomplete({
        source: autoCompleteSource,
        minLength: 1,
        select: function( event, ui ) {
            $("#destCity-id").val(ui.item.value);
            $("#autocompleteDest").val(ui.item.label);
            return false;
        }
    });
}) (jQuery);