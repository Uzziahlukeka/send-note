<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Note $note)
    {
        //

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $noteUrl = config('app.url') . '/notes/' . $this->note->id;
        $noteSender = $this->note->user->email;
        $noteRecipient = $this->note->recipient;
        $noteUserName = $this->note->user->name;

        $emailContent = "Hello, you have received a new note. View it here: $noteUrl";

        Mail::raw($emailContent, function ($message) use ($noteSender, $noteRecipient, $noteUserName) {
            $message->from($noteSender, 'The Sendnotes App')
                ->to($noteRecipient)
                ->subject("You have a new note from $noteUserName");
        });
    }
}
