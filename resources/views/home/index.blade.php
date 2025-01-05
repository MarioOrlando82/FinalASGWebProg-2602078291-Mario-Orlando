@extends('layouts.master')

@section('title', __('messages.home_title'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5 text-primary">{{ __('messages.welcome') }}</h1>

        <form action="{{ route('home.index') }}" method="GET" class="mb-5">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="gender" class="form-label">{{ __('messages.filter_by_gender') }}</label>
                    <select name="gender" id="gender" class="form-select shadow-sm">
                        <option value="">{{ __('messages.all') }}</option>
                        <option value="Male" {{ request('gender') === 'Male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                        <option value="Female" {{ request('gender') === 'Female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="search" class="form-label">{{ __('messages.search_by_field') }}</label>
                    <input type="text" name="search" id="search" class="form-control shadow-sm"
                           value="{{ request('search') }}" placeholder="{{ __('messages.enter_field') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 shadow-sm">{{ __('messages.filter') }}</button>
                </div>
            </div>
        </form>

        <div class="row g-4">
            @if ($users->isEmpty())
                <div class="col-12">
                    <p class="text-center text-muted">{{ __('messages.no_users_found') }}</p>
                </div>
            @else
                @foreach ($users as $user)
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ $user['photo'] }}" class="card-img-top" alt="{{ __('messages.user_photo') }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary">{{ $user['name'] }}</h5>
                                <p class="card-text">
                                    <strong>{{ __('messages.profession') }}:</strong> {{ implode(', ', $user['fields_of_work']) }}
                                </p>

                                @auth
                                    <form action="{{ route('wishlist.add') }}" method="POST" class="mt-auto">
                                        @csrf
                                        <input type="hidden" name="wished_user_id" value="{{ $user['id'] }}">
                                        <button type="submit" class="btn btn-success w-100">{{ __('messages.add_friend') }}</button>
                                    </form>
                                @else
                                    <a href="{{ route('user.login') }}" class="btn btn-primary w-100 mt-auto">{{ __('messages.login_to_connect') }}</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
