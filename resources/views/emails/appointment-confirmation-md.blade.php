# Appointment confirmation

Dear {{ $data->name }},

Your appointment details are as follows:

* Date: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('l, j F Y') }}
* Venue: {{ $data->venue ?? 'TBC' }}

Kind regards,<br>
{{ config('app.name') }}
