@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xl-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Your Profile Info</h3>
                            <a href="{{ route('profile.edit') }}" class="btn btn-rounded btn-info mb-5 float-right"><i class ="fa fa-edit mr-1"></i>Edit Profile</a>
                        </div>

                        <div class="box-body">

                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black">
                                    <h3 class="widget-user-username">{{ $user->name }}</h3>
                                    <h6 class="widget-user-desc">{{ $user->gender }}</h6>
                                    <h6 class="widget-user-desc">{{ $user->address }}</h6>
                                </div>
                                <div class="widget-user-image">
                                    <img class="rounded-circle"
                                        src="{{ isset($user->profile_photo_path) ? asset('storage/' . $user->profile_photo_path) : asset('storage/profile-photos/no_image.jpg') }}"
                                        alt="User Avatar">
                                </div>
                                <div class="box-footer">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header mb-3"><i data-feather="mail"></i></h5>
                                                <span class="widget-user-desc">{{ $user->email }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 br-1 bl-1">
                                            <div class="description-block">
                                                <h5 class="description-header mb-3"><i data-feather="phone"></i></h5>
                                                <span class="description-text">{{ $user->mobile }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header mb-3"><i data-feather="settings"></i></h5>
                                                <span class="widget-user-desc">{{ $user->usertype }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection