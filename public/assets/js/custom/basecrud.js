class BaseCRUD
{
    static selector;

    static ajaxtable(params)
    {
    /*
        $('[datatable] thead tr').clone(true).appendTo('[datatable] thead');
        $('[datatable] thead tr:eq(1) th').each(function(i)
        {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function()
            {
                if (table.column(i).search() !== this.value)
                {
                    table.column(i).search(this.value).draw();
                }
            });
        });
        */


        params.responsive = true;
        params.orderCellsTo = true;
        params.fixedHeader = true;
        params.select = true;

        params.processing = true;
        params.serverSide = true;
        params.language = {
            url: "/assets/js/datagrid/datatables/tr.json",
            searchPlaceholder: "Arama...",
        };

        if(typeof params.ajax == 'undefined')
        {
            params.ajax = {
                url: params.ajaxURL + (params.ajaxURL.indexOf('?') > 0 ? '&datatable=true' : '?datatable=true') ,
                type: 'POST',
            };
        }

        if(typeof params.order == 'undefined')
            params.order = [[0, 'asc']];

        if(typeof params.drawCallback == 'undefined')
        {
            params.drawCallback = function(settings, json)
            {
                $('[data-toggle="tooltip"]').tooltip();
            }
        }

        var table = $(BaseCRUD.selector).DataTable(params);

        return table;
    }

    static delete(route, callback = null)
    {
        $('.page-inner').on("click", "[row-delete]", function() {
            var unique = $(this).attr('row-delete');

            Swal.fire({
                icon: "error",
                title: "",
                html: "Bu kayıt/lar kalıcı olarak silinecektir.<br>İşlemi onaylıyor musunuz ?",
                showCancelButton: true,
                cancelButtonText: "İptal",
                confirmButtonText: "Sil",
            }).then(function(action){
                if (action.value)
                {
                    $.ajax({
                        url: route,
                        type: "DELETE",
                        data: {
                            _token: $('meta[name="csrf"]').attr('content'),
                            id: unique,
                        },
                        success: function(data) {
                            if(data.status)
                            {
                                if(callback == null)
                                {
                                    $(BaseCRUD.selector).DataTable().ajax.reload();
                                } else {
                                    callback();
                                }
                            } else {
                                Swal.fire('', data.message, "warning");
                            }
                        }
                    });
                }
            });
        });
    }

    static check(route, callback = null)
    {
        $('.page-inner').on("click", "[row-check]", function() {
            var user_id = $(this).attr('row-user-id');
            var gift_id = $(this).attr('row-gift-id');
            var user_point = $(this).attr('row-user-point');
            var gift_name = $(this).attr('row-gift-name');
            var gift_group_name = $(this).attr('row-group-name');
            var user_order = $(this).attr('row-user-order');

            Swal.fire({
                icon: "error",
                title: "",
                html: "Hediye kullanıcıya teslim edilecektir.\n Onaylıyor musunuz?",
                showCancelButton: true,
                cancelButtonText: "İptal",
                confirmButtonText: "Teslim Et",
            }).then(function(action){
                if (action.value)
                {
                    $.ajax({
                        url: route,
                        type: "POST",
                        data: {
                            _token: $('meta[name="csrf"]').attr('content'),
                            user_id: user_id,
                            gift_id: gift_id,
                            user_point: user_point,
                            gift_name: gift_name,
                            gift_group_name: gift_group_name,
                            user_order: user_order,
                        },
                        success: function(data) {
                            if(data.status)
                            {
                                if(callback == null)
                                {
                                    $(BaseCRUD.selector).DataTable().ajax.reload();
                                    Swal.fire('', data.message, "success");
                                } else {
                                    callback();
                                }
                            } else {
                                Swal.fire('', data.message, "warning");
                            }
                        }
                    });
                }
            });
        });
    }
}
