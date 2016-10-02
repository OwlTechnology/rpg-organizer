@extends('master.primary')

@section("import")
    <script type="text/javascript" src="{{ url('/js/locations/viewLocation.js') }}"></script>
@endsection

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
            <button onclick="toggleDeleteModal(true)">
                Delete Location
            </button>
        </div>

    </div>
</div>

<div class="modal-wrapper" id="delete-modal">
    <div class="modal">
        <p>
            Are you sure you want to delete {{$location->name}}?
        </p>
        <div class="actions">
            <a class="button" href="{{ url("/campaign/" . $campaign->id . "/location/" . $location->id . "/delete/") }}">
                Yes
            </a>
            <button class="button" onclick="toggleDeleteModal(false)">
                No
            </button>
        </div>
    </div>
</div>


@endsection
