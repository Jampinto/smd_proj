@extends('layout/main_layout')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class ="text-center mb-4">Enfermagem</h3>
            <hr>
            <form action="{{route('registar_consulta_submit')}}" method="post">
                @csrf

                <input type="hidden" name="id_utente" value="{{$utente->id}}">

                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <div class="form-group">
                            <label for="text_edit_utente"><strong>Registar Consulta:</strong></label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="nome" value="{{$utente->nome}}" readonly>
                            <input type="number" name="peso" id="peso" class="form-control" placeholder="peso (kg)" value="{{old('peso')}}">
                            <input type="number" name="altura" id="altura" class="form-control" placeholder="altura (cm)" value="{{old('altura')}}">
                            <input type="number" name="glicose" id="glicose" class="form-control" placeholder="glicose (mg/dL)" value="{{old('glicose')}}">
                            <select class="custom-select" name="fumador" id="fumador" value="{{old('fumador')}}">
                                <option value=""disabled selected>Fumador:</option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                            <input type="number" name="pad" id="pad" class="form-control" placeholder="pad (mmHg)" value="{{old('pad')}}">
                            <input type="number" name="pas" id="pas" class="form-control" placeholder="pas (mmHg)" value="{{old('pas')}}">
                            <input type="text" name="pressaoarterial" id="pressaoarterial" class="form-control" placeholder="Pressão Arterial" readonly>  
                        </div>
                        <div class="form-group">
                            <a href="{{route('homeutente')}}" class="btn btn-secondary">Cancelar</a>
                            <input type="submit" value="Registar" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </form>
            @if($errors->any())
            <div class="alert alert-danger col-sm-4 offset-sm-4">
                <ul>
                    @foreach($errors->all() as $messages)
                    <li>{{$messages}}</li>
                     @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#pad, #pas').on('input', function() {
            var padValue = parseInt($('#pad').val());
            var pasValue = parseInt($('#pas').val());
            var pressaoarterialField = $('#pressaoarterial');

            if (padValue < 80 && pasValue < 120) {
                pressaoarterialField.val('Ótima');
            } else if ((padValue >= 80 && padValue <= 84) || (pasValue >= 120 && pasValue <= 129)) {
                pressaoarterialField.val('Normal');
            } else if ((padValue >= 85 && padValue <= 89) || (pasValue >= 130 && pasValue <= 139)) {
                pressaoarterialField.val('Normal-Alta(1)');
            } else if ((padValue >= 90 && padValue <= 99) || (pasValue >= 140 && pasValue <= 159)) {
                pressaoarterialField.val('HTA Grau I');
            } else if ((padValue >= 100 && padValue <= 109) || (pasValue >= 160 && pasValue <= 179)) {
                pressaoarterialField.val('HTA Grau II');
            } else if (padValue >= 110 || pasValue >= 180) {
                pressaoarterialField.val('HTA Grau III');
            } else if (padValue < 90 || pasValue >= 140) {
                pressaoarterialField.val('Hipertensão Sistólica isolada (2)');
            } else {
                pressaoarterialField.val('Valores inválidos');
            }
        });
    });
</script>

@endsection