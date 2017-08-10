@component('mail::message')
# Introduction

Thank for registering.

@component('mail::button', ['url' => 'https://laracasts.com/series/laravel-from-scratch-2017'])
Start learning today!
@endcomponent

@component('mail::panel', ['url' => ''])
    Some inspirational text here.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
