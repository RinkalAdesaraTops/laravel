 @extends('app')
@section('title','Subcategory')

@section('content')
<div class="container mt-5">
        <h4>Category Page</h4>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ $editdata ? route('product.update',$editdata->id) : route('product.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if($editdata)
            @method('PUT')
            @endif
            <input type="hidden" name="productid" id="productid" value="{{ $editdata ? $editdata->id : '' }}">
            <div class="form-group">
                <label>Category</label>
                <select name="cat_id" id="cat_id" class="form-control">
                    <option value="">--Select Category--</option>
                    @foreach ($catdata as $cat)
                    <option value={{ $cat->id }} {{ $editdata && $editdata->cat_id ==$cat->id ?'selected':'' }}>{{
                        $cat->catname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Subcategory</label>
                <select name="subcat_id" id="subcat_id" class="form-control">
                    <option value="">--Select Subcategory--</option>
                    @if ($editdata)
                        @foreach ($subcatdata as $s)
                            <option value="{{ $s->id }}" {{ $s->id == $editdata->subcat_id ?"selected":"" }}>{{ $s->subcatname }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="subcatname">Product</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ $editdata ? $editdata->name : '' }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ $editdata ? $editdata->price : '' }}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <br><br>
        <table class="table table-bordered">
            <caption>product List</caption>
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pr)
                <tr>
                    <td>{{ $pr->id }}</td>
                    <td>{{ $pr->category->catname }}</td>
                    <td>{{ $pr->subcategory->subcatname }}</td>
                    <td>{{ $pr->name }}</td>
                    <td>{{ $pr->price }}</td>
                    <td>
                        <form action="{{ route('product.edit',$pr->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        <form action="{{ route('product.destroy',$pr->id) }}" method="post" style="display:inline;">
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
@endsection
