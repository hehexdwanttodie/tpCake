$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter
    $('#store-id').on('change', function () {
        var storeId = $(this).val();
        if (storeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'store_id=' + storeId,
                success: function (locations) {
                    $select = $('#location-id');
                    $select.find('option').remove();
                    $.each(locations, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {

                            $select.append('<option value=' + childValue.id + '>' + childValue.adress + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#location-id').html('<option value="">Select Store first</option>');
        }
    });
});


