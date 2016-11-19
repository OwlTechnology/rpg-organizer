@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">
        <div class="name">
            Character Name: {{$character->characterName}}

        </div>
        <div class="playerName">
            Player Name: {{$player->name}}
        </div>
        @if($attributes != null)
            <div class="attrubutes">
                <?php $attributesList = $attributes->getAttributesMap(); ?>
                @foreach($attributesList as $key=>$attribute)
                    {{$key}}: {{$attribute}}
                @endforeach
            </div>
        @endif

        <div class="personality">
            <div class=alignment>
                Alignment
                {{$alignment->name}}
            </div>
            <div class="personalityTraits">
                Personality Traits
                {{$personalityTraits}}
            </div>
            <div class="ideals">
                Ideals
                {{$ideals}}
            </div>
            <div class="bonds">
                Bonds
                {{$bonds}}
            </div>
            <div class="flaws">
                Flaws
                {{$flaws}}
            </div>
        </div>

        <div class="skills">
            @foreach($skills as $skill)
                <div>
                    {{ $skill->name }} ({{$skill->baseAttribute}})
                </div>
            @endforeach
        </div>

    </div>
</div>





@endsection
