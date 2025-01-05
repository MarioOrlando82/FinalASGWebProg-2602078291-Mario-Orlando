@extends('layouts.master')

@section('title', __('messages.profile'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.profile') }}</h1>

        <div class="card shadow-sm mx-auto mb-4" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title text-success">{{ Auth::user()->name }}</h5>
                <p class="mb-2"><strong>{{ __('messages.email') }}:</strong> {{ Auth::user()->email }}</p>
                <p class="mb-2"><strong>{{ __('messages.gender') }}:</strong> {{ __('messages.' . Auth::user()->gender) }}</p>
                <p class="mb-0"><strong>{{ __('messages.coins') }}:</strong> <span class="text-warning">{{ Auth::user()->coins }}</span></p>
            </div>
        </div>

        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ __('messages.update_profile') }}</h5>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">{{ __('messages.gender') }}</label>
                        <select class="form-select shadow-sm" id="gender" name="gender">
                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">{{ __('messages.profile_picture') }}</label>
                        <input type="file" class="form-control shadow-sm" id="profile_photo" name="profile_photo">
                    </div>

                    <button type="submit" class="btn btn-success w-100">{{ __('messages.update_profile') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
