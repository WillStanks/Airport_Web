$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#kraj-region-id').on('change', function () {
        var krajRegionId = $(this).val();
        if (krajRegionId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'kraj_region_id=' + krajRegionId,
                success: function (okresCounties) {
                    $select = $('#okres-county-id');
                    $select.find('option').remove();
                    $.each(okresCounties, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.nazev + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#okres-county-id').html('<option value="">Select KrajRegion first</option>');
        }
    });
});


