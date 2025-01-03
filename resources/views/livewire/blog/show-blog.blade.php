<?php

use App\Models\Blog;
use Livewire\Volt\Component;

new class extends Component {
    //
    public $blogId ;

    public function with()
    {
        return [
            'blog'=>Blog::where('id',$this->blogId)
                ->first(),
        ];
    }

};


?>

<div class="bg-gray-50 max-w-5xl mt-4">
    <x-card>
        <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
            <!-- Image Slot -->
            <div class="w-full h-64 bg-gray-200 rounded-lg overflow-hidden mb-6">
                <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Photo" class="w-full h-full object-cover rounded-t-lg">
            </div>
            <div class="flex justify-between">
                <h1 class="text-5xl font-extrabold text-gray-800">{{ $blog->title }}</h1>
                <p class="mt-4 text-sm text-gray-500">
                    <x-badge info label="{{ $blog->categories}}" />
                </p>
            </div>

            <p class="mt-4 text-sm text-gray-500">
                Posted {{ \Carbon\Carbon::parse($blog->created_at)->format('D, d M Y') }} -
                <a href="#" class="text-blue-600 hover:underline">À Propos</a> -
                By <span class="font-semibold">{{ $blog->author }}</span> -
                <a href="#" class="text-blue-600 hover:underline">Proposer une correction</a>
            </p>
            <div class="mt-6">
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $blog->body }}
                </p>
            </div>
            <div>
                <livewire:comments.index :blogId="$blog->id" />
            </div>
            <div class="mt-4">
                <livewire:comments.create :blogId="$blog->id" />
            </div>

        </div>
    </x-card>

</div>


