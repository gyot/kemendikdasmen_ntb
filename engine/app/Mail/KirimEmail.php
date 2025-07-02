<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectEmail;
    public $isiEmail;
    public $lampiran;

    public function __construct($subjectEmail, $isiEmail, $lampiran = null)
    {
        $this->subjectEmail = $subjectEmail;
        $this->isiEmail = $isiEmail;
        $this->lampiran = $lampiran;
    }

    public function build()
    {
        $email = $this->subject($this->subjectEmail)
                      ->html($this->isiEmail);

        if ($this->lampiran && file_exists($this->lampiran)) {
            $email->attach($this->lampiran);
        }

        return $email;
    }
}
