@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Add Location</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{url('/campaigns/' . $campaign->id . '/locations/new/')}}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Content
                    <input type="text" name="content" />
                </label>
            </div>
            <div class="submit">
                <button type="submit">Add Location</button>
            </div>
        </form>

    </div>
</div>

@endsection
