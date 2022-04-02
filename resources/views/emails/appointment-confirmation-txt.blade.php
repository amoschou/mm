APPOINTMENT CONFIRMATION

Dear {{ $data->name }},

Your appointment details are as follows:

- Date: {{ $formattedDate }}
- Venue: {{ $data->venue ?? 'TBC' }}

Kind regards,
{{ config('app.name') }}
