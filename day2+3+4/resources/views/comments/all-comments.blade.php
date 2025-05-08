<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container my-4">

        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between">
                <h1 class="text-center">All Comments</h1>
                <a href="{{ route('posts.create') }}" class="bg-primary text-white py-3 text-center" style="text-decoration: none; width: 150px; text-align: center;">
                    Create Comment
                </a>
            </div>
        </div>

        <!-- Table for displaying posts -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Content</th>
                        <th scope="col">Post Id</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allComments as $comment)
                        <tr>
                            <th scope="row">{{ $comment['id'] }}</th>
                            <td>{{ $comment['title'] }}</td>
                            <td>{{ $comment['post_id'] }}</td>
                            <td>{{ $comment['content'] }}</td>
                            <td>
                                <a href="{{ route('comments.show', $comment['id']) }}" class="btn btn-success">
                                    Show
                                </a>
                                <a href="{{ route('comments.edit', $comment['id']) }}" class="btn btn-warning">Edit</a>
                                
                                <!-- Delete button -->
                                <form action="{{ route('comments.destroy', $comment['id']) }}" method="post" class="mt-3 d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
