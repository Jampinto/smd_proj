@extends('layout/main_layout')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br>
            <h3 class = "mb-4">Lista de Utentes</h3>
            <hr>
            <div class="my-2">
                <a href="{{route('novo_utente')}}" class="btn btn-secondary">Registar utente</a>
                <hr>

                @if ($utentes->count() === 0)

                <p>Não existem utentes</p>
                    
                @else

                    <table class="table table-striped">
                        <thead class= "thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Morada</th>
                                <th>Email</th>
                                <th>N.º utente</th>
                                <th>Ações</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($utentes as $utente)
                                <tr>
                                    <td>{{$utente->nome}}</td>
                                    <td>{{$utente->morada}}</td>
                                    <td>{{$utente->email}}</td>
                                    <td>{{$utente->nutente}}</td>
                                    <td style="width: 15%">
                                        @if($utente->consultas->isNotEmpty())
                                            @php
                                                $temConsultasMedicas = false;
                                            @endphp
                                            @foreach($utente->consultas as $consulta)
                                                @if($consulta->consultas_medicas->isNotEmpty())
                                                    @php
                                                        $temConsultasMedicas = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach
                                    
                                            @if ($temConsultasMedicas)
                                                <a href="{{route('registar_consulta', $utente->id)}}" class="btn btn-outline-success btn-sm">
                                                    <i class="fa-solid fa-square-check"></i>
                                                </a>
                                                <a href="{{route('envio_emails', $utente->id)}}" class="btn btn-outline-success btn-sm" id="enviarEmail">
                                                    <i class="fa-regular fa-envelope"></i>
                                                </a>
                                            @else
                                                <a href="{{route('registar_consulta', $utente->id)}}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fa-solid fa-house-medical-circle-check fa-beat-fade" style="color: #3d6eff;"></i>
                                                </a>
                                            @endif
                                            @else
                                            <a href="{{route('registar_consulta', ['id' => $utente->id])}}" class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-eye fa-beat-fade" title="Registar consulta"></i>
                                            </a>  
                                        @endif

                                        <a href="{{route('edit_utente', ['id' => $utente->id])}}" class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-pencil" title="Editar"></i>
                                        </a>
                                        
                                        <form action="{{route('delete_utente', $utente->id)}}" method="post" style="display: inline-block;">                                              
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa solid fa-trash-can" title="Apagar"></i></button> 
                                            @method('delete')
                                            @csrf
                                        </form>
                                                           
                                    </td>
                                </tr>
                            @endforeach
                            {{-- @foreach ($utentes as $utente)  
                                <tr>
                                    <td>{{$utente->nome}}</td>
                                    <td>{{$utente->morada}}</td>
                                    <td>{{$utente->email}}</td>
                                    <td> {{$utente->nutente}}</td>
                                    <td style="width: 15%">
                                        @if($utente->consultas->isNotEmpty())
                                            <a href="{{route('registar_consulta', $utente->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-list" title="Exibir consulta"></i>
                                            </a>
                                            @foreach($utente->consultas as $consulta)
                                            @if($consulta->consultas_medicas->isNotEmpty())
                                                <a href="{{route('registar_consulta', $utente->id)}}" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </a>
                                                @endif
                                            @endforeach
                                        @else
                                            <a href="{{route('registar_consulta', $utente->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" title="Registar consulta"></i>
                                            </a>  
                                        @endif
                                            <form action="{{route('delete_utente', $utente->id)}}" method="post" style="display: inline-block;">                                              
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa solid fa-trash-can" title="Apagar"></i></button> 
                                                @method('delete')
                                                @csrf
                                            </form>
                                        @foreach($utente->consultas as $consulta)
                                        <a href="{{route('ver_consulta', $utente->id)}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-wand-magic-sparkles"></i></i></a>
                                        @endforeach
                                        <a href="{{route('edit_utente', ['id' => $utente->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" title="Editar"></i></a>
                                    </td>
                                    
                                </tr> 
                            @endforeach --}}
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        <p>Total: <strong>{{$utente->count()}}</strong></p>
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>

@endsection




