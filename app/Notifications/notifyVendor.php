<?php

namespace App\Notifications;

use App\Models\vendors\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifyVendor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $data;
    public function __construct(Vendor $vendor)
    {
        $this->data = $vendor;
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
        $subject = sprintf('%s: لقد تم انشاء حسابكم في شركة البنا %s!', config('app.name'), 'Eslam');
        $greeting = sprintf('مرحبا %s!', $notifiable->name);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->salutation('تحياتي اسلام البنا')
            ->line('بسم الله الرحمن الرحيم')
            ->action('التأكيد', url('/'))
            ->line('شكرا لتسجيلكم في شركة البنا')
            ->line('يرجي الرجوع الي المقر الرئيسي للشركة في مدينة طنطا');

        }



    // ->subject($subject)
    // ->greeting($greeting)
    // ->salutation('تحياتي اسلام البنا')
    // ->line('The introduction to the notification.')
    // ->action('Notification Action', url('/'))
    // ->line('شكرا لتسجيلكم في شركة البنا');


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
