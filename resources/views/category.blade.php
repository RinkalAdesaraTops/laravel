<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h4>Category Page</h4>
        <form action="{{ $editdata ? route('category.update',$editdata->id) : route('category.store') }}" method="post">
            @csrf
            @if($editdata)
            @method('PUT')
            @endif
            <input type="hidden" name="catid" id="catid" value="{{ $editdata ? $editdata->id : '' }}">
            <div class="form-group">
                <label for="catname">Category</label>
                <input type="text" name="catname" id="catname" class="form-control" value="{{ $editdata ? $editdata->catname : '' }}">
                @error('catname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <br><br>
        <table class="table table-bordered">
            <caption>Category List</caption>
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catdata as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->catname }}</td>
                    <td>
                        <form action="{{ route('category.edit',$cat->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('PATCH')
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        <form action="{{ route('category.destroy',$cat->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>