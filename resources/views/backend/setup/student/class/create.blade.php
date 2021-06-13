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
                                <h3 class="box-title">Add New Student Classes <h5 class="d-inline text-uppercase">
                                        <small>Form</small>
                                    </h5>
                                </h3>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                    <div class="col">

                                        <form novalidate="" method="POST"
                                            action="{{ route('setup.student.class.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Student Class Name
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required=""
                                                                aria-invalid="false">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-xs-right my-4">
                                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                                <a href="{{ route('setup.student.class.view') }}"
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
