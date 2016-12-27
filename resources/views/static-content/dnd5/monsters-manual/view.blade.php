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

        <h1>{{ $monster->name }}</h1>

        <div class="edit-wrapper">
            <a class="button blue" href="{{ route('static::dnd5::monsters-manual::edit', $monster->id) }}">
                <i class="material-icons">edit</i>
            </a>
        </div>

        <div class="sheet-row-1">

            <div class="attributes">
                <div class="base-attribute">
                    <div class="name">
                        Strength
                    </div>
                    <div class="value">
                        {{ $monster->base_strength }}
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
                        {{ $monster->base_dexterity }}
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
                        {{ $monster->base_constitution }}
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
                        {{ $monster->base_intelligence }}
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
                        {{ $monster->base_wisdom }}
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
                        {{ $monster->base_charisma }}
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
                            <code>
                                {{ $monster->ai_name_key }}
                            </code>
                        </span>
                    </div>

                    <div class="stat classification">
                        <span class="name">Classification</span>
                        <span class="value">{{ $monster->classification }}</span>
                    </div>

                    <div class="stat">
                        <span class="name">Alignment</span>
                        <span class="value">{{ $monster->getAlignmentName() }}</span>
                    </div>

                    <div class="stat">
                        <span class="name">AC</span>
                        <span class="value">{{ $monster->armor_class }}</span>
                    </div>

                    <div class="stat">
                        <span class="name">Hit Points</span>
                        <span class="value">
                            <span>{{ $monster->hit_points }}</span>
                            <span>({{ $monster->hit_points_calculation }})</span>
                        </span>
                    </div>

                    <div class="stat">
                        <span class="name">Speed</span>
                        <span class="value">{{ $monster->speed }}ft</span>
                    </div>

                    <div class="stat">
                        <span class="name">Swim Speed</span>
                        <span class="value">{{ $monster->speed_swim }}ft</span>
                    </div>

                    <div class="stat">
                        <span class="name">CR</span>
                        <span class="value">{{ $monster->challenge_rating }}</span>
                    </div>

                    <div class="stat">
                        <span class="name">EXP</span>
                        <span class="value">{{ $monster->average_exp }}</span>
                    </div>
                </div>

                <div class="features">
                    <h2>Features</h2>

                    @forelse($features as $feature)
                        <div class="feature">
                            <p>
                                <strong><i>{{ $feature->name }}.</i></strong>
                                {{ $feature->description }}
                            </p>
                        </div>
                    @empty
                        <div>
                            <i>No Features Available for this Monster</i>
                        </div>
                    @endforelse

                    <p>
                        <a class="button blue" href="{{ route('static::dnd5::monsters-manual::features::new', $monster->id) }}">
                            <i class="material-icons">add</i>
                            New Feature
                        </a>
                    </p>
                </div>

                <div class="actions">
                    <h2>Actions</h2>

                    @forelse($actions as $action)
                        <div class="action">
                            <p>
                                <strong>
                                    <i>
                                        {{ $action->name }}{{ $action->denotation !== "" ? " (" . $action->denotation . ")" : "" }}.
                                    </i>
                                </strong>
                                @if($action->attack_description !== "")
                                    <i>{{ $action->attack_description }}</i>
                                @endif
                                {{ $action->description }}
                            </p>
                        </div>
                    @empty
                        <div>
                            <i>No Actions Available for this Monster</i>
                        </div>
                    @endforelse

                    <p>
                        <a class="button blue" href="{{ route('static::dnd5::monsters-manual::actions::new', $monster->id) }}">
                            <i class="material-icons">add</i>
                            New Action
                        </a>
                    </p>
                </div>

                @if($monster->legendary_actions_description !== "")
                    <div>
                        <h2>Legendary Actions</h2>
                        <p>{{ $monster->legendary_actions_description }}</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<a href="{{ route('static::dnd5::monsters-manual::edit', $monster->id) }}" class="mobile-fab blue">
    <i class="_icon material-icons">edit</i>
</a>
@endsection