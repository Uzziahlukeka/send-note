<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <form class="space-y-6"     >
        <x-textarea label="Notes" placeholder="write your notes" />


        <x-button label="Save" right-icon="check" flat interaction:solid="positive" />
        <x-button label="Cancel" right-icon="trash" outline hover="warning" focus:solid.gray />
    </form>
</div>
