<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;


class VenueBookingRequested extends Notification
{
    use Queueable;

    public Booking $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
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
        return (new MailMessage)
            ->subject('New Venue Booking Request')
            ->greeting('Hello Admin!')
            ->line($this->booking->user->name . ' has requested a ' . $this->booking->venue->name . ' venue booking on ' . Carbon::parse($this->booking->start_date)->format('M d, Y') . '.')
            ->line('Reason: ' . $this->booking->reason)
            ->action('View Booking', url('/bookings'))
            ->line('Please assign someone to check this booking and create event!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'Venue Booking Request',
            'message' =>  $this->booking->user->name . ' has requested a ' . $this->booking->venue->name . ' venue booking on ' . Carbon::parse($this->booking->start_date)->format('M d, Y') . '.',
            'date' => Carbon::parse($this->booking->created_at)->format('Y-m-d H:i'),
        ];
    }
}
