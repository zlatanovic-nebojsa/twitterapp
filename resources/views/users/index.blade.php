@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h3>{{ $user->username }}</h3>
				@if (Auth::user()->isNotA($user))
					@if (Auth::user()->isFollowing($user))
						<a href="{{ route('user.unfollow', $user) }}">Unfollow</a>
					@else
						<a href="{{ route('user.follow', $user) }}">Follow</a>
					@endif
				@endif
			</div>
			<div class="col-md-4">
				<p>Followers</p>
				@foreach($followers as $follower)
					<a href="{{ route('user.index' , $follower->username) }}">{{ $follower->username }}</a>
				@endforeach()
			</div>
		</div>
	</div>
@endsection