@extends('staging-login.layout')

@section('title', __('v2_auth.meta-title'))
@section('meta-desc', __('v2_auth.meta-desc'))

@section('styles')
    {{-- @include('v2.login.component.style') --}}
@endsection

@section('content')
    <main class="login-container" style="min-height: 100vh">
        <h1 class="h6-700 h5-m-700 text-white">Staging cmlabs</h1>
        <form class="login-card" method="post" action="{{route('staging-login.post')}}">
            @csrf
            <div class="w-100">
                <input id="email" name="email" type="email"
                    class="form-control b2-400 mb-3 b2-m-400 w-100 py-2 {{ $errors->any() ? 'error' : '' }}"
                    placeholder="Enter email">
                <div class="input-with-icon flex-grow-1 flex-lg-grow-0 w-100">
                    <input id="password" name="password" type="password"
                        class="form-control b2-400 b2-m-400 w-100 py-2 {{ $errors->any() ? 'error' : '' }}"
                        placeholder="Input password">
                    <i class='bx bx-show show-icon text-gray-90 input-icon' id="showPasswordIcon"
                        onclick="togglePasswordVisibility()" aria-hidden="true"></i>
                    <div
                        class="error gap-1 d-flex text-danger-70 s-400 align-items-center mt-2 {{ session('error') ? '' : 'd-none' }}">
                        <i class='bx bxs-error'></i>
                        Incorrect password
                    </div>
                </div>
            </div>
            <button type="submit" class="w-100 py-2 rounded-3 btn btn-primary button-primary-70 b1-400 b1-m-400">Login</button>
        </form>
    </main>
@endsection
@section('scripts')
    @parent
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const showPasswordIcon = document.getElementById("showPasswordIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.remove("bx-show");
                showPasswordIcon.classList.add("bx-hide");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("bx-hide");
                showPasswordIcon.classList.add("bx-show");
            }
        }
    </script>
@endsection
