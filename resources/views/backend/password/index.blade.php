@extends('admin.admin_master')

@section('content')

    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Change Your Password <h5 class="d-inline text-uppercase">
                                        <small>Form</small>
                                    </h5>
                                </h3>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                    <div class="col">

                                        <form novalidate="" method="POST" action="{{ route('profile.password.update') }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h5>Current Password</h5>
                                                    <div class="controls">
                                                        <input type="password" id="current_password" name="current_password"
                                                            class="form-control" aria-invalid="false">
                                                    </div>
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h5>New Password</h5>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password"
                                                            class="form-control" aria-invalid="false">
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h5>Confirm New Password</h5>
                                                    <div class="controls">
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control"
                                                            aria-invalid="false">
                                                    </div>
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="text-xs-right my-4">
                                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                                <a href="{{ route('profile.view') }}"
                                                    class="btn btn-rounded btn-dark ml-3">Cancel</a>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.col -->
                                </div>
                                {{-- /.row --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
