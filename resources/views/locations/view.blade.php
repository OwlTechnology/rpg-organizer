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

        <div class="actions">
            <a href="{{ url("/campaign/" . $campaign->id . "/location/" . $location->id . "/edit/") }}">
                Edit Location
            </a>
        </div>

    </div>
</div>


@endsection
