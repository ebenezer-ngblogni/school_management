<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : '' }} - School</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon.png')}}">
    <link rel="stylesheet" href="{{ url('vendor/jqvmap/css/jqvmap.min.css')}}">
	<link rel="stylesheet" href="{{ url('vendor/chartist/css/chartist.min.css')}}">
	<link rel="stylesheet" href="{{ url('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
	<link rel="stylesheet" href="{{ url('css/skin-2.css')}}">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    @include('layouts.header')

        <div class="content-body">

            @yield('content')

        </div>



    @include('layouts.footer')


		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->



    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<script src="{{ url('vendor/global/global.min.js') }}"></script>
    @if($header_title == 'Dashboard')
        <script src="{{ url('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    @endif

    <script src="{{ url('js/custom.min.js') }}"></script>
	<script src="{{ url('js/dlabnav-init.js') }}"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ url('vendor/chart.js/Chart.bundle.min.js') }}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{ url('vendor/peity/jquery.peity.min.js') }}"></script>

	<!-- Chart sparkline plugin files -->
    <script src="{{ url('vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- Demo scripts -->
    <script src="{{ url('js/dashboard/dashboard-3.js') }}"></script>

    <script type="text/javascript">
        const matiere = [];
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_timetable/get_subject') }}",
                type: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    class_id:class_id,
                },
                dataType:"json",
                success:function(response){
                    console.log(response.html)
                    $('.getSubject').html(response.html);
                },
            });

        });
    </script>

</body>
</html>
