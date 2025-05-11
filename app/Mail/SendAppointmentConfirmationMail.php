<?php

namespace App\Mail;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Treatment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

   /* public string $customer_name;
    public string $email;
    public string $phone_number;
    public $treatment_id;
    public $datetime;
    public $user_id;*/

    public $messageContent;
    /**
     * Create a new message instance.
     */
    public function __construct($messageContent)
    {
      /*
        $this->customer_name = $request->customer_name;
        $this->email = $request->email;
        $this->phone_number = $request->phone_number;
        $this->datetime = $request->date . '-' . $request->time;
        $this->treatment_id = $request->treatment_id;
        $this->user_id = $request->user_id;*/

        $this->messageContent = $messageContent;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //subject: "Bevestiging knipafspraak voor {$this->datetime}"
            subject: "test"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        
        //$treatment = Appointment::with("treatment")->find($this->treatment_id);
        //$user = Appointment::with("user")->find($this->user_id);

        return new Content(
           /* html: `Bedankt voor uw reservering via onze website. Hierbij bevestigen wij dat uw afspraak succesvol is ontvangen en ingepland.</p><br> "
            <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; font-family: Arial, sans-serif;">
     <thead>
       <tr>
         <th colspan="2">Reserveringsgegevens</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td><strong>Naam</strong></td>
         <td>{$this->customer_name}</td>
       </tr>
       <tr>
         <td><strong>Datum</strong></td>
         <td></td>
       </tr>
       <tr>
         <td><strong>Tijd</strong></td>
         <td></td>
       </tr>
       <tr>
         <td><strong>behandeling</strong></td>
         <td></td>
       </tr>
       <tr>
         <td><strong>kapper</strong></td>
         <td></td>
       </tr>
     </tbody>
   </table>`*/
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }

    public function build(){
      return $this->subject('Test Outlook Mail')
      ->view('emails');
      //return $this->view('emails'); 
    }
}
