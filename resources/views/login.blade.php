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
                                <h5 class="card-title">Login Page</h5>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route("user.login")}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email:</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter your email!">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Password:</label>
                                        <div class="col-lg-9">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Your strong password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a href="/register" type="submit" class="btn btn-secondary"><i
                                                    class="icon-undo ml-2"></i> Register</a>
                                        </div>
                                        <div class="col-6 text-right"><button type="submit"
                                                class="btn btn-success">Login <i class="icon-enter ml-2"></i></button>
                                        </div>
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