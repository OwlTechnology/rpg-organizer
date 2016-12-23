@extends("master.campaign")

@section("campaign-content")
    <div class="content">
        <div class="content-body">
            <div  class="section locations-wrapper">
                <h2> Locations </h2>

                <div class="locations">
                    @foreach($locations as $location)
                    <div class="location">
                        <h3 class="title">
                            <a href="{{ route('campaign::locations::view', [$campaign->id, $location->id]) }}">
                                {{ $location->name }}
                            </a>
                        </h3>
                        <p>
                            {{$location->content}}
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="actions">
                    <a class="icon-button blue" href="{{ route('campaign::locations::new', $campaign->id) }}">
                        <i class="material-icons">add</i><span class="text">Add New Location</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

@endsection
