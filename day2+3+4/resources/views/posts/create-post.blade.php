<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-blue-200 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="text" name="title" required placeholder="Post Title" class="w-full p-3 border border-gray-300 rounded" />
            <textarea name="content" required rows="5" placeholder="Post Content" class="w-full p-3 border border-gray-300 rounded"></textarea>
            <input type="file" name="image" class="w-full border border-gray-300 rounded p-2" />
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Create</button>
            </div>
        </form>
    </div>
</body>
</html>
