<x-guest-layout title="Signup" bodyClass="page-signup">
    <h1 class="auth-page-title">Signup</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" />
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Your Password" />
        </div>
        <div class="form-group">
            <input type="password" name="confirmPass" placeholder="Repeat Password" />
        </div>
        <hr />
        <div class="form-group">
            <input type="text" name="firstName" placeholder="First Name" />
        </div>
        <div class="form-group">
            <input type="text" name="lastName" placeholder="Last Name" />
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone" />
        </div>
        <button class="btn btn-primary btn-login w-full">Register</button>
    </form>
    <x-slot:formFooter>
        Already have an account? -
        <a href="{{ route('login') }}"> Click here to login </a>
    </x-slot:formFooter>
</x-guest-layout>
