<?php

use App\Models\Note;
use Livewire\Volt\Component;

new class extends Component {
    //

    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete',$note);
        $note->delete();
    }

    public function with()
    {
        return [
            'notes' => Note::orderBy('send_date', 'asc')->get(),
        ];
    }
}; ?>

<div>
    Hi there !
    <div class="space-y-2 ">

        @if($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No notes yet</p>
                <p class="text-sm ">Let's create your first note to send</p>
                <x-button primary icon-right="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>
                    Create note
                </x-button>
            </div>

        @else
            <x-button primary icon-right="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>
                Create note
            </x-button>
            <div class="grid grid-cols-2 gap-4 mt-12">
                @foreach($notes as $note )
                    <x-card wire:key="{{ $note->id }}" class="mt-4">
                        <div class="flex justify-between">
                            <div>
                                <a href="{{ route('notes.edit',$note) }}" wire:navigate class="text-xl font-bold hover:underline hover:text-blue-500">
                                    {{ $note->title }}
                                </a>
                                <p>
                                    {{ Str::limit($note->body,50) }}
                                </p>
                            </div>


                            <div class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($note->send_date)->format('d-M-Y') }}
                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">
                                Recipient:
                                <span class="font-semibold">
                                {{$note->recipient}}
                            </span>
                            </p>
                        </div>
                        <div>
                            <x-mini-button rounded white icon="eye"></x-mini-button>
                            <x-mini-button  wire:click="delete('{{$note->id}}')" rounded icon="trash" flat gray interaction="negative"  />
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>

</div>
