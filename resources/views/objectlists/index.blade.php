@extends('layouts.master')

@section('page-breadcrumb')
    @include('shared.nav.breadcrumb')
@endsection

@section('page-level-styles')
    <link href="/theme/layouts/pages/css/profile.min.css" rel="stylesheet"
          type="text/css">
@endsection

@section('page-level-styles')
    <link href="/theme/layouts/pages/css/search.min.css"
          rel="stylesheet"
          type="text/css"/>
@endsection

@section('page-header')
    <div class="container">
        <div class="page-title">
            <h1>Objektlisten</h1>
        </div>
    </div>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-12">

            @include('shared.flashmessage')

            <div class="profile-sidebar">
                @include('partials/objects_sidebar')
            </div>


            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <objectlist-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts-foot')
    <script type="text/javascript" src="/js/vue.js"></script>
@endpush

