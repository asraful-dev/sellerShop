@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Management Edit</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Management Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('management.index') }}" class="btn btn-primary">Management List</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <!-- DataTales Example -->
                <div class="row">
                    <form method="post" action="{{ route('management.update', $management->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10 offset-1">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Management Edit</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="position" name="position"
                                                    id="position">Select Position</label>
                                                <select class="single-select form-control form-select" name="position">
                                                    <option value="" selected disabled>Select Position</option>
                                                    <option value="1"
                                                        {{ $management->position == 1 ? 'selected' : '' }}>
                                                        Managment Member</option>
                                                    <option value="2"
                                                        {{ $management->position == 2 ? 'selected' : '' }}>
                                                        Royal Member</option>
                                                    <option value="3"
                                                        {{ $management->position == 3 ? 'selected' : '' }}>
                                                        Founder Member</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="name" class="form-label">Name</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="name" value="{{ $management->name }}"
                                                    class="form-control border-start-0" id="name"
                                                    placeholder="Enter Name" />
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="designation" class="form-label">Designation</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="designation" class="form-control border-start-0"
                                                    id="designation" value="{{ $management->designation }}"
                                                    placeholder="Enter designation" />
                                            </div>
                                            @error('designation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="number" class="form-label">Mobile No</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="number" name="number" class="form-control border-start-0"
                                                    id="number" value="{{ $management->number }}"
                                                    placeholder="Enter number" />
                                            </div>
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="experience" class="form-label">Experience</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="experience"
                                                    value="{{ $management->experience }}"
                                                    class="form-control border-start-0" id="experience"
                                                    placeholder="Enter experience" />
                                            </div>
                                            @error('experience')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <span class="text-danger">*</span>
                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-2">
                                                    <img id="showImage" class="rounded avatar-lg showImage"
                                                        src="{{ asset($management->photo) }}" alt="No Image" width="100px"
                                                        height="80px;">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control category_image"
                                                        name="photo" id="category_image">
                                                    <label class="input-group-text" for="photo">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <span class="text-danger">*</span>
                                                <select name="status" id="status" class="form-control form-select">
                                                    @if ($management->status == 1)
                                                        <option value="1" selected>Active</option>
                                                        <option value="0">Disable</option>
                                                    @else
                                                        <option value="1">Active</option>
                                                        <option value="0" selected>Disable</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right mt-3">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"
                                                    style="float:right;">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.category_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
