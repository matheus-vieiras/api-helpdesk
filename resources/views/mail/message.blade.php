<h2>Olá {{$data['nome']}}, houve uma atualização no seu ticket.</h2>

{{--@component('mail::button', ['url' => 'https://melibox.com.br'])--}}
{{--    Confira lá!!!--}}
{{--@endcomponent--}}

<p><strong>NOME: </strong> {{$data['nome']}}</p>
<p><strong>EMAIL: </strong> {{$data['email']}}</p>
<p><strong>MENSAGEM: </strong> {{$data['mensagem']}}</p>
