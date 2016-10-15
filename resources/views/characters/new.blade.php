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
                <div class="attributes">
                    <div class="strength">
                        Strength: <input type="number" name="strength"/>
                    </div>
                    <div class="dexterity">
                        Dexterity: <input type="number" name="dexterity"/>
                    </div>
                    <div class="constitution">
                        Constitution: <input type="number" name="constitution"/>
                    </div>
                    <div class="intelligence">
                        Intelligence: <input type="number" name="intelligence"/>
                    </div>
                    <div class="wisdom">
                        Wisdom: <input type="number" name="wisdom"/>
                    </div>
                    <div class="charisma">
                        Charisma: <input type="number" name="charisma"/>
                    </div>
                </div>
            </div>
            <div class="submit">
                <button type="submit">Create Character</button>
            </div>

        </form>

    </div>
</div>




@endsection
