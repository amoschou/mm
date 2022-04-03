# How to do a 'Mail merge' with a Laravel app.

1. Install PHP and Composer
2. Create a Laravel application (https://laravel.com/docs/9.x/installation):

   `composer create-project laravel/laravel mm`
3. Edit `.env` and put in the `MAIL` environment variables:

   ```MAIL_MAILER=smtp
   MAIL_HOST=mailhog
   MAIL_PORT=1025
   MAIL_USERNAME=null
   MAIL_PASSWORD=null
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="hello@example.com"
   MAIL_FROM_NAME="${APP_NAME}"
   ```
4. Create the email class with Markdown template:

   `php artisan make:mail AppointmentConfirmation --markdown=emails.appointment-confirmation-md`
5. Define the CLI command

   `php artisan make:command SendAppointmentConfirmationEmail`
6. Edit the files as shown by:

   `https://github.com/amoschou/mm/compare/2a7bca9..0f2d910?diff=split`

7. From the terminal, run:

   `php artisan mail:send-appointment-confirmation`
   
   or
   
   `php artisan mail:send-appointment-confirmation --json=filename.json`.
