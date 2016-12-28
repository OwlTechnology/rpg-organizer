@extends('master.primary')

@section("content")

<div class="content">
    <div class="content-body">

        <h1>Add New Race</h1>

        @if(session("message"))
        <div class="log message">
            {{ session("message") }}
        </div>
        @endif

        <form class="form create" method="post" action="">
            {{ csrf_field() }}

            <div class="form-element">
                <label>
                    Name<br />
                    <input class="text-input mtrl" type="text" name="name" maxlength="64" />
                </label>
            </div>
            <div class="form-element">
            	<label>
            		API.AI Key<br />
            		<input class="text-input mtrl monospace" type="text" name="api_ai_key" maxlength="64" />
            	</label>
            </div>
            <div class="form-element">
	            <label>Description</label><br />
	            <textarea class="text-input mtrl" name="description" maxlength="1024"></textarea>
            </div>

            <div class="form-element">
	            <label>Age Description</label><br />
	            <textarea class="text-input mtrl" name="age_description" maxlength="512"></textarea>
            </div>
            <div class="form-element">
	            <label>Alignment Description</label><br />
	            <textarea class="text-input mtrl" name="alignment_description" maxlength="512"></textarea>
            </div>
            <div class="form-element">
            	<label>Size</label><br />
            	<select class="dropdown-input" name="size_id">
            		<option value="0">Small</option>
            		<option value="1">Medium</option>
            		<option value="2">Large</option>
            	</select>
            </div>
            <div class="form-element">
	            <label>Size Description</label><br />
	            <textarea class="text-input mtrl" name="size_description" maxlength="512"></textarea>
            </div>
            <div class="form-element">
	            <label>Speed</label><br />
	            <input type="number" name="speed" class="text-input mtrl" />
            </div>
            <div class="form-element">
	            <label>Speed Description</label><br />
	            <textarea class="text-input mtrl" name="speed_description" maxlength="256"></textarea>
            </div>
            <div class="form-element">
            	<button type="submit" class="button blue">
            		<i class="material-icons">add</i>
            		New Race
            	</button>
            </div>
        </form>
    </div>
</div>

@endsection