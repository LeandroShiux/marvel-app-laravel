@component('mail::message')
    <img src="{{ url('images/ironhelmet.png') }}" alt="Helmet" width="55" style="margin-left:220px;">
    <h4 style="margin-top:50px;">Email de verificação.</h4>
    <p>Olá,seja muito bem vindo a nossa plataforma.</p>
    <p>Clique no botão para validar seu cadastro,você será redirecionado após a verificação.</p>
@component('mail::button', ['url' => url("/verify/email/{$user_id}/{$verified_token}"),'color'=>'error'])
    Confirmar
@endcomponent
    <p>Até breve!</p>
@endcomponent
