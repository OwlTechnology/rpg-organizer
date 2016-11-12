@extends('master.campaign')

@section("campaign-content")
<div class="content">
    <div class="content-body">
        <div class="invites">
            @if(session("invite.error"))
            <div class="error">
                {{ session("invite.error.msg") }}
            </div>
            @endif

            @if(session("invite.message"))
            <div class="message">
                {{ session("invite.message") }}
            </div>
            @endif

            <form action="{{ url('/campaign/invite') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="campaignID" value="{{ $campaign->id }}" />

                Invite Player to Campaign:
                <input type="text" name="username" placeholder="Player Username, ex: foobard" />
                <button type="submit">Invite!</button>
            </form>
        </div>

        <div class="players">
            <div class="name">
                Players
            </div>
            <div class="list">
                <?php $associations = $campaign->playerAssociations; ?>
                @if(count($associations) < 1)
                <div class="player empty">
                    No players invited yet...
                </div>
                @else
                    @foreach($associations as $association)
                    <div class="player">
                        {{ $association->user->name }}

                        @if($campaign->isOwnedByCurrentUser())
                        <a class="delete" href="{{ url('/campaign/' . $campaign->id . '/kick-player/' . $association->user->id) }}">
                            <i class="material-icons">cancel</i>
                        </a>
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        This is the campaign homepage!
    </div>
</div>
@endsection
