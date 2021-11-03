/** Select 2 **/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$("#selAddress").select2({
    placeholder: "Select Location",
    ajax: {
        url: "/emp/select2/addresses",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                _token: CSRF_TOKEN,
                search: params.term // search term
            };
        },
        processResults: function (response) {
            return {
                results: response
            };
        },
        cache: true
    }
});

$("#selPermissions").select2({
    placeholder: "Select Permission",
    ajax: {
        url: "/emp/select2/permissions",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                _token: CSRF_TOKEN,
                search: params.term // search term
            };
        },
        processResults: function (response) {
            return {
                results: response
            };
        },
        cache: true
    }
});