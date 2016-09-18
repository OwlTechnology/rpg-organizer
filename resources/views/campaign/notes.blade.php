@extends('master.campaign')

@section("campaign-import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/notes.css') }}" />
@endsection

@section("campaign-content")
<div class="content">
  <div class="content-body">
      <div class="section notes-wrapper">
        <h2>Notes</h2>

        <div class="notes">
            @foreach($notes as $note)
            <div class="note">
                <h3 class="title">
                    <a href="{{ url('/campaign/' . $campaign->id . '/notes/' . $note->id) }}">
                        {{ $note->name }}
                    </a>
                </h3>
                <h4 class="subtitle">{{ $note->description }}</h4>
            </div>
            @endforeach
        </div>

        <div class="actions">
            <a class="icon-button blue" href="{{ url("/campaigns/" . $campaign->id . "/notes/new") }}">
                <i class="material-icons">add</i><span class="text">Write New Note</span>
            </a>
        </div>
    </div>
  </div>
</div>
@endsection
