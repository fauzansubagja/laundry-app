<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TransaksiBaruNotification extends Notification
{
    private $transaksi;

    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/transaksi/' . $this->transaksi->id);

        return (new MailMessage)
            ->line('Ada transaksi baru.')
            ->action('Lihat transaksi', $url)
            ->line('Terima kasih telah menggunakan layanan kami!');
    }
}
