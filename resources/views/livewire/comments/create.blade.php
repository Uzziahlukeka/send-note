<?php

use App\Models\Blog;
use Livewire\Volt\Component;

new class extends Component {
    //
    #[validate('require|longText')]
    public $comment;
    public $userId;
    public $blogId;

    public function save($id)
    {
        $this->blogId = Blog::where('id', $id)->first();

        auth()->user()->comments()->create([
            'blog_id'=>$this->blogId,
            'comment'=>$this->comment,
        ]);
    }
}; ?>

<div>
    <form wire:submit="submit()" class="space-y-6">
        <x-textarea label="Notes" placeholder="write your notes"/>

        <div class="flex justify-between">
            <x-button label="Save" right-icon="check" flat interaction:solid="positive"/>
            <x-button label="Cancel" right-icon="trash" outline hover="warning" focus:solid.gray/>
        </div>
    </form>
</div>
