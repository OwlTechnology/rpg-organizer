@extends('master.primary')

@section("import")
    <script type="text/javascript" src="{{ url('/js/locations/viewLocation.js') }}"></script>
@endsection

@section("content")
<div class="content">
    <div class="content-body note">
        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id) }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ url("/campaign/" . $campaign->id . "/locations/") }}">Locations</a>
            /
            <span class="breadcrumb">{{ $location->name }}</span>
        </div>

        <h1 class="name">
            {{$location->name}}
        </h1>
        <p>
            {{$location->content}}
        </p>

        <div class="actions">
            <a class="icon-button blue" href="{{ url("/campaign/" . $campaign->id . "/location/" . $location->id . "/edit/") }}">
                <i class="material-icons">edit</i><span class="text">Edit Location</span>
            </a>
            <button class="icon-button red" onclick="toggleDeleteModal(true)">
                <i class="material-icons">delete</i><span class="text">Delete Location</span>
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
