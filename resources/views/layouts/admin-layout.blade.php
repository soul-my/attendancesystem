<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("title")</title>
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- Your custom styles (optional) -->
    <style>
        .night-mode{
            background-color: #2E2E2E;
        }
    </style>
    @yield("styles")
</head>

<body class="fixed-sn black-skin night-mode">

    <!--Main Navigation-->
    <header>
        @yield("sidebar")

        @yield("navbar")

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main>


            @yield('content')

            <div style="height: 5px"></div>

    </main>
    <!--Main layout-->

    @yield("footer")

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!-- Datatable JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!--Initializations-->
    @yield("scripts")

    <script>


        $(function(){
             // SideNav Initialization
            $(".button-collapse").sideNav();

            var container = document.querySelector('.custom-scrollbar');
            Ps.initialize(container, {
                wheelSpeed: 2,
                wheelPropagation: true,
                minScrollbarLength: 20
            });

            // Data Picker Initialization
            $('.datepicker').pickadate();

            // Material Select Initialization
            $('.mdb-select').material_select();

            $('[data-toggle="tooltip"]').tooltip();

            //method for logout
            $("#logout-btn").on("click", function(event){
                event.preventDefault();
                $("#logout-form").submit();
            });

        });



    </script>

</body>

</html>