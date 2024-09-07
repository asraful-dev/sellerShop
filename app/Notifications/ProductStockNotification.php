<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductStockNotification extends Notification
{
    use Queueable;

    protected $product_stock_notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_stock_notification)
    {
        $this->product_stock_notification = $product_stock_notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'user_id'       => $this->product_stock_notification['user_id'],
            'amount'        => $this->product_stock_notification['amount'],
            'gateway'       => $this->product_stock_notification['gateway'],
            'created_at'    => $this->product_stock_notification['created_at']
        ];
    }
}
