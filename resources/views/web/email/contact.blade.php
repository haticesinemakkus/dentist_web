@component('mail::message')
# Websitenizden iletişim formu üzerinden mesaj aldınız.

Adı Soyadı {{$data['name']}},<br>
Email Adresi {{$data['email1']}},<br>
Telefon Numarası {{$data['phone']}},<br>
Mesajı {{$data['message1']}},<br>



{{ config('app.name') }}
@endcomponent