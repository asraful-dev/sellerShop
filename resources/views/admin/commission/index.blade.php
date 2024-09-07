@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Commission Information</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Commission Information</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
               
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('commission.update',$commission->id) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Create a New Commission</h4>
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <label for="refer1" class="form-label">Refer 1:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer1" value="{{ $commission->refer1 }}" class="form-control border-start-0" id="refer1" placeholder="Refer 1" />
                            </div>
                            @error('refer1')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer2" class="form-label">Refer 2:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer2" value="{{ $commission->refer2 }}" class="form-control border-start-0" id="refer2" placeholder="Refer 2" />
                            </div>
                            @error('refer2')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer3" class="form-label">Refer 3:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer3" value="{{ $commission->refer3 }}" class="form-control border-start-0" id="refer1" placeholder="Refer 3" />
                            </div>
                            @error('refer3')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer4" class="form-label">Refer 4:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer4" value="{{ $commission->refer4 }}" class="form-control border-start-0" id="refer4" placeholder="Refer 4" />
                            </div>
                            @error('refer4')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer5" class="form-label">Refer 5:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer5" value="{{ $commission->refer5 }}" class="form-control border-start-0" id="refer1" placeholder="Refer 5" />
                            </div>
                            @error('refer5')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer6" class="form-label">Refer 6:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer6" value="{{ $commission->refer6 }}" class="form-control border-start-0" id="refer6" placeholder="Refer 6" />
                            </div>
                            @error('refer6')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer7" class="form-label">Refer 7:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer7" value="{{ $commission->refer7 }}" class="form-control border-start-0" id="refer7" placeholder="Refer 7" />
                            </div>
                            @error('refer7')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer8" class="form-label">Refer 8:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer8" value="{{ $commission->refer8 }}" class="form-control border-start-0" id="refer8" placeholder="Refer 8" />
                            </div>
                            @error('refer8')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer9" class="form-label">Refer 9:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer9" value="{{ $commission->refer9 }}" class="form-control border-start-0" id="refer9" placeholder="Refer 9" />
                            </div>
                            @error('refer9')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer10" class="form-label">Refer 10:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer10" value="{{ $commission->refer10 }}" class="form-control border-start-0" id="refer10" placeholder="Refer 10" />
                            </div>
                            @error('refer10')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer11" class="form-label">Refer 11:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer11" value="{{ $commission->refer11 }}" class="form-control border-start-0" id="refer11" placeholder="Refer 11" />
                            </div>
                            @error('refer11')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer12" class="form-label">Refer 12:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer12" value="{{ $commission->refer12 }}" class="form-control border-start-0" id="refer12" placeholder="Refer 12" />
                            </div>
                            @error('refer12')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer13" class="form-label">Refer 13:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer13" value="{{ $commission->refer13 }}" class="form-control border-start-0" id="refer13" placeholder="Refer 13" />
                            </div>
                            @error('refer13')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer14" class="form-label">Refer 14:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer14" value="{{ $commission->refer14 }}" class="form-control border-start-0" id="refer14" placeholder="Refer 14" />
                            </div>
                            @error('refer14')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer15" class="form-label">Refer 15:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer15" value="{{ $commission->refer15 }}" class="form-control border-start-0" id="refer15" placeholder="Refer 15" />
                            </div>
                            @error('refer15')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer16" class="form-label">Refer 16:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer16" value="{{ $commission->refer16 }}" class="form-control border-start-0" id="refer16" placeholder="Refer 16" />
                            </div>
                            @error('refer16')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer17" class="form-label">Refer 17:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer17" value="{{ $commission->refer17 }}" class="form-control border-start-0" id="refer17" placeholder="Refer 17" />
                            </div>
                            @error('refer17')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer18" class="form-label">Refer 18:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer18" value="{{ $commission->refer18 }}" class="form-control border-start-0" id="refer18" placeholder="Refer 18" />
                            </div>
                            @error('refer18')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer19" class="form-label">Refer 19:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer19" value="{{ $commission->refer19 }}" class="form-control border-start-0" id="refer19" placeholder="Refer 19" />
                            </div>
                            @error('refer19')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-12">
                            <label for="refer20" class="form-label">Refer 20:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="refer20" value="{{ $commission->refer20 }}" class="form-control border-start-0" id="refer20" placeholder="Refer 20" />
                            </div>
                            @error('refer20')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                           <div class="col-md-12 text-right mt-3">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float:right;">Submit</button>
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
@endsection
