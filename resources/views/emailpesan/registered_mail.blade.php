@component('mail::message')

Halo, {{ $newUser->username }} . Tolong berikan password baru !!!
<p>Klik disini...</p>

@component('mail::button', ['url' => url('password_baru/'.$newUser->remember_token)])
Set New Password
@endcomponent

Terima Kasih
<br>
Copyright © 2024 Hajuenter.

@endcomponent