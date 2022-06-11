@section('loginModalStyle')
    <style>

    </style>
@endsection
<!-- Modal -->
<div class="modal fade text-white" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content " style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <!-- Inicio -->

                <form method="POST" id="loginForm">
                    @csrf

                    <div class="form-group row">
                        <label for="emailInputLogin"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInputLogin" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            <span class="invalid-feedback" role="alert" id="emailErrorLogin">
                                <strong></strong>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control" name="password" required
                                   autocomplete="current-password">

                            <span id="invalid-feedback-login" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordar Contraseña') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Ingresar') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
                <!-- Fin -->
            </div>
        </div>
    </div>
</div>

@section('loginScript')
    @parent
    <script>
        $(function () {
            $('#loginForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $("#loginForm input").removeClass("is-invalid");
                $("#invalid-feedback-login").children("strong").text("");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('login') }}",
                    data: formData,
                    success: () => window.location.assign("{{ route('home') }}"),
                    error: (response) => {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "InputLogin").addClass("is-invalid");
                                $("#" + key + "ErrorLogin").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })
    </script>
@endsection
