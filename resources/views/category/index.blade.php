<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-8 card p-4">
                <span class="btn btn-light me-auto fw-bold text-dark">All Category Table</span>
                <a class="btn btn-primary ms-auto mb-2" href="{{ route('category.create') }}">Add Category</a>
                <table class="table table-response table-bordered">
                    <thead>
                        <tr class="bg-light">
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $category as $key=>$row )
                        <tr>
                            <th class="bg-light fw-bold">{{ ++$key }}</th>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->category_slug }}</td>
                            <td class="btn btn-info bg-info mx-3"><a class="text-dark fw-semibold" href="">Edit</a></td>
                            <td class="btn btn-danger bg-danger"><a class="text-white fw-semibold" href="">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>