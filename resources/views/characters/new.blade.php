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

                <!-- Get the attributes -->
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

                <!-- Get the personality -->
                <div class="personality">
                    <div class="alignment">
                        <select name="alignment">
                            @foreach($alignmentOptions as $alignmentOption)
                            <option value="{{ $alignmentOption->id }}">{{ $alignmentOption->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="personalityTraits">
                        Personality Traits
                        <input type="text" name="personalityTraits"/>
                    </div>
                    <div class="ideals">
                        Ideals
                        <input type="text" name="ideals"/>
                    </div>
                    <div class="bonds">
                        Bonds
                        <input type="text" name="bonds"/>
                    </div>
                    <div class="flaws">
                        Flaws
                        <input type="text" name="flaws"/>
                    </div>
                </div>
                <!-- Get the Skills -->
                <div class="skills">
                    @foreach($skills as $skill)
                        {{$skill}}
                        <input type="checkbox" name="{{ $skill }}proficiency">
                        <input type="number" step="0.25" name="{{ $skill }}proficiencyMultiplier">
                    @endforeach
                </div>

            </div>
            <div class="submit">
                <button type="submit">Create Character</button>
            </div>

        </form>

    </div>
</div>




@endsection
