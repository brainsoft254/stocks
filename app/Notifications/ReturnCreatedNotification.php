<?php

namespace App\Notifications;

use App\sreturn;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Stockspro;

class ReturnCreatedNotification extends Notification
{
    use Queueable;
    public $return;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(sreturn $return)
    {
        $this->return = $return;
    }

    /**
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

        try {
            //code...

            $url = url("/print-creditnote?pdf=1&refno={$this->return->refno}");
        //dd($url);

        //$items = json_encode($this->return->return_details->pluck('icode', 'qty'));

        $clientname = Stockspro::getClientname($this->return->clcode);

        return TelegramMessage::create()
                // Optional recipient user id.
                ->to('-1001226410585')
            // Markdown supported.
            ->content("
            \n*Howdy Admin!*\n
            *New Return-Creditnote Created*\n
            *RefNo:*{$this->return->refno}\n
            *Date/Time:*{$this->return->created_at}\n
            *CLient:*{$this->return->clcode}\n
            *Name:*{$clientname}\n
            *Amount:*KES {$this->return->amount}\n
            *Remark:*{$this->return->remarks}\n
            ")
                //*Item(s)=>Qty:* {$items}\n\n

                // (Optional) Blade template for the content.
                // ->view('notification', ['url' => $url])

                // (Optional) Inline Buttons
                ->button('VIEW RETURN', $url)
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            ->buttonWithCallback('APPROVE RETURN-CREDITNOTE', 'returns_' . $this->return->id);
        } catch (\Exception $ex) {
            dd($ex);
        }
    }



    public function toDatabase()
    {
        $url = url("/print-creditnote?pdf=1&refno={$this->return->refno}");
        return [
            'clcode' => $this->return->clcode,
            'Amount' => $this->return->amount,
            'Date/Time' => $this->return->created_at,
            'url' => $url,
            'status' => 'Waiting_Approval'
        ];
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