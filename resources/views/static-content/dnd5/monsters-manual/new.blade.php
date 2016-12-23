@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">

        <h1>Add New Monster</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('static::dnd5::monsters-manual::new.post') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name
                    <input type="text" name="name" maxlength="128" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Classification
                    <input type="text" name="classification" maxlength="64" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Alignment
                    <select name="alignment_id">
                        <option value="1">Lawful Good</option>
                        <option value="2">Chaotic Good</option>
                        <option value="3">Neutral Good</option>
                        <option value="4">Lawful Neutral</option>
                        <option value="5">True Neutral</option>
                        <option value="6">Chaotic Neutral</option>
                        <option value="7">Lawful Evil</option>
                        <option value="8">Neutral Evil</option>
                        <option value="9">Chaotic Evil</option>
                    </select>
                </label>
            </div>
            <div class="form-element">
                <label>
                    Armor Class
                    <input type="number" name="armor_class" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Hit Points
                    <input type="number" name="hit_points" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Hit Points Calculation
                    <input type="text" name="hit_points_calculation" maxlength="32" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Speed
                    <input type="number" name="speed" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Swimming Speed
                    <input type="number" name="speed_swim" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Strength
                    <input type="number" name="base_strength" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Dexterity
                    <input type="number" name="base_dexterity" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Constitution
                    <input type="number" name="base_constitution" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Intelligence
                    <input type="number" name="base_intelligence" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Wisdom
                    <input type="number" name="base_wisdom" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Charisma
                    <input type="number" name="base_charisma" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Challenge Rating
                    <input type="number" name="challenge_rating" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Average EXP
                    <input type="number" name="average_exp" />
                </label>
            </div>
            <div class="form-element">
                <label>
                    Legendary Actions Description
                    <textarea name="legendary_actions_description" maxlength="1024"></textarea>
                </label>
            </div>
            <div class="submit">
                <button type="submit">Add Monster</button>
            </div>
        </form>

    </div>
</div>

@endsection
