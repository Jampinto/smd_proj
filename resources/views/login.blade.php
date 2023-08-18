@extends('layout/login_layout')

@section('conteudo')


<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <!-- form -->
            <form action="{{route('login_submit')}}" method="post">
                @csrf
                <h4>LOGIN</h4>
                <hr>
                <div class="form-group">
                    <label>Usuário:</label>
                    <br>
                    <input type="email" name="text_usuario" class="form-control ">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <br>
                    <input type="password" name="text_senha" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Entrar" class="btn btn-primary">
                </div>
            </form>
            <!-- /form -->

            <!-- {{-- erros de validação --}} -->
            @if($errors->any())
            <div class = "alert alert-danger">
                <ul>
                    @foreach($errors->all() as $messages)
                    <li>{{$messages}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- {{-- erros de login --}} -->
            @if (isset($erro))
                @foreach ($erro as $mensagem_erro)
                <div class="alert alert-danger text-center">{{$mensagem_erro}}</div>
                @endforeach
            @endif



        </div>
    </div>
</div>


@endsection