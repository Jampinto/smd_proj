<div class = "container-fluid bg-dark text-white">
    <div class ="row">
        <div class="col-6 p-3"><b><em>Saúde menos distante</em></b></div>
        <div class="col-6 text-right p-3">{{session('email')['usuario']}} | <a href="{{route('logout')}}">Logout</a>  |    <span style="font-size: 0.8em;" id="data-hora"></span></div>
    </div>
</div>

<script>
    function atualizarDataHora() {
        const elementoDataHora = document.getElementById('data-hora');
        const agora = new Date();
        
        const ano = agora.getFullYear();
        const mes = (agora.getMonth() + 1).toString().padStart(2, '0');
        const dia = agora.getDate().toString().padStart(2, '0');
        
        const horas = agora.getHours().toString().padStart(2, '0');
        const minutos = agora.getMinutes().toString().padStart(2, '0');
        const segundos = agora.getSeconds().toString().padStart(2, '0');
        
        const dataHoraFormatada = `${dia}/${mes}/${ano}, ${horas}:${minutos}:${segundos}`;
        elementoDataHora.textContent = dataHoraFormatada;
    }

    atualizarDataHora();
    setInterval(atualizarDataHora, 1000); // Atualiza a cada segundo
</script>