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
            <?php $associations = $campaign->playerAssociations; ?>
            @foreach($associations as $association)
                {{ "User: " . $association->user->name }}
            @endforeach
        </div>

        This is the campaign homepage!
    </div>
</div>
@endsection
