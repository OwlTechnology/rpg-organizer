@extends('master.campaign')

@section("import")
<link rel="stylesheet" type="text/css" href="{{ url('/css/campaign.css') }}" />
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

        <a href="{{ url("/campaigns/" . $campaign->id . "/notes/new") }}">
            Write New Note
        </a>
    </div>
  </div>
</div>
@endsection
