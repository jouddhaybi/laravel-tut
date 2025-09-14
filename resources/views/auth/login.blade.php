<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="auth-page-title">Login</h1>

    <form action="{{ route('userLogin') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" />
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Your Password" />
        </div>
        <div class="text-right mb-medium">
            <a href="/password-reset.html" class="auth-page-password-reset">Reset Password</a>
        </div>

        <button class="btn btn-primary btn-login w-full">Login</button>
    </form>

    {{-- @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif --}}

    <x-slot:formFooter>
        Don't have an account? -
        <a href="{{ route('signup') }}"> Click here to create one </a>
    </x-slot:formFooter>
</x-guest-layout>

<script>
    @if ($errors->has('error'))
        toastr.options = {
            "positionClass": "toast-top-center"
        };
        toastr.error('Invalid Credentials. Please Try Again.');
    @endif
</script>
