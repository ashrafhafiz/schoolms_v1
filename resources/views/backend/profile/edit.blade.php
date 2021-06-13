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
                            <h3 class="box-title">Update Your Info</h3>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                    <form novalidate="" method="POST" action="{{ route('profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name</h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required=""
                                                            aria-invalid="false" value="{{$user->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email</h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            required="" aria-invalid="false" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}
                                        </div>
                                        {{-- /.row --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Mobile</h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control"
                                                            required="" aria-invalid="false" value="{{$user->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Gender</h5>
                                                    <div class="controls">
                                                        <select name="gender" id="select" required=""
                                                            class="form-control">
                                                            <option value="">Select Gender</option>
                                                            <option value="Male"
                                                                {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                                                            </option>
                                                            <option value="Female"
                                                                {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}
                                        </div>
                                        {{-- /.row --}}

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Address</h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control"
                                                            required="" aria-invalid="false" value="{{$user->address}}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md- --}}
                                        </div>
                                        {{-- /.row --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Photo</h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" required=""
                                                            aria-invalid="false" id="image">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" width="100" height="100"
                                                            src="{{ isset($user->profile_photo_path) ? asset('storage/' . $user->profile_photo_path) : asset('storage/profile-photos/no_image.jpg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /.col-md-6 --}}
                                        </div>
                                        {{-- /.row --}}

                                        <div class="text-xs-right my-4">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                            <a href="{{ route('profile.view') }}" class="btn btn-rounded btn-dark ml-3">Cancel</a>
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

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>
@endsection