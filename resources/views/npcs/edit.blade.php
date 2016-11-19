@extends('master.primary')

@section("content")
<div class="content">
    <div class="content-body">
        <div class="section">
            <form action="{{ '/campaign/' . $campaign->id . '/npc/' . $npc->id . '/edit' }}" method="post">
                {{ csrf_field() }}

                <h2>
                    <input type="text" name="name" value="{{ $npc->name }}" />
                </h2>

                <textarea name="short_description">{{ $npc->short_description }}</textarea>

                <div>
                    <button type="submit" class="button blue">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
