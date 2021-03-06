@include('admin.block.header')
    <div class="container-fluid">
        <!-- menu -->
        @include('admin.block.menu')
        <!-- end menu -->
        <div class="container">
            <!-- container -->
            <div class="row">
                <!-- leftbar -->
                <div class="col-md-3">
                    @include('admin.block.left_bar')
                </div>
                <!-- end left bar -->
                <!-- content -->
                <div class="col-md-9 content-right">
                    @yield('content')
                </div>
                <!-- end contain -->
            </div>
        <!-- encontainer -->
        </div>
    </div>
    @section('contentJs')
        {{ Html::script('/bower_components/jquery/dist/jquery.js') }}
        {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('/common/js/common.js') }}
    @show
    <!-- end js  -->
@include('admin.block.footer')
