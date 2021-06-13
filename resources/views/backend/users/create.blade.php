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
                            <h3 class="box-title">Add New User <h5 class="d-inline text-uppercase">
                                    <small>Form</small></h5>
                            </h3>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                    <form novalidate="" method="POST" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required=""
                                                            aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Email
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            required="" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Password
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="select" required=""
                                                            class="form-control">
                                                            <option value="">Select User Role</option>
                                                            @foreach ($roles as $key=>$role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right my-4">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                            <a href="{{ route('users.view') }}" class="btn btn-rounded btn-dark ml-3">Cancel</a>
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