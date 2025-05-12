<?php

namespace App\Mail;

use App\Models\Treatment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $customer_name;
    public string $email;
    public string $phone_number;
    public string $appointment_date;
    public int $treatment_id;
    public int $user_id;

    /**
     * Create a new message instance.
     */
    public function __construct($request)
    {
        $this->customer_name = $request->customer_name;
        $this->email = $request->email;
        $this->phone_number = $request->phone_number;
        $this->appointment_date = $request->date . ' ' . $request->time;
        $this->treatment_id = $request->treatment_id;
        $this->user_id = $request->user_id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Bevestiging knipafspraak op {$this->appointment_date}"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        [$date, $time] = explode(" ", $this->appointment_date);
        $treatment = Treatment::findOrFail($this->treatment_id);
        $barber = User::findOrFail($this->user_id);
        
        return new Content(
            view: "emails",
            with: [
                "customer_name" => $this->customer_name,
                "email" => $this->email,
                "phone_number" => $this->phone_number,
                "date" => $date,
                "time" => $time,
                "treatment" => $treatment->name,
                "barber" => $barber->name
            ]

        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
