<?php

namespace App\Notifications;

use App\Models\Rv\ClubMemberOnboarding;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class RegisterMyAccountNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public ClubMemberOnboarding $onboarding)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $signedAction = URL::temporarySignedRoute(
            'onboard.invitation',
             now()->addHours(4),
             ['onboarding' => $this->onboarding->id]
        );

        return (new MailMessage)
                    ->subject('Registratie nieuw clublid.')
                    ->line('Beste ' . $this->onboarding->firstname . ' ' . $this->onboarding->lastname)
                    ->line('Je bent een nieuw RV Waarloos lid.')
                    ->line('Je afdeling is: ' . $this->onboarding->department->name)
                    ->line('')
                    ->line('Gelieve uw account te activeren via onderstaande link')
                    ->action('Registreer account', $signedAction)
                    ->line('Deze link blijft 48 uur geldig!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
