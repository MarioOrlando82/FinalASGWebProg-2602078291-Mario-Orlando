@extends('layouts.master')

@section('title', __('messages.wishlist'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.your_friends') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 700px;">
            <div class="card-body">
                @if ($wishlists->isEmpty())
                    <p class="text-center text-muted">{{ __('messages.no_friends_in_wishlist') }}</p>
                @else
                    <ul class="list-group">
                        @foreach ($wishlists as $wishlist)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">{{ $wishlist->wishedUser->name }}</span>
                                <div>
                                    <form action="{{ route('wishlist.remove') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="wished_user_id" value="{{ $wishlist->wishedUser->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.remove') }}</button>
                                    </form>
                                    <a href="{{ route('chat.index', $wishlist->wishedUser->id) }}" class="btn btn-primary btn-sm">{{ __('messages.chat') }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
