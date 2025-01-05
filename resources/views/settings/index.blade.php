@extends('layouts.master')

@section('title', __('messages.settings'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.settings') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="visibility" class="form-label">{{ __('messages.profile_visibility') }}</label>
                        <select name="visibility" id="visibility" class="form-select shadow-sm">
                            <option value="show" {{ Auth::user()->visible ? 'selected' : '' }}>{{ __('messages.show_profile') }}</option>
                            <option value="hide" {{ !Auth::user()->visible ? 'selected' : '' }}>{{ __('messages.hide_profile') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.update') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
