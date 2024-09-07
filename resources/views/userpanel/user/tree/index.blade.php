@extends('layouts.userpanel')
@section('user_content')
    @include('userpanel.user.tree.style')

    <!-- Transparent -->
    <div class="overflow-hidden">
        <div id="dashboard">
            <div class="container-fluid p-0">
                <div class="row panel-top-line">
                    <div class="col">
                        <div class="py-7">
                            <!-- dataTables.js -->
                            <div class="mb-7">
                                <h4 class="hr-text-left mb-6">My Tree</h4>
                                <div class="px-4 px-md-6 mb-6">
                                    <div class="alert alert-no-bg alert-theme bg-light_A-5 d-flex justify-content-between" role="alert">
                                        <p class="mb-0"><code>My Tree List</code></p>
                                        <a href="{{ route('user.tree') }}" class="btn btn-sm btn-success">GoTo Main Parent</a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 px-md-6">
                                <div class="d-flex mb-30 flex-wrap gap-3 justify-content-between align-items-center">
                                    <h6 class="page-title">My Tree</h6>
                                    <div class="d-flex flex-wrap justify-content-end gap-2 align-items-center breadcrumb-plugins">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="tree">
                                        <ul id="user-tree" class="d-flex justify-content-center">
                                            {!! $user->renderTree() !!}
                                        </ul>

                                    </div>
                                </div>
                                <div class="modal fade user-details-modal-area" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">User Details</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="user-details-modal">
                                                    <div class="user-details-header ">
                                                        <div class="thumb">
                                                            <img src="#" alt="*" class="tree_image w-h-100-p">
                                                        </div>
                                                        <div class="content">
                                                            <a class="user-name tree_url tree_name" href=""></a>
                                                            <span class="user-status tree_status"></span>
                                                            <span class="user-status tree_plan"></span>
                                                        </div>
                                                    </div>
                                                    <div class="user-details-body text-center">
                                                        <h6 class="my-3">Referred By: <span class="tree_ref"></span></h6>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>LEFT</th>
                                                                <th>RIGHT</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Current BV</td>
                                                                <td><span class="lbv"></span></td>
                                                                <td><span class="rbv"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Free Member</td>
                                                                <td><span class="lfree"></span></td>
                                                                <td><span class="rfree"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paid Member</td>
                                                                <td><span class="lpaid"></span></td>
                                                                <td><span class="rpaid"></span></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
