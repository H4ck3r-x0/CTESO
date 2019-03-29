@extends('layouts.master')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">Search Flights</div>
                <div class="card-body">
                    {{-- Including the search from --}}
                    @include('search.searchForm')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
