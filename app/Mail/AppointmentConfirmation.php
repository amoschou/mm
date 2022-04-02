<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Use the HTML and TXT templates:

        return $this->subject('Your appointment details')
             ->cc($this->data->cc ?? null)
             ->view('emails.appointment-confirmation-html')
             ->text('emails.appointment-confirmation-txt')
             ->with([
                 'data' => $this->data,
                 'formattedDate' => Carbon::createFromFormat('Y-m-d', $data->date)->format('l, j F Y'),
             ]);

        // Or you might prefer to build the email in this style:
        //
        // $this->subject('Your appointment details');
        // if(! is_null($this->data->cc)) { $this->cc($this->data->Cc); }
        // $this->view('emails.appointment-confirmation-html')
        //     ->text('emails.appointment-confirmation-txt')
        //     ->with([
        //         'data' => $this->data,
        //         'formattedDate' => Carbon::createFromFormat('Y-m-d', $data->date)->format('l, j F Y'),
        //     ]);
        // return $this;

        // Or the Markdown template:
        //
        // return $this->markdown('emails.appointment-confirmation-md', [
        //     'data' => $this->data,
        //     'formattedDate' => Carbon::createFromFormat('Y-m-d', $data->date)->format('l, j F Y'),
        // ]);
    }
}
