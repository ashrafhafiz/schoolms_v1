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
                                <h3 class="box-title">Years List</h3>
                                <a href="{{ route('setup.student.year.create') }}"
                                    class="btn btn-rounded btn-info mb-5 float-right"><i class="fa fa-plus mr-1"></i>Add
                                    Year</a>
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($years as $key => $year)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $year->name }}</td>
                                                    <td>{{ $year->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('setup.student.year.edit', $year->id) }}"
                                                            class="btn btn-sm btn-primary btn-rounded"><i
                                                                class="fa fa-edit mr-1"></i>Edit</a>
                                                        <a href="{{ route('setup.student.year.delete', $year->id) }}"
                                                            id="delete-class"
                                                            class="btn btn-sm btn-danger btn-rounded">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            {{-- <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr> --}}
                                        </tfoot>
                                    </table>

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


@section('scripts')
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}">
    </script>
    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', `#delete-class`, function(e) {
                e.preventDefault();
                var link = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                    }
                })
            })
        });

    </script>

@endsection
