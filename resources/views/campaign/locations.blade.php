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
                            <a href="{{ url('/campaign/' . $campaign->id . '/location/' . $location->id) }}">
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
                    <a class="icon-button blue" href="{{ url("/campaigns/" . $campaign->id . "/locations/new") }}">
                        <i class="material-icons">add</i><span class="text">Add New Location</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

@endsection
