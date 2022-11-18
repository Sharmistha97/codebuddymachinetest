@extends('user.layout.admin_main')

@section('title', 'Home')

@section('content')
            <!-- Layout container -->
            <div class="layout-page">
           
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <p>{{Auth::guard('admin')->user()->name}}</p>
                    </div>
                    <!-- / Content -->


                </div>
                <!-- Content wrapper -->
            </div>
@endsection
