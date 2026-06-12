@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Add Property</h2>

    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Price per day</label>
                <input type="number" name="price_per_day" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option>villa</option>
                    <option>apartment</option>
                    <option>house</option>
                    <option>studio</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>City</label>
                <input type="text" name="city" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Rooms</label>
                <input type="number" name="rooms" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Main Image</label>
                <input type="file" name="main_image" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Gallery Images</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

        </div>

        <button class="btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection