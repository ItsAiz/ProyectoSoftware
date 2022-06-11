<!-- Modal -->
<div class="modal fade text-white" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">

                <!-- Inicio -->

                <form method="POST" id="registerForm">
                    @csrf

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                autocomplete="name" autofocus>

                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastNameInput" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="lastNameInput" type="text" class="form-control" name="lastName" value="{{ old('lastNameInput') }}"
                                   autocomplete="lastName" autofocus>

                            <span class="invalid-feedback" role="alert" id="lastNameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="documentTypeInput" class="col-md-4 col-form-label text-md-right">{{ __('documentType') }}</label>

                        <div class="col-md-6">
                                <select class="form-control" id="documentType" name="documentType" required="required">
                                    <option>----Seleccione----</option>
                                    <option value="Cedula de ciudadania"{{'documentType' == "Cedula de ciudadania"? 'selected': ''}}>Cédula de ciudadania</option>
                                    <option value="Cedula de extranjeria"{{'documentType' == "Cedula de extranjeria"? 'selected': ''}}>Cédula de extranjería</option>
                                    <option value="NIT"{{'documentType' == "NIT"? 'selected': ''}}>NIT</option>
                                </select>

                            <span class="invalid-feedback" role="alert" id="documentTypeError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastNameInput" class="col-md-4 col-form-label text-md-right">{{ __('Document Number') }}</label>

                        <div class="col-md-6">
                            <input id="documentNumberInput" type="number" class="form-control" name="documentNumber" value="{{ old('documentNumber') }}"
                                   autocomplete="documentNumber" autofocus>

                            <span class="invalid-feedback" role="alert" id="documentNumberError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailInput"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordInput"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="passwordInput" type="password" class="form-control" name="password" required
                                autocomplete="new-password">

                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-3 offset-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Fin -->

            </div>
        </div>
    </div>
</div>

@section('registerScript')
<script>
$(function() {
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $("#registerForm input").removeClass("is-invalid");
        $(".invalid-feedback").children("strong").text("");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ route('home') }}"),
            error: (response) => {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
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
