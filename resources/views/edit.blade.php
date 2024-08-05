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
                                <h5 class="card-title">Register Page</h5>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route("user.edit", $user->data_ktp->nik)}}"
                                    enctype="multipart/form-data">
                                    @method("put")
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="nama" class="form-control"
                                                value="{{$user->data_ktp->nama}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email:</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="email" class="form-control"
                                                value="{{$user->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">NIK:</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="nik" class="form-control" value="{{$user->data_ktp->nik}}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tempat Lahir:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                value="{{$user->data_ktp->tempat_lahir}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Tanggal Lahir</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="tanggal_lahir" type="date" name="date"
                                                value="{{$user->data_ktp->tanggal_lahir}}">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Your state:</label>
                                        <div class="col-lg-9">
                                            <select class="form-control form-control-select2" data-fouc>
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="KY">Kentucky</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Gender:</label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" name="gender" checked
                                                        data-fouc>
                                                    Male
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" name="gender"
                                                        data-fouc>
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Your avatar:</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-input-styled" data-fouc>
                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file
                                                size
                                                2Mb</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tags:</label>
                                        <div class="col-lg-9">
                                            <select multiple="multiple" data-placeholder="Enter tags"
                                                class="form-control form-control-select2-icons" data-fouc>
                                                <optgroup label="Services">
                                                    <option value="wordpress2" data-icon="wordpress2">Wordpress</option>
                                                    <option value="tumblr2" data-icon="tumblr2">Tumblr</option>
                                                    <option value="stumbleupon" data-icon="stumbleupon">Stumble upon
                                                    </option>
                                                    <option value="pinterest2" data-icon="pinterest2">Pinterest</option>
                                                    <option value="lastfm2" data-icon="lastfm2">Lastfm</option>
                                                </optgroup>
                                                <optgroup label="File types">
                                                    <option value="pdf" data-icon="file-pdf">PDF</option>
                                                    <option value="word" data-icon="file-word">Word</option>
                                                    <option value="excel" data-icon="file-excel">Excel</option>
                                                    <option value="openoffice" data-icon="file-openoffice">Open office
                                                    </option>
                                                </optgroup>
                                                <optgroup label="Browsers">
                                                    <option value="chrome" data-icon="chrome" selected>Chrome</option>
                                                    <option value="firefox" data-icon="firefox" selected>Firefox
                                                    </option>
                                                    <option value="safari" data-icon="safari">Safari</option>
                                                    <option value="opera" data-icon="opera">Opera</option>
                                                    <option value="IE" data-icon="IE">IE</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Your message:</label>
                                        <div class="col-lg-9">
                                            <textarea rows="5" cols="5" class="form-control"
                                                placeholder="Enter your message here"></textarea>
                                        </div>
                                    </div> -->

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update <i
                                                class="icon-enter ml-2"></i></button>
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