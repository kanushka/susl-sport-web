<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use Illuminate\Support\Str;


class EventPublished extends Notification
{
    use Queueable;

    public Event $event;

    /**
     * Create a new notification instance.
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $sport = $this->event->sport->name;

        return (new MailMessage)
            ->subject('New ' . $sport . ' Event')
            ->line('Time to play and watch!, We have published a new ' . $sport . ' event on ' . Carbon::parse($this->event->start_date)->format('M d, Y'))
            ->line($this->event->name)
            ->line($this->event->description)
            ->action('View Event', url('/sports', Str::snake($sport)))
            ->line('Thank you for using SUSL Sport!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'New ' . $this->event->sport->name . ' Event',
            'message' =>  $this->event->name . ' event is on ' . Carbon::parse($this->event->start_date)->format('M d, Y') . ' at ' . $this->event->venue->name . '.',
            'date' => Carbon::parse($this->event->created_at)->format('Y-m-d H:i'),
        ];
    }
}
