<?php

use Livewire\Volt\Component;

new class extends Component {
    //
    public function with()
    {
        return [
            'notes'=>\App\Models\Note::orderBy('send_date','asc')->get(),
        ];
    }
}; ?>

<div>
    Hi there !
    <div class="space-y-2 ">
        <div class="grid grid-cols-2 gap-4 mt-12">
            @foreach($notes as $note )
                <x-card wire:key="{{ $note->id }}">
                    <div class="flex justify-between">
                        <a href="#" class="text-xl font-bold hover:underline hover:text-blue-500">
                            {{ $note->title }}
                        </a>
                        <div class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($note->send_date)->format('d-M-Y') }}
                        </div>
                    </div>
                    <div class="flex items-end justify-between mt-4 space-x-1">
                        <p class="text-xs">
                            Recipient:
                            <span class="font-semibold">
                                let's see
                            </span>
                        </p>
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>

</div>