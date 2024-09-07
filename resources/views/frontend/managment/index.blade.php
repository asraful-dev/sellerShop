@extends('layouts.frontend')
@section('content-frontend')
@section('title')
    Management Member Pages
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
                <li><a href="#">Management Member List</a></li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__right">
                <div class="ps-section--account-setting">
                    <div class="ps-section__header">
                        <h3>Management Member List</h3>
                        <img src="{{ asset('upload/management/speak1.04.16.jpg') }}" alt="">
                    </div>
                    <div class="row align-content-lg-stretch">
                        @foreach ($managments as $key => $item)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mt-5">
                                <div class="card" style="width: 33rem;">
                                    <img class="card-img-top" src="{{ asset($item->photo) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h3 class="card-title text-info font-weight-bolder">Name:
                                            {{ $item->name ?? 'NULL' }}</h3>
                                        <h5 class="card-text">Designation: {{ $item->designation ?? 'NULL' }}</h5>
                                        <h5 class="card-text">Number: {{ $item->number ?? 'NULL' }}</h5>
                                        <h5 class="card-text">Experience: {{ $item->experience ?? 'NULL' }}</h5>
                                    </div>
                                </div>
                                {{-- <div class="ps-block--category-2" data-mh="categories" style="height: 191.594px;">
                                    <div class="ps-block__thumbnail">
                                        <img src="{{ asset($item->photo) }}" width="100" height="90"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="ps-block__content">
                                        <h4>Name:{{ $item->name ?? 'NULL' }}</h4>
                                        <ul>
                                            <li><a href="#">Designation:{{ $item->designation ?? 'NULL' }}</a>
                                            </li>
                                            <li><a href="#">Number:{{ $item->number ?? 'NULL' }}</a></li>
                                            <li><a href="#">Experience:{{ $item->experience ?? 'NULL' }}</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
