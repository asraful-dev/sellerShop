<!DOCTYPE html>
<!-- saved from url=(0057)http://scanthemes.com/demo/HTML/beid/index-dashboard.html -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <!-- CSS -->
    <link href="{{ asset('userpanel/index_files/all.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('userpanel/index_files/beid.css ') }}" rel="stylesheet">
    <link href="{{ asset('userpanel/index_files/main.css ') }}" rel="stylesheet">
    <link href="{{ asset('userpanel/index_files/styles.css ') }}" rel="stylesheet">
    <!-- JQVMAP -->
    <link href="{{ asset('userpanel/index_files/jqvmap.min.css ') }}" rel="stylesheet">
    <!-- dateRangePicker -->
    <link href="{{ asset('userpanel/index_files/daterangepicker.css ') }}" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('userpanel/index_files/img/apple-touch-icon.png ') }}">
    <link rel="icon" href="{{ asset('userpanel/index_files/assets/img/favicon.png ') }}">
    <!-- Fonts -->
    <link href="{{ asset('userpanel/index_files/inter.css ') }}" rel="stylesheet">
    <link href="{{ asset('userpanel/index_files/css ') }}" rel="stylesheet">
    <link href="{{ asset('userpanel/index_files/css(1) ') }}" rel="stylesheet">

    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{ asset('userpanel/datatable/css/datatables.min.css ') }}">

    <!-- Toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css" integrity="sha512-f2MWjotY+JCWDlE0+QAshlykvZUtIm35A6RHwfYZPdxKgLJpL8B+VVxjpHJwZDsZaWdyHVhlIHoblFYGkmrbhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
    <style type="text/css">
        .apexcharts-canvas {
            position: relative;
            user-select: none;
            /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }

        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px;
        }

        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }

        .apexcharts-canvas.dark {
            background: #343F57;
        }

        .apexcharts-inner {
            position: relative;
        }

        .legend-mouseover-inactive {
            transition: 0.15s ease all;
            opacity: 0.20;
        }

        .apexcharts-series-collapsed {
            opacity: 0;
        }

        .apexcharts-gridline,
        .apexcharts-text {
            pointer-events: none;
        }

        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: 0.15s ease all;
        }

        .apexcharts-tooltip.light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, 0.96);
        }

        .apexcharts-tooltip.dark {
            color: #fff;
            background: rgba(30, 30, 30, 0.8);
        }

        .apexcharts-tooltip * {
            font-family: inherit;
        }

        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line {
            pointer-events: none;
        }

        .apexcharts-tooltip.active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .apexcharts-tooltip.light .apexcharts-tooltip-title {
            background: #ECEFF1;
            border-bottom: 1px solid #ddd;
        }

        .apexcharts-tooltip.dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid #333;
        }

        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            font-weight: 600;
            margin-left: 5px;
        }

        .apexcharts-tooltip-text-z-label:empty,
        .apexcharts-tooltip-text-z-value:empty {
            display: none;
        }

        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            font-weight: 600;
        }

        .apexcharts-tooltip-marker {
            width: 12px;
            height: 12px;
            position: relative;
            top: 0px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center;
        }

        .apexcharts-tooltip-series-group.active .apexcharts-tooltip-marker {
            opacity: 1;
        }

        .apexcharts-tooltip-series-group.active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px;
        }

        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important;
        }

        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px;
        }

        .apexcharts-tooltip-candlestick {
            padding: 4px 8px;
        }

        .apexcharts-tooltip-candlestick>div {
            margin: 4px 0;
        }

        .apexcharts-tooltip-candlestick span.value {
            font-weight: bold;
        }

        .apexcharts-tooltip-rangebar {
            padding: 5px 8px;
        }

        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777;
        }

        .apexcharts-tooltip-rangebar .series-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .apexcharts-xaxistooltip {
            opacity: 0;
            padding: 9px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
            transition: 0.15s ease all;
        }

        .apexcharts-xaxistooltip.dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .apexcharts-xaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-left: -6px;
        }

        .apexcharts-xaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-left: -7px;
        }

        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%;
        }

        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%;
        }

        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #ECEFF1;
        }

        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90A4AE;
        }

        .apexcharts-xaxistooltip-bottom.dark:after {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-bottom.dark:before {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-top:after {
            border-top-color: #ECEFF1
        }

        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90A4AE;
        }

        .apexcharts-xaxistooltip-top.dark:after {
            border-top-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-top.dark:before {
            border-top-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip.active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-yaxistooltip {
            opacity: 0;
            padding: 4px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
        }

        .apexcharts-yaxistooltip.dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .apexcharts-yaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-top: -6px;
        }

        .apexcharts-yaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-top: -7px;
        }

        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%;
        }

        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%;
        }

        .apexcharts-yaxistooltip-left:after {
            border-left-color: #ECEFF1;
        }

        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90A4AE;
        }

        .apexcharts-yaxistooltip-left.dark:after {
            border-left-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-left.dark:before {
            border-left-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-right:after {
            border-right-color: #ECEFF1;
        }

        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90A4AE;
        }

        .apexcharts-yaxistooltip-right.dark:after {
            border-right-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-right.dark:before {
            border-right-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip.active {
            opacity: 1;
        }

        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: 0.15s ease all;
        }

        .apexcharts-xcrosshairs.active,
        .apexcharts-ycrosshairs.active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-ycrosshairs-hidden {
            opacity: 0;
        }

        .apexcharts-zoom-rect {
            pointer-events: none;
        }

        .apexcharts-selection-rect {
            cursor: move;
        }

        .svg_select_points,
        .svg_select_points_rot {
            opacity: 0;
            visibility: hidden;
        }

        .svg_select_points_l,
        .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible;
            fill: #888;
        }

        .apexcharts-canvas.zoomable .hovering-zoom {
            cursor: crosshair
        }

        .apexcharts-canvas.zoomable .hovering-pan {
            cursor: move
        }

        .apexcharts-xaxis,
        .apexcharts-yaxis {
            pointer-events: none;
        }

        .apexcharts-zoom-icon,
        .apexcharts-zoom-in-icon,
        .apexcharts-zoom-out-icon,
        .apexcharts-reset-zoom-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6E8192;
            text-align: center;
        }

        .apexcharts-zoom-icon svg,
        .apexcharts-zoom-in-icon svg,
        .apexcharts-zoom-out-icon svg,
        .apexcharts-reset-zoom-icon svg,
        .apexcharts-menu-icon svg {
            fill: #6E8192;
        }

        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(0.76)
        }

        .dark .apexcharts-zoom-icon svg,
        .dark .apexcharts-zoom-in-icon svg,
        .dark .apexcharts-zoom-out-icon svg,
        .dark .apexcharts-reset-zoom-icon svg,
        .dark .apexcharts-pan-icon svg,
        .dark .apexcharts-selection-icon svg,
        .dark .apexcharts-menu-icon svg,
        .dark .apexcharts-toolbar-custom-icon svg {
            fill: #f3f4f5;
        }

        .apexcharts-canvas .apexcharts-zoom-icon.selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.selected svg {
            fill: #008FFB;
        }

        .light .apexcharts-selection-icon:not(.selected):hover svg,
        .light .apexcharts-zoom-icon:not(.selected):hover svg,
        .light .apexcharts-zoom-in-icon:hover svg,
        .light .apexcharts-zoom-out-icon:hover svg,
        .light .apexcharts-reset-zoom-icon:hover svg,
        .light .apexcharts-menu-icon:hover svg {
            fill: #333;
        }

        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
            position: relative;
        }

        .apexcharts-reset-zoom-icon {
            margin-left: 5px;
        }

        .apexcharts-zoom-icon,
        .apexcharts-reset-zoom-icon,
        .apexcharts-menu-icon {
            transform: scale(0.85);
        }

        .apexcharts-zoom-in-icon,
        .apexcharts-zoom-out-icon {
            transform: scale(0.7)
        }

        .apexcharts-zoom-out-icon {
            margin-right: 3px;
        }

        .apexcharts-pan-icon {
            transform: scale(0.62);
            position: relative;
            left: 1px;
            top: 0px;
        }

        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6E8192;
            stroke-width: 2;
        }

        .apexcharts-pan-icon.selected svg {
            stroke: #008FFB;
        }

        .apexcharts-pan-icon:not(.selected):hover svg {
            stroke: #333;
        }

        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            top: 0px;
            right: 3px;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0px 6px 2px 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .apexcharts-toolbar svg {
            pointer-events: none;
        }

        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: 0.15s ease all;
            pointer-events: none;
        }

        .apexcharts-menu.open {
            opacity: 1;
            pointer-events: all;
            transition: 0.15s ease all;
        }

        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer;
        }

        .light .apexcharts-menu-item:hover {
            background: #eee;
        }

        .dark .apexcharts-menu {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
        }

        @media screen and (min-width: 768px) {
            .apexcharts-toolbar {
                /*opacity: 0;*/
            }

            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1;
            }
        }

        .apexcharts-datalabel.hidden {
            opacity: 0;
        }

        .apexcharts-pie-label,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
            cursor: default;
            pointer-events: none;
        }

        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: 0.3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease;
        }

        .apexcharts-canvas .hidden {
            opacity: 0;
        }

        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }

        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
            pointer-events: none;
        }

        /* markers */
        .apexcharts-marker {
            transition: 0.15s ease all;
        }

        @keyframes opaque {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="body">
    <!-- Nav Header  -->
    @include('userpanel.user.body.header')

    <!-- main -->
    <main class="main_css_dashboard">
        <!-- Nav Header  -->
        @include('userpanel.user.body.sidebar')
        <!-- main content -->
        <div class="main-container">
            @yield('user_content')
            <!-- Footer   -->
            @include('userpanel.user.body.footer')
        </div>
    </main>
    <!-- /.main -->
    <!-- offcanvas - search -->
    <div id="offcanvas-search" class="offcanvas h-100 py-8" data-animation="fadeDown" data-scrollbar="offcanvas" tabindex="4" style="overflow: hidden; outline: none;">
        <div class="row">
            <div class="col-sm-1 order-sm-last">
                <button type="button" data-toggle="offcanvas-close" class="close float-right mr-lg-6 text-light o-1 lead-2 fw-100" data-dismiss="offcanvas" aria-label="Close">
                    <span aria-hidden="true" class="icon-close"></span>
                </button>
            </div>
            <form class="col-sm-11 col-lg-10 mx-auto input-line form-inline position-relative w-100 mt-0">
                <div class="input-group bg-none border-0 w-100">
                    <input class="form-control form-control-lg rounded-0 bg-none pl-0 h-auto fs-6 display-md-4 display-xl-2 fw-600" type="text" aria-label="Search" placeholder="Search for...">
                </div>
                <hr class="w-100 o-15 border-white" style="margin-top: -1px;">
                <div class="row gutters-y w-100">
                    <div class="col-lg-3">
                        <h5 class="text-uppercase text-light mb-6"><i class="fas fa-long-arrow-alt-right"></i> Categories</h5>
                        <ul class="list-unstyled pl-4">
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Architecture</strong> (800)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Art &amp; Illustration</strong> (317)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Business &amp; Corporate</strong> (419)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Culture &amp; Education</strong> (672)</a>
                            </li>
                            <li class="mb-0">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>E-Commerce</strong> (272)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="text-uppercase text-light mb-6"><i class="fas fa-long-arrow-alt-right"></i> Tags</h5>
                        <ul class="list-unstyled pl-4">
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>360</strong> (128)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>3D</strong> (42)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Animation</strong> (4105)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Apps</strong> (319)</a>
                            </li>
                            <li class="mb-0">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Apps</strong> (319)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="text-uppercase text-light mb-6"><i class="fas fa-long-arrow-alt-right"></i> Technologies</h5>
                        <ul class="list-unstyled pl-4">
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>AngularJS</strong> (629)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Apache</strong> (241)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Bootstrap</strong> (751)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>CloudFire</strong> (209)</a>
                            </li>
                            <li class="mb-0">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>CloudFire</strong> (107)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="text-uppercase text-light mb-6"><i class="fas fa-long-arrow-alt-right"></i> Countries</h5>
                        <ul class="list-unstyled pl-4">
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>United States</strong> (1605)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>France</strong> (569)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Business &amp; Corporate</strong> (419)</a>
                            </li>
                            <li class="mb-4">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>United Kingdom</strong> (672)</a>
                            </li>
                            <li class="mb-0">
                                <a href="http://scanthemes.com/demo/HTML/beid/index-dashboard.html#" class="tag-item"><strong>Italy</strong> (484)</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.offcanvas - search -->

    <!-- preloader -->
    <div class="preloaderWrapper preloaderOut"></div>
    <!-- jQuery -->
    <script src="{{ asset('userpanel/index_files/jquery.min.js.download ') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('userpanel/index_files/bootstrap.min.js.download ') }}"></script>

    <!-- Bootstrap Min Js -->
    <script src="{{ asset('userpanel/index_files/bootstrap.min.js ') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('userpanel/index_files/Chart.min.js.download ') }}" id="_chartJS_min"></script>
    <script src="{{ asset('userpanel/index_files/Chart.bundle.min.js.download ') }}"></script>
    <script src="{{ asset('userpanel/index_files/chartjs-plugin-annotation.js.download ') }}"></script>
    <script src="{{ asset('userpanel/index_files/chartjs-plugin-labels.js.download ') }}"></script>
    <!-- apexcharts -->
    <script src="{{ asset('userpanel/index_files/apexcharts.min.js.download ') }}"></script>
    <!-- RangeSlider -->
    <script src="{{ asset('userpanel/index_files/rangeslider.min.js.download ') }}" id="_rangeJS_min"></script>
    <!-- Moment -->
    <script src="{{ asset('userpanel/index_files/moment.min.js.download ') }}"></script>
    <!-- JQVMAP -->
    <script src="{{ asset('userpanel/index_files/jquery.vmap.min.js.download ') }}" id="_JQVMAP"></script>
    <script src="{{ asset('userpanel/index_files/jquery.vmap.world.js.download ') }}"></script>
    <!-- dateRangePicker -->
    <script src="{{ asset('userpanel/index_files/daterangepicker.js.download ') }}" id="_DateRangeJS_min"></script>

    <!-- dataTables -->
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <link href="{{ asset('userpanel/index_files/jquery.dataTables.css ') }}" rel="stylesheet">

    <!-- demo -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- /.demo -->

    <!-- User JS -->
    <script src="{{ asset('userpanel/index_files/scripts.js.download ') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('userpanel/index_files/jquery.nicescroll.min.js.download ') }}"></script>
    <script src="{{ asset('userpanel/index_files/owl.carousel.min.js.download ') }}"></script>
    <script src="{{ asset('userpanel/index_files/main.js.download ') }}" id="_mainJS" data-plugins="load"></script>
    <!-- Modules -->
    <script src="{{ asset('userpanel/index_files/modules.js.download ') }}"></script>

    <!-- datatable js -->
    <script src="{{ asset('userpanel/datatable/js/jquery-3.6.0.min.js ') }}"></script>
    <script src="{{ asset('userpanel/datatable/js/datatables.min.js ') }}"></script>
    <script src="{{ asset('userpanel/datatable/js/pdfmake.min.js ') }}"></script>
    <script src="{{ asset('userpanel/datatable/js/vfs_fonts.js ') }}"></script>
    <script src="{{ asset('userpanel/datatable/js/custom.js ') }}"></script>

    @stack('js')
    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- all toastr message show  Update-->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>

    <div class="daterangepicker ltr show-ranges opensleft">
        <div class="ranges">
            <ul>
                <li data-range-key="Today">Today</li>
                <li data-range-key="Yesterday">Yesterday</li>
                <li data-range-key="Last 7 Days">Last 7 Days</li>
                <li data-range-key="Last 30 Days">Last 30 Days</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none;"></div>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>
