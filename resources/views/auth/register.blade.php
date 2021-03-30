<x-guest-layout>
    @push('css')
    <link href="{{ asset('vendor/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    @endpush

    <x-slot name="title">Register</x-slot>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Sis+</h1>

            </div>
            <h3>Register to Sis+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name')
                        is-invalid
                    @enderror" placeholder="Name" required="" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control @error('email')
                    is-invalid
                @enderror" placeholder="Email" required="" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control @error('password')
                    is-invalid
                @enderror" placeholder="Password" required="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation" required="">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy
                        </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    @push('js')
    <!-- iCheck -->
    <script src="{{ asset('vendor/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    @endpush
</x-guest-layout>
