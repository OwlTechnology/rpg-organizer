@extends('master.primary')

@section("import")
    <script type="text/javascript" src="{{ url('/js/locations/viewLocation.js') }}"></script>
@endsection

@section("content")
<div class="content">
    <div class="content-body note">
        <div class="breadcrumbs spaced">
            /
            <a class="breadcrumb" href="{{ route('campaign::view', $campaign->id) }}">{{ $campaign->name }}</a>
            /
            <a class="breadcrumb" href="{{ route('campaign::locations::list', $campaign->id) }}">Locations</a>
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
            <a class="icon-button blue" href="{{ route('campaign::locations::edit', [$campaign->id, $location->id]) }}">
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
            <a class="button" href="{{ route('campaign::locations::delete', [$campaign->id, $location->id]) }}">
                Yes
            </a>
            <button class="button" onclick="toggleDeleteModal(false)">
                No
            </button>
        </div>
    </div>
</div>


@endsection
