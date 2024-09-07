@extends('admin.admin_master')
@section('slider') active @endsection
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Import Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Import Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('product.export') }}" class="btn btn-primary">Download CSV</a>
                </div>
            </div>

        </div>
        <!--end breadcrumb-->
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('product.import.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Import Product</h4>
                        <hr>
                        <div class="row">
                           <div class="col-12">
                                <label for="import_file" class="form-label">CSV file Import: </label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="file" name="import_file" class="form-control border-start-0" id="import_file" placeholder="Enter import product" required />
                                </div>
                                @error('import_file')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           <div class="col-md-12 text-right mt-3">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float:right;">Upload CSV</button>
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
</div>
@endsection
