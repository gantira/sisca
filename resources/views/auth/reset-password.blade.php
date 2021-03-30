<x-guest-layout>
    <x-slot name="title">Reset Password</x-slot>

    <div class="passwordBox text-center loginscreen animated fadeInDown">

        <form class="m-t" role="form" method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <div class="form-group">
                    <input name="email" type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" placeholder="Username" required="" value="{{ old('email', $request->email) }}"
                        required autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <input name="password" type="password" class="form-control @error('password')
                    is-invalid
                @enderror" placeholder="Password" required="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required="">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>
