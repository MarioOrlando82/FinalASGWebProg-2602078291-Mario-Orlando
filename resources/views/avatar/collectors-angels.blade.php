@extends('layouts.master')

@section('title', __('messages.collectors_angels'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">{{ __('messages.collectors_angels') }}</h1>

        <div class="row g-4">
            @foreach ($avatars as $avatar)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset($avatar->image_path) }}" class="card-img-top" alt="{{ __('messages.avatar_image') }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ __('messages.avatar') }}</h5>
                            <p class="card-text"><strong>{{ __('messages.received_by') }}:</strong></p>
                            <ul class="list-unstyled">
                                @foreach ($avatar->users as $user)
                                    <li class="mb-2">
                                        <i class="bi bi-person-circle me-2 text-muted"></i>
                                        {{ $user->name }}
                                        <br>
                                        <small class="text-muted">({{ __('messages.sent_by') }}: {{ $user->pivot->sender_id ? User::find($user->pivot->sender_id)->name : __('messages.self') }})</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
