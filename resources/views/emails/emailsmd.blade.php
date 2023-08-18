<h3>Olá, <strong>{{$utente->nome}}</strong></h3>
<hr>

<p>Dados do Rastreio:</p>  

<h4>UTENTE:</h6>
<p>Nome: {{$utente->nome}}</p>
<p>Morada: {{$utente->morada}}</p>
<p>Género: {{$utente->genero}}</p>
<p>Email: {{$utente->email}}</p>
<p>N.º Utente: {{$utente->nutente}}</p>
<br>
<h4>CONSULTA DE ENFERMAGEM:</h6>
@foreach ($consultas as $consulta)
<p>Data: {{$consulta->created_at}}</p>
<p>Peso: {{$consulta->peso}} kg</p>
<p>Altura: {{$consulta->altura}} cm</p>
<p>Glicose: {{$consulta->glicose}} mg/dL</p>
<p>Fumador: {{$consulta->fumador}}</p>
<p>PAD: {{$consulta->pad}} mmHg</p>
<p>PAS: {{$consulta->pas}} mmHg</p>
<p>Pressão Arterial: {{$consulta->pressao_arterial}}</p>
@endforeach
<br>
<h4>CONSULTA DE MEDICINA:</h6>
@foreach ($consultasMedicas as $consultaMedica)
<p>Terapêutica: {{$consultaMedica->terapeutica}}</p>
<p>Dosagem: {{$consultaMedica->dosagem}}</p>
<p>Periodicidade: {{$consultaMedica->periodicidade}}</p>
<p>Comentários: {{$consultaMedica->comentarios}}</p>
@endforeach


<br>
<hr>
<p><i>Saúde Menos Distante</i></p>
