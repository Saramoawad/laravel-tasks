<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1200px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }

        h1 {
            font-weight: 700;
            color: #343a40;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 150px;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px;
        }

        .table td {
            vertical-align: middle;
            padding: 15px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .btn-success, .btn-warning, .btn-danger {
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #28a745;
            transform: translateY(-2px);
        }

        .btn-warning:hover {
            background-color: #ffc107;
            transform: translateY(-2px);
        }

        .btn-danger:hover {
            background-color: #dc3545;
            transform: translateY(-2px);
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #007bff;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s ease;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 14px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 14px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>All Posts</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    Create Post
                </a>
            </div>
        </ <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allPosts as $post)
                        <tr>
                            <th scope="row">{{ $post['id'] }}</th>
                            <td>{{ $post['title'] }}</td>
                            <td>{{ $post['content'] }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-success">
                                    Show
                                </a>
                                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $post['id']) }}" method="post" class="d-inline">
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
        <div class="pagination">
            {{ $allPosts->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>