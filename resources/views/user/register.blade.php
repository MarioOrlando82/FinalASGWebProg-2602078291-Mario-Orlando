@extends('layouts.master')

@section('title', __('messages.register'))

@section('content')
    <div class="container">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.register') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 700px;">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" onsubmit="return validateFieldsOfWork()">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control shadow-sm" id="name" name="name" required placeholder="{{ __('messages.enter_name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" required placeholder="{{ __('messages.enter_email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('messages.password') }}</label>
                        <input type="password" class="form-control shadow-sm" id="password" name="password" required placeholder="{{ __('messages.create_password') }}">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">{{ __('messages.gender') }}</label>
                        <select name="gender" class="form-select shadow-sm" required>
                            <option value="Male">{{ __('messages.male') }}</option>
                            <option value="Female">{{ __('messages.female') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fields_of_work" class="form-label">{{ __('messages.fields_of_work') }}</label>
                        <div class="row">
                            @foreach ($fieldsOfWork as $field)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fields_of_work[]" id="field_{{ $field->id }}" value="{{ $field->id }}">
                                        <label class="form-check-label" for="field_{{ $field->id }}">
                                            {{ $field->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-muted">{{ __('messages.select_at_least_3') }}</small>
                    </div>

                    <div class="mb-3">
                        <label for="linkedin_username" class="form-label">{{ __('messages.linkedin_profile') }}</label>
                        <input type="url" class="form-control shadow-sm" id="linkedin_username" name="linkedin_username" required placeholder="{{ __('messages.enter_linkedin') }}">
                    </div>

                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">{{ __('messages.mobile_number') }}</label>
                        <input type="text" class="form-control shadow-sm" id="mobile_number" name="mobile_number" required placeholder="{{ __('messages.enter_mobile') }}">
                    </div>

                    <button type="submit" class="btn btn-success w-100">{{ __('messages.register') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateFieldsOfWork() {
            const checkboxes = document.querySelectorAll('input[name="fields_of_work[]"]:checked');

            if (checkboxes.length < 3) {
                alert('{{ __('messages.select_at_least_3_alert') }}');
                return false;
            }

            return true;
        }
    </script>
@endsection
