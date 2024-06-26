@extends('layouts.admin')
@section('navtitle', 'Edit Product')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">

            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ __('Edit Product') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('products.update', ['product' => $product['id']]) }}"
                                data-toggle="validator" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $product['id'] }}">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" placeholder="Enter Name" name="name"
                                                data-errors="Please Enter Name" value="{{ old('name', $product['name']) }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text"
                                                class="form-control @error('barcode')
                                            is-invalid

                                        @enderror"
                                                placeholder="Enter Barcode" name="barcode"
                                                data-errors="Please Enter Barcode"
                                                value="{{ old('barcode', $product['barcode']) }}">
                                            @error('barcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category"
                                                class="form-control @error('category')
                                            is-invalid

                                        @enderror form-control"
                                                data-style="py-0">
                                                <option>Beauty</option>
                                                <option>Grocery</option>
                                                <option>Food</option>
                                                <option>Furniture</option>
                                                <option>Shoes</option>
                                                <option>Frames</option>
                                                <option>Jewellery</option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cost">Cost</label>
                                            <input type="text"
                                                class="form-control @error('cost')
                                        is-invalid

                                        @enderror"
                                                value="{{ old('cost') }}" name="cost" placeholder="Enter Cost"
                                                data-errors="Please Enter Cost">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price"
                                                class="form-control @error('price')
                                        is-invalid

                                        @enderror"
                                                value="{{ old('price', $product['price']) }}" placeholder="Enter Price"
                                                data-errors="Please Enter Price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status')
                                        is-invalid

                                        @enderror"
                                                data-style="py-0">
                                                <option value="1"
                                                    {{ old('status', $product['status']) == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $product['status']) == 0 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" class="form-control"
                                                placeholder="Enter Quantity"
                                                value="{{ old('quantity', $product['quantity']) }}">
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file"
                                                class="form-control @error('image')
                                        is-invalid

                                        @enderror image-file"
                                                name="image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description / Product Details</label>
                                            <textarea
                                                class="form-control @error('description')
                                        is-invalid
                                        @enderror"
                                                id="description" name="description" value="" rows="4">{{ old('description', $product['description']) }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
