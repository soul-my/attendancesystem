<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
</head>

<body style="background: #ffffff;">
    <h5><strong>SENARAI KEDATANGAN :</strong> {{$event->event_name}} <small class="text-muted">- {{$event->date}}</small></h5>
    <hr>
    <!--Table-->
    <table class="table table-striped table-sm">

        <!--Table head-->
        <thead>
            <tr>
                <th width="35px" class="text-center"><strong>No</strong></th>
                <th width="150px" class="text-center"><strong>IC</strong></th>
                <th><strong>Nama Penjaga</strong></th>
            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>

            @foreach($records as $record)
                <tr>
                    <th scope="row" width="20px" class="text-center">{{$record['index']}}</th>
                    <td width="150px" class="text-center">{{$record['info']->ic_number}}</td>
                    <td>{{$record['info']->name}}</td>
                </tr>
            @endforeach

        </tbody>
        <!--Table body-->

    </table>
    <!--Table-->

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!-- Datatable JavaScript -->
</body>

</html>