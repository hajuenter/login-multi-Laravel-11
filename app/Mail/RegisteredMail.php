<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredMail extends Mailable {
    use Queueable, SerializesModels;

    public $newUser;

    public function __construct($newUser) {
        $this->newUser = $newUser;
    }

    public function build() {
        return $this->markdown('emailpesan.registered_mail')->subject(config('app.name').', Registered Mail Password Set');
    }
}