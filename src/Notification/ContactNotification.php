<?php


namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactNotification
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(Contact $contact)
    { 
        $email = (new Email())
            ->from($contact->getEmail())
            ->to('geoffrey.gallot@gmail.com')
            ->subject('Demande de contact')
            ->text("je suis {$contact->getFirstname()} {$contact->getLastname()} de la sociétée {$contact->getSociety()} et je vous contact pour {$contact->getMotif()}, Mon email de contact est {$contact->getEmail()} et mon numero de telephone est {$contact->getPhone()}")
            ->html('')
        ;
    $this->mailer->send($email);
    }
}
