@extends('layouts.master')

@section('title', 'Create a new link' )

@section('content')
<h2 class="title">Add New Link:</h2>

@if ($errors->any())
<div class="notification is-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="/link" method="post">

	@if( request()->has('subject') )
	<input type="hidden" name="subject" value="{{ request()->subject }}">
	@else
	<div class="field">
		<label class="label">Subject</label>
		<p class="control">
			<span class="select">
				<select name="subject_id">
					@foreach( $subjects as $subject )
					<option value="{{ $subject->id }}" @if( old('subject_id')==$subject->id ) selected="selected"
						@endif>{{ $subject->title }}</option>
					@endforeach
				</select>
			</span>
		</p>
	</div>
	@endif


	<div class="field">
		<label class="label">Comment</label>
		<p class="control has-icons-left has-icons-right">
			<input class="input" type="text" placeholder="Comment" name="comment" value="{{ old('comment') }}">
			<span class="icon is-small is-left">
				<i class="fa fa-pencil"></i>
			</span>
		</p>
	</div>

	<div class="field">
		<label class="label">Thumbnail</label>
		<p class="control has-icons-left has-icons-right">
			<input class="input" type="text" placeholder="Thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
			<span class="icon is-small is-left">
				<i class="fa fa-photo"></i>
			</span>
		</p>
	</div>

	<div class="field">
		<label class="label">URL</label>
		<p class="control has-icons-left has-icons-right">
			<input class="input" type="text" placeholder="URL" name="url" value="{{ old('url') }}">
			<span class="icon is-small is-left">
				<i class="fa fa-link"></i>
			</span>
		</p>
	</div>

	@if( request()->has('type') )
	<input type="hidden" name="type" value="{{ request()->type }}">
	@else
	<div class="field">
		<label class="label">Type</label>
		<p class="control">
			<span class="select">
				<select name="type">
					<option value="index">Index</option>
					<option value="single">Single</option>
				</select>
			</span>
		</p>
	</div>
	@endif

	<div class="field">
		<p class="control">
			@if( $tags->count() )
			@foreach( $tags as $tag )
			<label class="checkbox">
				<input type="checkbox" value="{{ $tag->id }}" name="tag['{{ $tag->slug }}']">
				{{ $tag->name }}
			</label>
			@endforeach
			@endif
		</p>
	</div>

	<div class="field is-grouped">
		<p class="control">
			<button type="submit" class="button is-primary">Submit</button>
		</p>
		<p class="control">
			<a href="{{ URL::previous() }}" class="button is-link">Cancel</a>
		</p>
	</div>

	{{ csrf_field() }}

</form>
@stop