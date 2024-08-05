<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="http://ktp.vhost/css/icons/styles.min.css" rel="stylesheet" type="text/css"> -->
    <link href="http://ktp.vhost/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://ktp.vhost/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="http://ktp.vhost/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="http://ktp.vhost/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="http://ktp.vhost/css/colors.min.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Basic datatable</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data_ktp as $ktp)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$ktp->nik}}</td>
                                    <td>{{$ktp->nama}}</td>
                                    <td>{{$ktp->tempat_lahir}}</td>
                                    <td>{{$ktp->tanggal_lahir}}</td>
                                    <td><img src="data:image/png;base64,<?php    echo base64_encode(file_get_contents(base_path('public/photo/' . $ktp->foto))); ?>"
                                            width="50" /></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="http://ktp.vhost/js/app.js"></script>
    <script src="http://ktp.vhost/js/jquery.min.js"></script>
    <script src="http://ktp.vhost/js/bootstrap.bundle.min.js"></script>
    <script src="http://ktp.vhost/js/tables/datatables.min.js"></script>
    <script src="http://ktp.vhost/js/forms/uniform.min.js"></script>
    <script src="http://ktp.vhost/js/forms/form_layouts.js"></script>
    <script src="http://ktp.vhost/js/tables/datatables_ktp.js"></script>

</body>

</html>