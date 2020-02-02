@component('mail::message')
# Introduction

Reset password blood bank

@component('mail::button', ['url' => ''])
Reset Password

    <p>Welcome {{ $code->name }}</p>
@endcomponent


<p> your code is:  {{$code->pin_code}} </p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
