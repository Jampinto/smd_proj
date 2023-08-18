@extends('layout/main_layout')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class ="text-center mb-4">Editar Utente</h3>
            <hr>
            <form action="{{route('edit_utente_submit')}}" method="post">
                @csrf

                <input type="hidden" name="id_utente" value="{{$utente->id}}">

                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <div class="form-group">
                            <label for="text_edit_utente"><strong>Editar Utente:</strong></label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="nome" value="{{$utente->nome}}">
                            <input type="text" name="morada" id="morada" class="form-control" placeholder="morada" value="{{$utente->morada}}">
                            <input type="text" name="genero" id="genero" class="form-control" placeholder="genero" value="{{$utente->genero}}">
                            <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{$utente->email}}">
                            <input type="number" name="nutente" id="nutente" class="form-control" placeholder="n.º utente" value="{{$utente->nutente}}">
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