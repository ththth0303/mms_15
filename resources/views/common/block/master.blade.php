<!DOCTYPE html>
<html>
    <head>
        @include('common.block.header')
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('common.block.menu')
                @include('common.block.left_bar')
                <!-- content -->
                 <div class="right_col" role="main">
                    @yield('content')
                </div>
            </div>
        </div>
        @section('contentJs')
            {{ Html::script('/bower_components/jquery/dist/jquery.js') }}
            {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
            {{ Html::style('/bower_components/nprogress/nprogress.js') }}
            {{ Html::style('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}
            {{ Html::style('/bower_components/fastclick/lib/fastclick.js') }}
            {{ Html::style('/bower_components/Flot/jquery.flot.js') }}
            {{ Html::style('/bower_components/Flot/jquery.pie.js') }}
            {{ Html::style('/bower_components/Flot/jquery.time.js') }}
            {{ Html::style('/bower_components/Flot/jquery.stack.js') }}
            {{ Html::style('/bower_components/Flot/jquery.resize.js') }}
            {{ Html::style('/bower_components/DateJS/build/date.js') }}
            {{ Html::style('/bower_components/moment/min/moment.min.js') }}
            {{ Html::script('/common/js/common.js') }}
            {{ Html::script('/jquery-colorbox/jquery.colorbox-min.js') }}
            {{ Html::script('/common/js/bootbox.min.js') }}
            {{ Html::script('/js/custom.min.js') }}
        @show
        <!-- end js  -->
        <script type="text/javascript">
            $.ajaxSetup ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
