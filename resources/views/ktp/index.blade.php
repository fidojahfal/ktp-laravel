@extends("layouts.master")
@section("content")
@include("layouts.navbar")
@include("layouts.header")

<div class="page-content">
    @include("layouts.sidebar")
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Basic datatable</h5>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-beetween">
                        <div class="mr-1">
                            <a href="{{route('data_ktp.download')}}" class="btn btn-danger" style="color:white;">PDF <i
                                    class="icon-file-pdf ml-2"></i></a>
                        </div>
                        <div class="">
                            <a href="{{route('data_ktp.export')}}" class="btn btn-success" style="color:white;">Excel <i
                                    class="icon-file-excel ml-2"></i></a>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('data_ktp.viewAdd')}}" class="btn btn-success" style="color:white;">Add <i
                                    class="icon-file-plus ml-2"></i></a>
                        </div>
                    </div>
                </div>

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>email</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Foto</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modal_iconified" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> &nbsp;Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <h6 class="font-weight-semibold"><i class="icon-trash mr-2"></i> You will delete data!</h6>
                    <p>You can't restore the data after confirm this delete!</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i>
                        Cancel</button>
                    <form method="post" id="modal-delete-ktp" action="">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-danger" id="btn-delete-modal"><i
                                class="icon-checkmark3 font-size-base mr-1"></i>
                            Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_detail_user" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> &nbsp;KTP Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <form>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-lg-9">
                                <input type="text" id="modal-nama" name="nama" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="email" id="modal-email" name="email" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">NIK:</label>
                            <div class="col-lg-9">
                                <input type="number" id="modal-nik" name="nik" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tempat Lahir:</label>
                            <div class="col-lg-9">
                                <input type="text" id="modal-tempat_lahir" name="tempat_lahir" class="form-control"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Tanggal Lahir</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="modal-tanggal_lahir" name="tanggal_lahir" type="date"
                                    name="date" disabled>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("jsDataTable")
<script src="{{asset('js/tables/datatables_ktp.js')}}"></script>
@endsection