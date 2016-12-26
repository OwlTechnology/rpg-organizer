@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">

        <h1>Edit {{ $monster->name }}</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('static::dnd5::monsters-manual::edit.post', $monster->id) }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" maxlength="128" value="{{ $monster->name }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    API.AI Name Key
                    <input type="text" name="ai_name_key" maxlength="128" value="{{ $monster->ai_name_key }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Classification
                    <input type="text" name="classification" maxlength="64" value="{{ $monster->classification }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Alignment
                    <select name="alignment_id">
                        <option value="1" {{ $monster->alignment_id == 1 ? "selected" : "" }}>Lawful Good</option>
                        <option value="2" {{ $monster->alignment_id == 2 ? "selected" : "" }}>Chaotic Good</option>
                        <option value="3" {{ $monster->alignment_id == 3 ? "selected" : "" }}>Neutral Good</option>
                        <option value="4" {{ $monster->alignment_id == 4 ? "selected" : "" }}>Lawful Neutral</option>
                        <option value="5" {{ $monster->alignment_id == 5 ? "selected" : "" }}>True Neutral</option>
                        <option value="6" {{ $monster->alignment_id == 6 ? "selected" : "" }}>Chaotic Neutral</option>
                        <option value="7" {{ $monster->alignment_id == 7 ? "selected" : "" }}>Lawful Evil</option>
                        <option value="8" {{ $monster->alignment_id == 8 ? "selected" : "" }}>Neutral Evil</option>
                        <option value="9" {{ $monster->alignment_id == 9 ? "selected" : "" }}>Chaotic Evil</option>
                    </select>
                </label>
            </div>
            <div class="form-element">
                <label>
                    Armor Class
                    <input type="number" name="armor_class" value="{{ $monster->armor_class }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Hit Points
                    <input type="number" name="hit_points" value="{{ $monster->hit_points }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Hit Points Calculation
                    <input type="text" name="hit_points_calculation" maxlength="32" value="{{ $monster->hit_points_calculation }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Speed
                    <input type="number" name="speed" value="{{ $monster->speed }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Swimming Speed
                    <input type="number" name="speed_swim" value="{{ $monster->speed_swim }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Strength
                    <input type="number" name="base_strength" value="{{ $monster->base_strength }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Dexterity
                    <input type="number" name="base_dexterity" value="{{ $monster->base_dexterity }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Constitution
                    <input type="number" name="base_constitution" value="{{ $monster->base_constitution }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Intelligence
                    <input type="number" name="base_intelligence" value="{{ $monster->base_intelligence }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Wisdom
                    <input type="number" name="base_wisdom" value="{{ $monster->base_wisdom }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Charisma
                    <input type="number" name="base_charisma" value="{{ $monster->base_charisma }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Challenge Rating
                    <input type="number" name="challenge_rating" value="{{ $monster->challenge_rating }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Average EXP
                    <input type="number" name="average_exp" value="{{ $monster->average_exp }}" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Legendary Actions Description
                    <textarea name="legendary_actions_description" maxlength="1024">{{ $monster->legendary_actions_description }}</textarea>
                </label>
            </div>
            <div class="submit">
                <button type="submit">Save</button>
            </div>
        </form>

    </div>
</div>

@endsection