@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body note">
        <div class="breadcrumbs">
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/locations/") }}">
                Back to Campaign
            </a>
        </div>

        <h1 class="name">
            {{$location->name}}
        </h1>
        <p>
            {{$location->content}}
        </p>


    </div>
</div>


@endsection
