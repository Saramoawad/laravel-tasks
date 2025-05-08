<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-200 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}" required placeholder="Post Title" class="w-full p-3 border border-gray-300 rounded" />
            <textarea name="content" required rows="5" placeholder="Post Content" class="w-full p-3 border border-gray-300 rounded">{{ $post->content }}</textarea>
            <input type="file" name="image" class="w-full border border-gray-300 rounded p-2" />
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="w-full max-h-64 object-cover rounded-lg mb-2">
            @endif
            <div class="flex justify-between gap-4">
                <a href="{{ route('posts.index') }}" class="w-1/2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="w-1/2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
