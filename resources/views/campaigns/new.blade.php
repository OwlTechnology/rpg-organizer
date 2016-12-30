@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Create Campaign</h1>

        <form class="form campaigns" method="post" action="{{ route('campaign::new.post') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Campaign Name<br />
                    <input type="text" class="text-input mtrl" name="campaignName"/>
                </label>
            </div>
            <div class="submit">
                <button class="button blue" type="submit">
                    <i class="material-icons">add</i>
                    Create Campaign
                </button>
            </div>

        </form>

    </div>
</div>




@endsection
