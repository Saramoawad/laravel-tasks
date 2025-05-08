<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">View Post</h1>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['content'] }}</p>

                        <!-- Action buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a>
                        </div>
                        
                        <!-- Delete button -->
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="post" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
