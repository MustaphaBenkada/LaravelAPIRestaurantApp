@extends('layouts.app')

@section('content')
{{--<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->--}}

<div class="container">
    <div class="row">
        <div class="offset-md-1 col-md-10">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Nouveau Client</h4>
                    <p class="card-category">Créer un nouveau client</p>
                </div>
                <div class="card-body">

                    <form action="{{route('client.store')}}" method="post">
                        <!--generer les tokens, pour les cles publiques pour passer les données-->
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value="{{ old('last_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Prénom</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Numéro de Téléphone</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('pohne_number') }}" onblur="isExists()">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Wilaya</label>
                            <select name="id_state" id="id_state" class="selectpicker"
                                data-style="btn btn-primary btn-round" title="Wilaya" data-container="body" required="">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Commune</label>
                            <select name="id_town" id="id_town" class="selectpicker"
                                data-style="btn btn-primary btn-round" title="Commune" data-container="body" required="">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Registre de Commerce</label>
                            <input type="text" name="registre_commerce" class="form-control" value="{{ old('registre_commerce') }}">

                        </div>

                        <div class="form-group">
                            <label for="">Nom de l'Entreprise</label>
                            <input type="text" name="nom_entreprise" class="form-control" value="{{ old('nom_entreprise') }}">

                        </div>

                        <div class="form-group">
                            <input type="text" name="statut" class="form-control" value="{{ old('statut') }}" hidden>

                        </div>

                        <div class="form-group">

                            <input type="submit" value="Enregister" class="form-control btn btn-primary">
                        </div>
                        <div class="clearfix"></div>
                        <a href="{{ url()->previous() }}" class="btn btn-success pull-left"> Annuler</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

        @endsection
        @section('script')

        <script>
            $(document).ready(function () {
                var token = document.getElementsByName("_token").value;

                //alert(val);
                $("#id_state").change(function () {
                    $.ajax({
                        type: 'GET',
                        url: '/gettowns/' + $("#id_state").val(),
                        dataType: 'json',
                        //data:'id_state='+ $("#sender_state").val(),
                        headers: {
                            'X-CSRF-Token': token
                        },
                        // if you recive response from the back-end
                        success: function (data) {
                            console.log(data);
                            $("#id_town option").remove();
                            $("#id_town option").on("click", function function_name() {
                                alert("hh");
                            });
                            //$("#sender_town").append('<option value="">Town</option>')
                            $.each(data, function () {
                                $("#id_town").append('<option value="' + this.id +
                                    '">' + this.name + '</option>')
                            });
                            $('.selectpicker').selectpicker('refresh');

                        },

                        error: function (data) {
                            alert("State does not exist!!");
                        },
                    });
                });
            });

        </script>
        @endsection
