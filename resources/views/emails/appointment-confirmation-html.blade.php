<h1>Appointment confirmation</h1>
<p>Dear {{ $data->name }},</p>
<p>Your appointment details are as follows:</p>
<ul>
    <li>Date: {{ $formattedDate }}</li>
    <li>Venue: {{ $data->venue ?? 'TBC' }}</li>
</ul>
<p>Kind regards,<br>
{{ config('app.name') }}</p>
