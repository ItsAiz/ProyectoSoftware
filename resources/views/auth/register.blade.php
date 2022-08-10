@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('client/store') }}">
                            @csrf

                            <div class="form-group row mt-2">
                                <label for="nameInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="nameInput" type="text" class="custom-form form-control" name="name"
                                           value="{{ old('name') }}"
                                           autocomplete="name" autofocus>

                                    <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="lastNameInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="lastNameInput" type="text" class="custom-form form-control"
                                           name="lastName" value="{{ old('lastNameInput') }}"
                                           autocomplete="lastName" autofocus>

                                    <span class="invalid-feedback" role="alert" id="lastNameError">
                                <strong></strong>
                            </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="documentTypeInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Tipo documento') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select form-control" id="documentType" name="documentType"
                                            required="required">
                                        <option
                                            value="Cedula de ciudadania"{{'documentType' == "Cedula de ciudadania"? 'selected': ''}}>
                                            Cédula de ciudadania
                                        </option>
                                        <option
                                            value="Cedula de extranjeria"{{'documentType' == "Cedula de extranjeria"? 'selected': ''}}>
                                            Cédula de extranjería
                                        </option>
                                        <option value="NIT"{{'documentType' == "NIT"? 'selected': ''}}>NIT</option>
                                    </select>

                                    <span class="invalid-feedback" role="alert" id="documentTypeError">
                                <strong></strong>
                            </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="lastNameInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Documento') }}</label>

                                <div class="col-md-6">
                                    <input id="documentNumberInput" type="number" class="custom-form form-control"
                                           name="documentNumber" value="{{ old('documentNumber') }}"
                                           autocomplete="documentNumber" autofocus>

                                    <span class="invalid-feedback" role="alert" id="documentNumberError">
                                <strong></strong>
                            </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="emailInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="emailInput" type="email" class="custom-form form-control" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>

                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="passwordInput"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="passwordInput" type="password" class="custom-form form-control"
                                           name="password" required
                                           autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="password-confirm"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="custom-form form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Submit button div-->
                            <div class="row mt-4 mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
