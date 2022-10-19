
// Update the Countries data list
function getCountries() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var countrieTable = $('#countriesData');
                    countrieTable.empty();
                    $.each(data.countries, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalCountryAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'countryAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                                countrieTable.append('<tr><td>' + value.id + '</td><td>' + value.country + '</td><td>' + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function countryAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var countryData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalCountryAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        countryData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        countryData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(countryData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Country data has been ' + statusArr[type] + ' successfully.</p>');
                getCountries();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the country's data in the edit form
function editCountry(id) {
    $.ajax({
        type: 'POST',
        url: 'CountryAction.php',
        dataType: 'JSON',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.id);
            $('#country').val(data.country);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalCountryAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var countryFunc = "countryAction('add');";
        $('.modal-title').html('Add new country');
        if (type == 'edit') {
            countryFunc = "countryAction('edit');";
            $('.modal-title').html('Edit country');
            var rowId = $(e.relatedTarget).attr('rowID');
            editCountry(rowId);
        }
        $('#countrySubmit').attr("onclick", countryFunc);
    });

    $('#modalCountryAddEdit').on('hidden.bs.modal', function () {
        $('#countrySubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



