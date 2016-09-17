@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Create New Note</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form login" method="post" action="{{ url('/notes/new') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_campaign_id" value="{{ $campaignID }}" />

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Description
                    <input type="text" name="description" />
                </label>
            </div>
            <div class="submit">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
