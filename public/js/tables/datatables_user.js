/* ------------------------------------------------------------------------------
 *
 *  # Basic datatables
 *
 *  Demo JS code for datatable_basic.html page
 *
 * ---------------------------------------------------------------------------- */

// Setup module
// ------------------------------

var DatatableBasic = (function () {
    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableBasic = function () {
        if (!$().DataTable) {
            console.warn("Warning - datatables.min.js is not loaded.");
            return;
        }

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [
                {
                    orderable: false,
                    width: 100,
                    targets: [],
                },
            ],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: "<span>Filter:</span> _INPUT_",
                searchPlaceholder: "Type to filter...",
                lengthMenu: "<span>Show:</span> _MENU_",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: $("html").attr("dir") == "rtl" ? "&larr;" : "&rarr;",
                    previous:
                        $("html").attr("dir") == "rtl" ? "&rarr;" : "&larr;",
                },
            },
        });

        // Basic datatable
        $(".datatable-basic").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/user",
                type: "GET",
            },
            columns: [
                { data: "id", name: "id" },
                { data: "id_user", name: "id_user" },
                { data: "email", name: "email" },
                {
                    data: "null",
                    render: function (data, type, row) {
                        let html = "";
                        html += `<div class="text-center"> <a href="/admin/edit/${row.id_user}" class="btn btn-xs btn-secondary btn-edit mx-2">Edit</a>`;
                        html += `<a href="#" class="btn btn-xs btn-danger btn-delete mx-2" onClick="deleteButton('/admin/user/delete/${row.id_user}')" id="btn-delete" data-toggle="modal" data-target="#modal_iconified">Delete</a>`;
                        html += `<a href="#" class="btn btn-xs btn-primary btn-detail" onClick="showDetail(${row.id_user})" id="btn-detail" data-toggle="modal" data-target="#modal_detail_user">Detail</a>`;
                        html += "</div>";
                        return html;
                    },
                },
            ],
            order: [[1, "asc"]],
        });

        // Alternative pagination
        $(".datatable-pagination").DataTable({
            pagingType: "simple",
            language: {
                paginate: {
                    next:
                        $("html").attr("dir") == "rtl"
                            ? "Next &larr;"
                            : "Next &rarr;",
                    previous:
                        $("html").attr("dir") == "rtl"
                            ? "&rarr; Prev"
                            : "&larr; Prev",
                },
            },
        });

        // Datatable with saving state
        $(".datatable-save-state").DataTable({
            stateSave: true,
        });

        // Scrollable datatable
        var table = $(".datatable-scroll-y").DataTable({
            autoWidth: true,
            scrollY: 300,
        });

        // Resize scrollable table when sidebar width changes
        $(".sidebar-control").on("click", function () {
            table.columns.adjust().draw();
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function () {
        if (!$().select2) {
            console.warn("Warning - select2.min.js is not loaded.");
            return;
        }

        // Initialize
        $(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: "auto",
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            _componentDatatableBasic();
            _componentSelect2();
        },
    };
})();

// Initialize module
// ------------------------------

document.addEventListener("DOMContentLoaded", function () {
    DatatableBasic.init();
});

function deleteButton(url) {
    $("#modal-delete-user").attr("action", url);
}

function showDetail(id) {
    $.ajax({
        url: "/user/" + id,
        type: "GET",
        dataType: "json",
        cache: true,
        success: function (response) {
            console.log(response.user);
            if (!response.user.data_ktp) {
                $("#modal-nama").val("Empty");
                $("#modal-email").val(response.user.email);
                $("#modal-nik").val(response.user.id_user);
                $("#modal-tempat_lahir").val("Empty");
                $("#modal-tanggal_lahir").val("Empty");
                $("#modal_detail_user").modal("show");
                return;
            }
            $("#modal-nama").val(response.user.data_ktp.nama);
            $("#modal-email").val(response.user.email);
            $("#modal-nik").val(response.user.id_user);
            $("#modal-tempat_lahir").val(response.user.data_ktp.tempat_lahir);
            $("#modal-tanggal_lahir").val(response.user.data_ktp.tanggal_lahir);
            $("#modal_detail_user").modal("show");
        },
        error: function (error) {
            console.log(error);
        },
    });
}
