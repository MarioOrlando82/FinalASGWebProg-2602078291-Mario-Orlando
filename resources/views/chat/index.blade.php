@extends('layouts.master')
@section('title', __('messages.chat_with', ['name' => $recipient->name]))
@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">{{ __('messages.chat_with', ['name' => $recipient->name]) }}</h1>
        <div class="card shadow-sm">
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                @foreach ($chats as $chat)
                    <div class="mb-3">
                        <strong class="{{ $chat->user_id === Auth::id() ? 'text-success' : 'text-primary' }}">
                            {{ $chat->user_id === Auth::id() ? __('messages.you') : $recipient->name }}:
                        </strong>
                        <p class="mb-1">{{ $chat->message }}</p>
                        <small class="text-muted">{{ $chat->created_at->format(__('messages.chat_time_format')) }}</small>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <form action="{{ route('chat.send') }}" method="POST">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $recipient->id }}">
                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('messages.message') }}</label>
                        <textarea name="message" id="message" rows="3" class="form-control" placeholder="{{ __('messages.type_message') }}" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.send') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
