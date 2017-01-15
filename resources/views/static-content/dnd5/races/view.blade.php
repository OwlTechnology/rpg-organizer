@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">

        <h1>{{ $race->name }}</h1>

        <div class="edit-wrapper">
            <a class="button blue" href="{{ route('static::dnd5::races::edit', $race->id) }}">
                <i class="material-icons">edit</i>
            </a>
        </div>

        <div>
            <div>
                <strong>API.AI Key:</strong>
                <code>{{ $race->api_ai_key }}</code>
            </div>

            <p>
                {{ $race->description }}
            </p>
            <p>
                <strong><i>Age.</i></strong>
                {{ $race->age_description }}
            </p>
            <p>
                <strong><i>Alignment.</i></strong>
                {{ $race->alignment_description }}
            </p>
            <p>
                <strong><i>Size.</i></strong>
                {{ $race->size_description }}
                Your size is {{ $race->getSizeName() }}.
            </p>
            <p>
                <strong><i>Speed.</i></strong>
                {{ $race->speed_description }}
            </p>
        </div>
    </div>
</div>
@endsection