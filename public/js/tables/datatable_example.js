var DatatableBasic = function() {

    // Basic Datatable examples
    var _componentDatatableBasic = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 200,
                targets: [ 5 ]
            },{
                orderable: false,
                targets: [2, 3],
                className: 'dt-body-right'
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
        $.fn.dataTable.ext.errMode = 'none';

        let datas = [
            {data:'DT_RowIndex', name:'no'},
            {data: 'tanggal', render:function(data, type, row){
                return formatIndoDate(data)
            }},
            {data: 'nominal', render:function(data, type, row){
                if(data>0){
                    return data.toLocaleString('id-ID', {maximumFractionDigits: 2})
                } else {
                    return "0"
                }
            }},
            {data: 'nominal_verif', render:function(data, type, row){
                if(data>0){
                    return data.toLocaleString('id-ID', {maximumFractionDigits: 2})
                } else {
                    return "0"
                }
            }},
            {data: 'stat.nama'},
            // {data: 'dana_sisa', render:function(data, type, row){
            // 	if(data>0){
            //     	return data.toLocaleString('en-US', {maximumFractionDigits: 2})
            // 	} else {
            // 		return "0"
            // 	}
            // }},
            //{data:null, render:function(data, type, row){
            //    return data.roles.name actualNumber.toLocaleString('en-US', {maximumFractionDigits: 2})
            //}},
            {data:null, render:function(data, type, row){
                let html = '';
                html += `<div style="text-align:center">`
                if(data.status!=2){
                    @if(Auth::user()->role_id==1)
                        html +=    `<a href="{{ url('pengeluarans/${data.id}')}}"><button type="button" class="btn btn-warning btn-icon"><i class="icon-file-eye" title="Verifikasi"></i></button></a> &nbsp;`
                    @endif
                    html +=    `<a href="{{ url('pengeluarans/${data.id}/edit')}}"><button type="button" class="btn btn-primary btn-icon"><i class="icon-pencil7" title="Ubah data"></i></button></a> &nbsp;`
                    html +=    `<a class="delbutton" data-toggle="modal" data-target="#modal_theme_danger" data-uri="{{ url('pengeluarans/${data.id}') }}"><button type="button" class="btn btn-danger btn-icon"><i class="icon-x" title="Delete"></i></button></a> &nbsp;`
                }
                html += `</div>`;
                return html
            }}
        ];

        // Basic datatable
        $('.datatable-basic').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: "{{url('/pengeluarans-datatable')}}",
                    type: "GET",
                },
            columns: datas,
            "order": [[ 1, "desc" ]],
        });

        // Alternative pagination
        $('.datatable-pagination').DataTable({
            pagingType: "simple",
            language: {
                paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
            }
        });

        // Datatable with saving state
        $('.datatable-save-state').DataTable({
            stateSave: true
        });

        // Scrollable datatable
        var table = $('.datatable-scroll-y').DataTable({
            autoWidth: true,
            scrollY: 300
        });

        // Resize scrollable table when sidebar width changes
        $('.sidebar-control').on('click', function() {
            table.columns.adjust().draw();
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableBasic();
            _componentSelect2();
        }
    }
}();

// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});