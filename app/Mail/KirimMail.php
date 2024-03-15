<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class KirimMail extends Mailable
{
    use Queueable, SerializesModels;
 
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $nama,$email;

    public function __construct($nama,$email)
    {
        $this->nama = $nama;
        $this->email = $email;

    }
    
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')    
                    ->view('kirim_email')
                    ->with(
                        [
                            'nama' => $this->nama, 
                            'email' => $this->email, 
                            
                        ]
                    );
    }

}

