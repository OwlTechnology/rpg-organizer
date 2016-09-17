@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>My Account</h1>

        <div>
            Name: {{ Auth::user()->name }}
        </div>

        <div class="campaigns collection">
            @foreach($campaigns as $campaign)
            <div class="campaign">
                <div class="name">
                    {{ $campaign->name }}
                </div>
            </div>
            @endforeach
        </div>
        <div>
            <a href="{{ url('/campaigns/new') }}">Create New Campaign</a>
        </div>

    </div>
</div>

@endsection
