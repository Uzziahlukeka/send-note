<?php

use App\Enums\BlogCategoryEnum;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    #[Validate('required|string|min:6')]
    public $titleBlog;
    public $bodyBlog;
    private $authorBlog;
    public $categoryBlog;
    public $photoBlog;
    public $postBlog = false;

    public function rules()
    {
        return [
            'bodyBlog' => 'required|string|min:20',
            'categoryBlog' => 'required|string|in:' . implode(',', BlogCategoryEnum::options()),
            'photoBlog' => 'required|file|max:5120',
            'postBlog' => 'required|bool',
        ];
    }

    public function submit()
    {
        $this->validate();
        $this->authorBlog = Auth::user()->name;
        $photoPath = $this->photoBlog->store('Photos/Blogs','public');
        Blog::create([
            'title' => $this->titleBlog,
            'body' => $this->bodyBlog,
            'author' => $this->authorBlog,
            'categories'=>$this->categoryBlog,
            'photo' => $photoPath,
            'posted' => $this->postBlog,
        ]);

        $this->reset();

        // Handle blog submission logic
    }
};

?>

<div>
    <form wire:submit="submit" class="space-y-6">

        <x-input type="file"
                 wire:model="photoBlog"
                 label="Image"
                 description="describing your blog"/>
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

