# Appointment confirmation

Dear {{ $data->name }},

Your appointment details are as follows:

* Date: {{ $formattedDate }}
* Venue: {{ $data->venue ?? 'TBC' }}

Kind regards,<br>
{{ config('app.name') }}
