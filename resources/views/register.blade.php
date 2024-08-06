@extends("layouts.master")
@section("content")

<div class="page-content">
    <div class="content">

        <!-- Horizontal form options -->
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10 offset-6  ">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                @if(!\Auth::user()->role)
                                    <h5 class="card-title">Register Page</h5>
                                @else
                                    <h5 class="card-title">Add Data Page</h5>
                                @endif
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST"
                                    action="{{count(explode("/", \Route::getCurrentRoute()->uri())) > 1 ? route("data_ktp.add") : route("user.register")}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Enter your name!" required>
                                            @if($errors->has('nama'))
                                                <span>{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email:</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter your email!" required>
                                            @if($errors->has('enail'))
                                                <span>{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">NIK:</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="nik" class="form-control"
                                                placeholder="Enter your NIK!" required>
                                            @if($errors->has('nik'))
                                                <span>{{ $errors->first('nik') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tempat Lahir:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                placeholder="Enter your place of birth!" required>
                                            @if($errors->has('tempat_lahir'))
                                                <span>{{ $errors->first('tempat_lahir') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Tanggal Lahir</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="tanggal_lahir" type="date" name="date"
                                                required>
                                            @if($errors->has('tanggal_lahir'))
                                                <span>{{ $errors->first('tanggal_lahir') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Password:</label>
                                        <div class="col-lg-9">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Your strong password" required>
                                            @if($errors->has('password'))
                                                <span>{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Repeat password:</label>
                                        <div class="col-lg-9">
                                            <input type="password" class="form-control" placeholder="Repeat password"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Photo:</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="photo" class="form-input-styled" required>
                                            @if($errors->has('photo'))
                                                <span>{{ $errors->first('photo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if(!\Auth::user()->role)
                                            <div class="col-6 text-left">
                                                <a href="/login" type="submit" class="btn btn-secondary"><i
                                                        class="icon-undo ml-2"></i> Login</a>
                                            </div>
                                            <div class="col-6 text-right"><button type="submit"
                                                    class="btn btn-warning">Register <i
                                                        class="icon-enter ml-2"></i></button></div>
                                        @else
                                            <div class="col-12 text-right"><button type="submit" class="btn btn-success">Add
                                                    <i class="icon-add ml-2"></i></button></div>
                                        @endif

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection