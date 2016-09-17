@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">
        <h1>Create Campaign</h1>

        <form class="form campaigns" method="post" action="{{ url('/campaigns/new/') }}">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Campaign Name
                    <input type="text" name="campaignName"/>
                </label>
            </div>
            <div class="submit">
                <button type="submit">Create Campaign</button>
            </div>

        </form>

    </div>
</div>




@endsection
