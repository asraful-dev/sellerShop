@extends('layouts.frontend')
@section('content-frontend')
@section('title')
    Agent Pages
@endsection
<style>
    .ps-section--shopping {
        padding: 30px 0;
    }

    .ps-section--shopping .ps-section__header {
        text-align: center;
        padding-bottom: 20px;
    }
</style>
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Agent List</a></li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__right">
                <div class="ps-section--account-setting">
                    <div class="ps-section__header">
                        <h3>Agent List</h3>
                        <img src="{{ asset('upload/management/speak.15.jpg') }}" alt="">
                    </div>
                    <div class="ps-section__content">
                        <div class="table-responsive">
                            <table class="table ps-table ps-table--invoices">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Upazila</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $key => $agent)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>
                                                <img src="{{ asset($agent->profile_photo ?? 'upload/no_image.jpg') }}"
                                                    width="60px" height="50px;" class="img-sm img-avatar"
                                                    alt="No Image">
                                            </td>
                                            <td> {{ $agent->name ?? 'NULL' }} </td>
                                            <td> {{ $agent->email ?? 'NULL' }} </td>
                                            <td> {{ $agent->phone ?? 'NULL' }} </td>
                                            <td> {{ $agent->division->name_en ?? 'NULL' }} </td>
                                            <td> {{ $agent->district->name_en ?? 'NULL' }} </td>
                                            @php
                                                $upazilla = App\Models\Upazila::where('id', $agent->upazilla_id)->first();
                                            @endphp
                                            <td> {{ $upazilla->name_en ?? 'NULL' }} </td>
                                            <td> {{ $agent->address ?? 'NULL' }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
