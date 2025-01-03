<?php

use App\Enums\BlogCategoryEnum;
use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    #[Validate('required|string|min:6')]
    public $titleBlog;
    public $bodyBlog;
    public $categoryBlog;
    public $photoBlog; // For file input
    public $currentPhoto; // For displaying the current photo
    public $postBlog = false;

    public function rules()
    {
        return [
            'bodyBlog' => 'required|string|min:20',
            'categoryBlog' => 'required|string|in:' . implode(',', BlogCategoryEnum::options()),
            'photoBlog' => 'nullable|file|image|max:5120', // Allow nullable if no new photo is uploaded
            'postBlog' => 'required|bool',
        ];
    }

    public function mount(Blog $blog)
    {
        $this->fill($blog);
        $this->currentPhoto = $blog->photo; // Store the current photo path
        $this->titleBlog = $blog->title;
        $this->bodyBlog = $blog->body;
        $this->categoryBlog = $blog->categories;
        $this->postBlog = $blog->posted;
    }

    public function save()
    {
        $this->validate();

        if ($this->photoBlog && $this->currentPhoto) {
            // Delete the old photo from storage
            \Storage::disk('public')->delete($this->currentPhoto);
        }

        $photoPath = $this->photoBlog
            ? $this->photoBlog->store('Photos/Blogs', 'public')
            : $this->currentPhoto; // Retain the existing photo if no new one is uploaded

        Blog::update([
            'title' => $this->titleBlog,
            'body' => $this->bodyBlog,
            'categories' => $this->categoryBlog,
            'photo' => $photoPath,
            'posted' => $this->postBlog,
        ]);

        $this->currentPhoto = $photoPath;
    }
};
?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Update blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg">
            <form wire:submit="save()" class="space-y-6">

                <!-- Image Upload with Preview -->
                <x-input type="file"
                         wire:model="photoBlog"
                         label="Image"
                         description="Describing your blog"/>

                <!-- Preview of Current or Uploaded Image -->
                <div class="mt-4">
                    @if($photoBlog)
                        <img src="{{ $photoBlog->temporaryUrl() }}" alt="Preview of uploaded photo"
                             class="w-32 h-32 rounded-md">
                    @elseif($currentPhoto)
                        <img src="{{ Storage::url($currentPhoto) }}" alt="Current photo" class="w-32 h-32 rounded-md">
                    @endif
                </div>

                <x-input wire:model="titleBlog"
                         label="Title"
                         placeholder="The title of your blog"
                         description="e.g., Why Laravel?"/>

                <x-textarea wire:model="bodyBlog"
                            label="Description"
                            placeholder="This is the content of your blog"
                            description="Explain your title">
                </x-textarea>

                <x-select wire:model="categoryBlog"
                          label="Select Category"
                          placeholder="Select a category"
                          :options="BlogCategoryEnum::options()"
                          description="The topic area"
                />

                <x-toggle wire:model="postBlog" id="label" label="Post it" name="toggle"/>
                <x-button type="submit" positive right-icon="check" spinner class="mt-4">
                    Save the blog
                </x-button>
                <x-errors/>
            </form>
        </div>
    </div>
</div>
