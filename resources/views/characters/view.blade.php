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
        <div class="skills">
            
        </div>
    </div>
</div>





@endsection
