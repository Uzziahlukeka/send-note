<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Have a New Note</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans leading-relaxed">

<div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10">
    <!-- Header Section -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-900">You have a new note from {{ $noteUserName }}</h1>
    </div>

    <!-- Body Section -->
    <div class="mb-6">
        <p class="text-lg text-gray-700 leading-relaxed">{{ $noteContent }}</p>
    </div>

    <!-- Button Section -->
    <div class="text-center">
        <a href="{{ $url }}" class="inline-block bg-blue-600 text-white text-xl font-medium py-3 px-6 rounded-md hover:bg-blue-700 transition duration-300">
            view the note
        </a>
    </div>
</div>

<!-- Footer Section -->
<div class="text-center mt-8 text-sm text-gray-600">
    <p>If you did not request this, please ignore this email.</p>
</div>

</body>
</html>
