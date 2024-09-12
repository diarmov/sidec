<?php

namespace App\Mail;

use App\Models\Bitacora;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DenunciaUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "SIDEC - Actualización de la denuncia";
    public $bitacora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bitacora $bitacora)
    {
        $this->bitacora = $bitacora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.denuncia-updated');
    }
}
