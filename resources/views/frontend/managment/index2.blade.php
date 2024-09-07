@extends('layouts.frontend')
@section('content-frontend')
@section('title')
    Founder Member Pages
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
                <li><a href="#">Founder Member List</a></li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__right">
                <div class="ps-section--account-setting">
                    <div class="ps-section__header">
                        <h3>Founder Member List</h3>
                        <img src="{{ asset('upload/management/founder.jpg') }}" alt="">
                    </div>
                    <div class="ps-section__content">
                        <div class="table-responsive">
                            <table class="table ps-table ps-table--invoices">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Mobile No</th>
                                        <th>Experience</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managments as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>
                                                <img src="{{ asset($item->photo) }}" width="60px" height="50px;"
                                                    class="img-sm img-avatar" alt="No Image">
                                            </td>
                                            <td> {{ $item->name ?? 'NULL' }} </td>
                                            <td> {{ $item->designation ?? 'NULL' }} </td>
                                            <td> {{ $item->number ?? 'NULL' }} </td>
                                            <td> {{ $item->experience ?? 'NULL' }} </td>
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
