<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-200 min-h-screen flex items-center justify-center p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $post->content }}</p>
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="w-full max-h-64 object-cover rounded-lg mb-4">
            @endif
            <div class="flex justify-between items-center gap-3">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            </div>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Comments</h3>
            <div class="space-y-3 mb-6">
                @forelse ($post->comments as $comment)
                    <div class="bg-gray-100 p-3 rounded">
                        <strong class="text-purple-700">{{ $comment->user->name }}</strong>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No comments yet.</p>
                @endforelse
            </div>
            <form action="{{ route('comments.store') }}" method="POST" class="space-y-3">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="content" required class="w-full p-3 border border-gray-300 rounded" placeholder="Write a comment..."></textarea>
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Add Comment</button>
            </form>
        </div>
    </div>
</body>
</html>
