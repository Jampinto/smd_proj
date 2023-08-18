@extends('layout/main_layout')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class ="text-center mb-4">Registar Utente</h3>
            <hr>
            <form action="{{route('novo_utente_submit')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <div class="form-group">
                            <label for="text_novo_utente"><strong>Novo Utente:</strong></label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="nome" value="{{old('nome')}}">
                            <input type="text" name="morada" id="morada" class="form-control" placeholder="morada" value="{{old('morada')}}">
                            {{-- <input type="text" name="genero" id="genero" class="form-control" placeholder="genero" value="{{old('genero')}}"> --}}
                            {{-- <label for="select_genero">Género: </label> --}}
                            <select class="custom-select" name="genero" id="genero" value="{{old('genero')}}">
                                <option value=""disabled selected>Selecione o género:</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}">
                            <input type="number" name="nutente" id="nutente" class="form-control" placeholder="n.º utente" value="{{old('nutente')}}">
                        </div>
                        <div class="form-group">
                            <a href="{{route('homeutente')}}" class="btn btn-secondary">Cancelar</a>
                            <input type="submit" value="Guardar" class="btn btn-primary">
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
            {{-- "invalid-feedback col-sm-4 offset-sm-4"
            alert alert-danger --}}
        </div>
    </div>
</div>

@endsection