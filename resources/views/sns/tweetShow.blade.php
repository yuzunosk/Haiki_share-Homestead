@extends('layouts.store.app')


@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
<form action="{{ route('tweet.go') }}" method="post">
        @csrf
        <input
            type="hidden"
            name="title"
            value="title"
        />
        <input type="hidden" name="pic" value="image" />
        <input type="hidden" name="id" value=000999 />
        <button class="btn btn--white" type="submit">
            Tweetする
        </button>
    </form>
</div>
@endsection