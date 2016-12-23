@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">

        <h1>{{ $monster->name }}</h1>

        <div>
        	<strong>Classification:</strong>
        	<span>{{ $monster->classification }}</span>
        </div>
        <div>
        	<strong>Alignment:</strong>
        	<span>{{ $monster->alignment_id }}</span>
        </div>
        <div>
        	<strong>AC:</strong>
        	<span>{{ $monster->armor_class }}</span>
        </div>
        <div>
        	<strong>Hit Points:</strong>
        	<span>{{ $monster->hit_points }}</span>
        	<span>({{ $monster->hit_points_calculation }})</span>
        </div>
        <div>
        	<strong>Speed:</strong>
        	<span>{{ $monster->speed }}ft</span>
        </div>
        <div>
        	<strong>Swim Speed:</strong>
        	<span>{{ $monster->speed_swim }}ft</span>
        </div>
        <div>
        	<strong>STR:</strong>
        	<span>{{ $monster->base_strength }}</span>
        </div>
        <div>
        	<strong>DEX:</strong>
        	<span>{{ $monster->base_dexterity }}</span>
        </div>
        <div>
        	<strong>CON:</strong>
        	<span>{{ $monster->base_constitution }}</span>
        </div>
        <div>
        	<strong>INT:</strong>
        	<span>{{ $monster->base_intelligence }}</span>
        </div>
        <div>
        	<strong>WIS:</strong>
        	<span>{{ $monster->base_wisdom }}</span>
        </div>
        <div>
        	<strong>CHA:</strong>
        	<span>{{ $monster->base_charisma }}</span>
        </div>
        <div>
        	<strong>CR:</strong>
        	<span>{{ $monster->challenge_rating }}</span>
        </div>
        <div>
        	<strong>EXP:</strong>
        	<span>{{ $monster->average_exp }}</span>
        </div>
        <div>
        	<strong>Legendary Actions:</strong>
        	<p>{{ $monster->legendary_actions_description }}</p>
        </div>
    </div>
</div>
@endsection