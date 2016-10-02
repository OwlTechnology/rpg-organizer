@extends('master.primary')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/newNote.css') }}" />
@endsection

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Create New Note</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ url('/notes/new') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_campaign_id" value="{{ $campaignID }}" />

            <div class="form-element">
                <div class="title">
                    <label>Name</label>
                </div>
                <div class="input">
                    <input type="text" class="halfwidth" name="name" />
                </div>
            </div>
            <div class="form-element">
                <div class="title">
                    <label>Description</label>
                </div>
                <div class="input">
                    <input type="text" class="fullwidth" name="description" />
                </div>
            </div>
            <div class="form-element last">
                <div class="title">
                    <label>Content</label>
                </div>
                <div class="input">
                    <textarea name="content" class="fullwidth textarea"></textarea>
                </div>
            </div>
            <div class="submit text-center">
                <button type="submit" class="button blue">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
