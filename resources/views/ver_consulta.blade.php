@extends('layout/main_layout')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class ="text-center mb-4">Consulta Enfermagem</h3>
            <hr>
            <h6>{{$utente->nome}}</h5>
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
                    @foreach ($consultas as $consulta)  
                        <tr>
                            <td>{{$consulta->peso}}</td>
                            <td>{{$consulta->altura}}</td>
                            <td>{{$consulta->glicose}}</td>
                            <td>{{$consulta->fumador}}</td>
                            <td>{{$consulta->pas}}</td>
                            <td>{{$consulta->pad}}</td>
                            <td>{{$consulta->pressao_arterial}}</td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{route('registar_medicina_submit')}}" method="post">
                @csrf
                <input type="hidden" name="id_consulta" value="{{$consulta->id}}">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <br>
                        <h3 class ="text-center mb-4">Medicina</h3>
                        <hr>
                        <div class="form-group">
                            <label for="text_edit_utente"><strong>Registar Consulta:</strong></label>       
                            <textarea rows="2" name="terapeutica" id="terapeutica" class="form-control" placeholder="terapêutica"></textarea>
                            <input type="text" name="dosagem" id="dosagem" class="form-control" placeholder="dosagem" value="{{old('dosagem')}}">
                            <input type="text" name="periodicidade" id="periodicidade" class="form-control" placeholder="periodicidade" value="{{old('periodicidade')}}">
                            <textarea rows="2" name="comentarios" id="comentarios" class="form-control" placeholder="comentários"></textarea>
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
@endsection