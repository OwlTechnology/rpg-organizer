@extends('master.primary')

@section("content")
<?php
    function getMod($baseValue){
        $value = floor(($baseValue - 10) / 2);

        return $value > 0 ? "+" . $value : $value;
    }
?>

<div class="content">
    <div class="content-body">

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="{{ route('static::dnd5::monsters-manual::edit.post', $monster->id) }}">
            {{ csrf_field() }}

            <h1>
                Edit
                <input type="text" class="text-input mtrl inherit" name="name" maxlength="128" value="{{ $monster->name }}" />
            </h1>

            <div class="edit-wrapper">
                <a class="button default" href="{{ route('static::dnd5::monsters-manual::view', $monster->id) }}">
                    <i class="material-icons">rounded_corner</i>
                    Discard
                </a>
                <button class="button blue" type="submit">
                    <i class="material-icons">save</i>
                    Save
                </button>
            </div>

            <div class="sheet-row-1">
                <div class="attributes">
                    <div class="base-attribute">
                        <div class="name">
                            Strength
                        </div>
                        <div class="value">
                            <input type="number" name="base_strength" value="{{ $monster->base_strength }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_strength) }}
                        </div>
                    </div>
                    <div class="base-attribute">
                        <div class="name">
                            Dexterity
                        </div>
                        <div class="value">
                            <input type="number" name="base_dexterity" value="{{ $monster->base_dexterity }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_dexterity) }}
                        </div>
                    </div>
                    <div class="base-attribute">
                        <div class="name">
                            Constitution
                        </div>
                        <div class="value">
                            <input type="number" name="base_constitution" value="{{ $monster->base_constitution }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_constitution) }}
                        </div>
                    </div>
                    <div class="base-attribute">
                        <div class="name">
                            Intelligence
                        </div>
                        <div class="value">
                            <input type="number" name="base_intelligence" value="{{ $monster->base_intelligence }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_intelligence) }}
                        </div>
                    </div>
                    <div class="base-attribute">
                        <div class="name">
                            Wisdom
                        </div>
                        <div class="value">
                            <input type="number" name="base_wisdom" value="{{ $monster->base_wisdom }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_wisdom) }}
                        </div>
                    </div>
                    <div class="base-attribute">
                        <div class="name">
                            Charisma
                        </div>
                        <div class="value">
                            <input type="number" name="base_charisma" value="{{ $monster->base_charisma }}" />
                        </div>
                        <div class="modifier">
                            {{ getMod($monster->base_charisma) }}
                        </div>
                    </div>
                </div>

                <div class="main-stats">
                    <div class="stats-list">
                        <div class="stat">
                            <span class="name">API.AI Name Key</span>
                            <span class="value">
                                <input type="text" class="text-input mtrl monospace" name="ai_name_key" maxlength="128" value="{{ $monster->ai_name_key }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Classification</span>
                            <span class="value">
                                <input type="text" class="text-input mtrl full" name="classification" maxlength="64" value="{{ $monster->classification }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Alignment</span>
                            <span class="value">
                                <select class="dropdown-input full" name="alignment_id">
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
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Armor Class</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="armor_class" value="{{ $monster->armor_class }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Hit Points</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="hit_points" value="{{ $monster->hit_points }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Hit Points Calculation</span>
                            <span class="value">
                                <input type="text" class="text-input mtrl full" name="hit_points_calculation" maxlength="32" value="{{ $monster->hit_points_calculation }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Speed</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="speed" value="{{ $monster->speed }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Swimming Speed</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="speed_swim" value="{{ $monster->speed_swim }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Challenge Rating</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="challenge_rating" value="{{ $monster->challenge_rating }}" />
                            </span>
                        </div>
                        <div class="stat">
                            <span class="name">Average EXP</span>
                            <span class="value">
                                <input type="number" class="text-input mtrl full" name="average_exp" value="{{ $monster->average_exp }}" />
                            </span>
                        </div>
                    </div>

                    <div class="form-element">
                        <label>
                            Legendary Actions Description<br />
                            <textarea class="text-input mtrl" name="legendary_actions_description" maxlength="1024">{{ $monster->legendary_actions_description }}</textarea>
                        </label>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
