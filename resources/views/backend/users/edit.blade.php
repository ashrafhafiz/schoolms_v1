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
                            <h3 class="box-title">Update User Info <h5 class="d-inline text-uppercase">
                                    <small>Form</small></h5>
                            </h3>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                    <form novalidate="" method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name</h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required=""
                                                            aria-invalid="false" value="{{$user->name}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Email</h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            required="" aria-invalid="false" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role</h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="select" required=""
                                                            class="form-control">
                                                            <option value="">Select User Role</option>
                                                            @foreach ($roles as $key=>$role)
                                                            <option value="{{ $role->name }}"
                                                                {{ $user->usertype == $role->name ? 'selected' : '' }}>
                                                                {{ $role->name }}</option>
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