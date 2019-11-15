function getCommandes() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (commandes) {
                    var commandeTable = $('#commandeData');
                    commandeTable.empty();
                    var count = 1;
                    $.each(commandes.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCommande(' + value.id + ')">Edit</a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? commandeAction(\'delete\', ' + value.id + ') : false;">Delete</a>' +
                                '</td></tr>';
                        commandeTable.append('<tr><td>' + count + '</td><td>' + value.user_id + '</td><td>' + value.description + editDeleteButtons);
                        count++;
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

/* $('#commandeAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });*/

function commandeAction(type, id) {
    console.log(type);
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var commandeData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        commandeData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        requestType = 'PUT';
        commandeData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(commandeData),
        success: function (msg) {
            if (msg) {
                alert('Commande data has been ' + statusArr[type] + ' successfully.');
                getCommandes();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

/*** à déboguer ... ***/
function editCommande(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#nameEdit').val(data.data.name);
            $('#descriptionEdit').val(data.data.description);
            $('#editForm').slideDown();
        }
    });
}
