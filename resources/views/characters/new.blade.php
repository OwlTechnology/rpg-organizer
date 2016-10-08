@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Create Character</h1>

        <form class="form characters" method="post" action="{{ url('/me/characters/new/') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Character Name
                    <input type="text" name="characterName"/>
                </label>
            </div>
            <div class="submit">
                <button type="submit">Create Character</button>
            </div>

        </form>

    </div>
</div>




@endsection
