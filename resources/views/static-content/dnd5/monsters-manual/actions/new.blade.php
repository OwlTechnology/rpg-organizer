@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">

        <h1>Add New Action to {{ $monster->name }}</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('static::dnd5::monsters-manual::actions::new.post', $monster->id) }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" maxlength="128" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Attack Description
                    <input type="text" name="attack_description" maxlength="64" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Denotation
                    <input type="text" name="denotation" maxlength="64" />
                </label>
            </div>
            <div class="form-element">
                <label>Description</label>
                <textarea name="description" maxlength="1024"></textarea>
            </div>
            <div class="form-element">
                <button type="submit" class="button blue">
                    <i class="material-icons">add</i>
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection