<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;

class SendAppointmentConfirmationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-appointment-confirmation {--json=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends the appointment confirmation emails';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->getData() as $label => $data) {
            Mail::to($data->to)->send(new AppointmentConfirmation($data));

            $this->info("Done {$label}.");
        }

        return 0;
    }
    
    /**
     * Get the data to iterate over. Edit this. In some applications, this
     * could be collected from the database, or from a JSON/CSV file, or
     * another method
     *
     * @return array
     */
    private function getData()
    {
        // If the json option is provided, return data from the json file.

        $jsonFile = $this->option('json');

        if($jsonFile) {
            return json_decode(file_get_contents($jsonFile), true);
        }

        // Or return this hard coded data.

        return [
            'a' => (object) [
                'to' => [
                    'a1@example.com',
                    'a2@example.com',
                ],
                'cc' => [
                    'cc1@example.com',
                    'cc2@example.com'
                ],
                'name' => 'Archibald',
                'date' => '2022-01-02',
                'venue' => 'Room 12',
            ],
            'b' => (object) [
                'to' => 'b@example.com',
                'name' => 'Bartholomew',
                'date' => '2022-03-14',
            ],
        ];
    }
}
