<?php
namespace App\Mail;
use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class InquiryReceived extends Mailable
{
    use Queueable, SerializesModels;
    public ContactMessage $inquiry;
    public function __construct(ContactMessage $inquiry)
    {
        $this->inquiry = $inquiry;
    }
    public function build()
    {
        return $this->subject('New ' . ucfirst($this->inquiry->type) . ' Message: ' . $this->inquiry->subject)
            ->view('mail.inquiry');
    }
}