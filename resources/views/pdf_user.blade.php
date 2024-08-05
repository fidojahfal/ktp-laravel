<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    </div>

                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id User</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$user->id_user}}</td>
                                    <td>{{$user->email}}</td>
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
    <script src="http://ktp.vhost/js/tables/datatables_user.js"></script>

</body>

</html>