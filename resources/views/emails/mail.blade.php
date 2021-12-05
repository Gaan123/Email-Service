@component('mail::message')
{{--# Introduction--}}

{!! $data['body'] !!}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
