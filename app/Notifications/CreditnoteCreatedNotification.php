<?php

namespace App\Notifications;

use App\creditnote;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Stockspro;

class CreditnoteCreatedNotification extends Notification
{
    use Queueable;

    public $creditnote;

    /*
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(creditnote $creditnote)
    {
        $this->creditnote = $creditnote;
    }

    /*
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }



    public function toTelegram($notifiable)
    {

        $url = url("/print-creditnote?pdf=1&refno={$this->creditnote->refno}");

        $invoices = json_encode($this->creditnote->creditnote_d->pluck('invno'));

        $clientname = Stockspro::getClientname($this->creditnote->clcode);

        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('-1001226410585')
            // Markdown supported.
            ->content("
            \n*Howdy Admin!*\n
            *New Creditnote Created*\n
            *RefNo:*{$this->creditnote->refno}\n
            *Date/Time:*{$this->creditnote->created_at}\n
            *CLient:*{$this->creditnote->clcode}\n
            *Name:*{$clientname}\n
            *Amount:*KES {$this->creditnote->amount}\n
            *Remark:*{$this->creditnote->remarks}\n
            *Invoice(s):* {$invoices}\n\n
            ")

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            ->button('VIEW CREDITNOTE', $url)
        // (Optional) Inline Button with callback. You can handle callback in your bot instance
        ->buttonWithCallback('APPROVE CREDITNOTE', 'creditnote_' . $this->creditnote->id);
    }



    public function toDatabase()
    {
        $url = url("/print-creditnote?pdf=1&refno={$this->creditnote->refno}");
        return [
            'clcode' => $this->creditnote->clcode,
            'Amount' => $this->creditnote->amount,
            'Date/Time' => $this->creditnote->created_at,
            'url' => $url,
            'status' => 'Waiting_Approval'
        ];
    }

    /*
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