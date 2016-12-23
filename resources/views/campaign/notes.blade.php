@extends('master.campaign')

@section("campaign-import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/notes.css') }}" />
@endsection

@section("campaign-content")
<div class="content">
  <div class="content-body">
      <div class="section">
        <h2>Notes</h2>
      </div>
  </div>
</div>

<div class="content notes-wrapper">
    <div class="content-body">
        <div class="section">
            <div class="notes">
                @foreach($notes as $note)
                <div class="note card card-2">
                    <h3 class="title">
                        {{ $note->name }}
                    </h3>
                    <p class="description">{{ $note->description }}</p>
                    <div class="actions">
                        <a href="{{ route('campaign::notes::view', [$campaign->id, $note->id]) }}">
                            View
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="content">
  <div class="content-body">
      <div class="section">
        <div class="actions">
            <a class="icon-button blue" href="{{ route('campaign::notes::new', $campaign->id) }}">
                <i class="material-icons">add</i><span class="text">Write New Note</span>
            </a>
        </div>
    </div>
  </div>
</div>
@endsection
