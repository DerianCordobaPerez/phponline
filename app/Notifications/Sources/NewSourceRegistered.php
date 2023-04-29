<?php

declare(strict_types=1);

namespace App\Notifications\Sources;

use App\Http\Payloads\Web\Sources\SourcePayload;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class NewSourceRegistered extends Notification
{
    use Queueable;

    public function __construct(
        public readonly SourcePayload $source,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('PHPOnline - Source Added')
            ->line('Congratulations!')
            ->line('You have submitted your RSS Source to PHPOnline.')
            ->line("Your source, {$this->source->name} is being checked to ensure it meets community guidelines.")
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
