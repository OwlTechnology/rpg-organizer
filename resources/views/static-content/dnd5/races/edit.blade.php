@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('static::dnd5::races::edit.post', $race->id) }}">
            {{ csrf_field() }}

            <h1>
                Edit
                <input type="text" class="text-input mtrl inherit" name="name" maxlength="128" value="{{ $race->name }}" />
            </h1>

            <div class="edit-wrapper">
                <a class="button default" href="{{ route('static::dnd5::races::view', $race->id) }}">
                    <i class="material-icons">rounded_corner</i>
                    Discard
                </a>
                <button class="button blue" type="submit">
                    <i class="material-icons">save</i>
                    Save
                </button>
            </div>

            <div class="form-element">
                <label>
                    API.AI Key<br />
                    <input class="text-input mtrl monospace" type="text" name="api_ai_key" maxlength="64" value="{{ $race->api_ai_key }}" />
                </label>
            </div>
            <div class="form-element">
                <label>Description</label><br />
                <textarea class="text-input mtrl" name="description" maxlength="1024">{{ $race->description }}</textarea>
            </div>

            <div class="form-element">
                <label>Age Description</label><br />
                <textarea class="text-input mtrl" name="age_description" maxlength="512">{{ $race->age_description }}</textarea>
            </div>
            <div class="form-element">
                <label>Alignment Description</label><br />
                <textarea class="text-input mtrl" name="alignment_description" maxlength="512">{{ $race->alignment_description }}</textarea>
            </div>
            <div class="form-element">
                <label>Size</label><br />
                <select class="dropdown-input" name="size_id">
                    <option value="0">Small</option>
                    <option value="1">Medium</option>
                    <option value="2">Large</option>
                </select>
            </div>
            <div class="form-element">
                <label>Size Description</label><br />
                <textarea class="text-input mtrl" name="size_description" maxlength="512">{{ $race->size_description }}</textarea>
            </div>
            <div class="form-element">
                <label>Speed</label><br />
                <input type="number" name="speed" class="text-input mtrl" value="{{ $race->speed }}" />
            </div>
            <div class="form-element">
                <label>Speed Description</label><br />
                <textarea class="text-input mtrl" name="speed_description" maxlength="256">{{ $race->speed_description }}</textarea>
            </div>
        </form>
    </div>
</div>
@endsection