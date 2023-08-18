@extends('layout/main_layout')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class ="text-center mb-4">Consulta Enfermagem</h3>
            <hr>

            <h5 class="text-left">{{$utente->nome}}</h5>

            <table class="table table-striped">
                <thead class= "thead-dark">
                    <tr>
                        <th>Peso (kg)</th>
                        <th>Altura (cm)</th>
                        <th>Glicose (mg/dL)</th>
                        <th>Fumador</th>
                        <th>PAS (mmHg)</th>
                        <th>PAD (mmHg)</th>
                        <th>Pressão Arterial</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        @foreach($consultas as $consulta)
                        <td>{{$consulta->peso}}</td>
                        <td>{{$consulta->altura}}</td>
                        <td>{{$consulta->glicose}}</td>
                        <td>{{$consulta->fumador}}</td>
                        <td>{{$consulta->pas}}</td>
                        <td>{{$consulta->pad}}</td>
                        <td>{{$consulta->pressao_arterial}}</td>
                        @endforeach
                    <tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
        <br>
        <h3 class ="text-center mb-4">Consulta Medicina</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                {{-- col-sm-2 offset-sm-2 --}}
                <table class="table table-bordered">
                <tbody>
                    <tr>
                    @foreach($consultasMedicas as $consultamedica)
                        <td><strong>Terapêutica</strong></td>
                        <td>{{$consultamedica->terapeutica}}</td>
                    </tr>
                    <tr>
                        <td><strong>Dosagem</strong></td>
                        <td>{{$consultamedica->dosagem}}</td>
                    </tr>
                    <tr>
                        <td><strong>Periodicidade</strong></td>
                        <td>{{$consultamedica->periodicidade}}</td>
                    </tr>
                        <td><strong>Comentários</strong></td>
                        <td>{{$consultamedica->comentarios}}</td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
            </div>    
        </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="form-group">
                <a href="{{ route('homeutente') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>





@endsection