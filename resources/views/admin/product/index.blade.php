@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i> Product</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="head d-flex justify-content-between m-3">
                                    <h3>Product Create</h3>
                                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#sliderModal"><i
                                            class="fa fa-plus"></i> Create</a>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered div-width" id="example">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Ation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($product as $products)
                                                <td>{{ $i }}</td>
                                                <td>{{ $products->name }}</td>
                                                <td>
                                                    <img src="{{ asset($products->thumb_image) }}" width="50"
                                                        height="50" alt="">
                                                </td>
                                                <td>{{ $products->price }}</td>
                                                <td>{{ $products->productType }}</td>
                                                <td>
                                                    @if ($products->status = 'active')
                                                        <button class="btn btn-success">{{ $products->status }}</button>
                                                    @elseif($products->status = 'Inactive')
                                                        <button class="btn btn-danger">{{ $products->status }}</button>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a class="btn btn-info" data-bs-toggle="modal" title="Edit"
                                                        data-bs-target="#productModal{{ $products->id }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a class="btn btn-info" href="{{ route('admin.product.destroy', $products->id) }}"><i class="fa fa-image"></i></a>
                                                    <form class="ds-ib-block" id="delete-form-{{ $products->id }}"
                                                        action="{{ route('admin.product.destroy', $products->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger delete-item"
                                                            data-id="{{ $products->id }}"><i
                                                                class="fa fa-trash"></i></button>

                                                    </form>
                                                    
                                                    <!-- Slider Create -->

                                                    <div class="modal fade" id="productModal{{ $products->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <x-form.form
                                                                action="{{ route('admin.product.update', $products->id) }}"
                                                                method="post" has-files>
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            Product Create</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <x-error />
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text" name="name"
                                                                                    placeholder="Enter Name"
                                                                                    value="{{ $products->name }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.select id="category_id"
                                                                                    name="category_id" :category="$category" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label for="subCategory_id">Sub
                                                                                        Category
                                                                                        Name</label>
                                                                                    <select id="subCategory_id"
                                                                                        name="subCategory_id"
                                                                                        class="form-select my-2">
                                                                                        <option value="">Select
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label for="childCategory_id">Child
                                                                                        Category Name</label>
                                                                                    <select id="childCategory_id"
                                                                                        name="childCategory_id"
                                                                                        class="form-select my-2">
                                                                                        <option value="">Select
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.select id="banner_id"
                                                                                    name="banner_id" :category="$banner"
                                                                                    :selected="$products->banner_id" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text"
                                                                                    name="sku" placeholder="Enter SKU"
                                                                                    value="{{ $products->sku }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text"
                                                                                    name="price"
                                                                                    placeholder="Enter Price"
                                                                                    value="{{ $products->price }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text"
                                                                                    name="offer_price"
                                                                                    placeholder="Enter Offer Price"
                                                                                    value="{{ $products->offer_price }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="date"
                                                                                    :value="now()->format('Y-m-d')"
                                                                                    name="offer_start_date"
                                                                                    value="{{ $products->offer_start_date }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="date"
                                                                                    :value="now()->format('Y-m-d')" name="offer_end_date"
                                                                                    value="{{ $products->offer_end_date }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="number"
                                                                                    min="0" name="qty"
                                                                                    placeholder="Enter Stock Quantity"
                                                                                    value="{{ $products->qty }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text"
                                                                                    name="video_link"
                                                                                    placeholder="Enter video link"
                                                                                    value="{{ $products->video_link }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                                <x-form.textarea name="short_description"
                                                                                    placeholder="Enter short Description"
                                                                                    value="{{ $products->short_description }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                                <x-form.textarea name="long_description"
                                                                                    placeholder="Enter long Description"
                                                                                    value="{!! $products->long_description !!}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label for="productType">Product
                                                                                        Type</label>
                                                                                    <select id="productType"
                                                                                        name="productType"
                                                                                        class="form-control">
                                                                                        <option value="0">Select
                                                                                        </option>
                                                                                        <option
                                                                                            value="newArrinal"{{ $products->productType == 'newArrinal' ? 'selected' : '' }}>
                                                                                            New
                                                                                            Arrinal</option>
                                                                                        <option
                                                                                            value="Featured"{{ $products->productType == 'Featured' ? 'selected' : '' }}>
                                                                                            Featured
                                                                                        </option>
                                                                                        <option
                                                                                            value="topProduct"{{ $products->productType == 'topProduct' ? 'selected' : '' }}>
                                                                                            Top
                                                                                            Product</option>
                                                                                        <option
                                                                                            value="bestProduct"{{ $products->productType == 'bestProduct' ? 'selected' : '' }}>
                                                                                            Best
                                                                                            Product</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label for="status">Status</label>
                                                                                    <select id="status" name="status"
                                                                                        class="form-control">
                                                                                        <option
                                                                                            value="active"{{ $products->active == 'active' ? 'selected' : '' }}>
                                                                                            Active
                                                                                        </option>
                                                                                        <option value="Inactive"
                                                                                            {{ $products->active == 'Inactive' ? 'selected' : '' }}>
                                                                                            Inactive
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="text"
                                                                                    name="seo_title"
                                                                                    placeholder="Enter Seo Title"
                                                                                    value="{{ $products->seo_title }}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                                                <x-form.textarea name="seo_description"
                                                                                    placeholder="Enter Seo Description"
                                                                                    value="{!! $products->seo_description !!}" />
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                                                <x-form.input type="file"
                                                                                    name="thumb_image" id="image1" />
                                                                                @if ($products->thumb_image)
                                                                                    <img src="{{ asset($products->thumb_image) }}"
                                                                                        width="80" height="80"
                                                                                        class="rounded-circle"
                                                                                        id="showImage" alt="">
                                                                                @else
                                                                                    <img src="{{ asset('backendAsset/img/avatar.png') }}"
                                                                                        width="80" height="80"
                                                                                        class="rounded-circle"
                                                                                        id="showImage" alt="">
                                                                                @endif
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </x-form.form>
                                                        </div>
                                                    </div>

                                                </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Create -->

    <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <x-form.form action="{{ route('admin.product.store') }}" method="post" has-files>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Create</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-error />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.select id="category_id" name="category_id" :category="$category" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="subCategory_id">Sub Category Name</label>
                                    <select id="subCategory_id" name="subCategory_id" class="form-select my-2">
                                        <option value="">Select </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="childCategory_id">Child Category Name</label>
                                    <select id="childCategory_id" name="childCategory_id" class="form-select my-2">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.select id="banner_id" name="banner_id" :category="$banner" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="sku" placeholder="Enter SKU" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="price" placeholder="Enter Price" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="offer_price" placeholder="Enter Offer Price" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="date" :value="now()->format('Y-m-d')" name="offer_start_date" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="date" :value="now()->format('Y-m-d')" name="offer_end_date" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="number" min="0" name="qty"
                                    placeholder="Enter Stock Quantity" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="video_link" placeholder="Enter video link" />
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <x-form.textarea name="short_description" placeholder="Enter short Description" />
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <x-form.textarea name="long_description" placeholder="Enter long Description" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="productType">Product Type</label>
                                    <select id="productType" name="productType" class="form-control">
                                        <option value="0">Select</option>
                                        <option value="newArrinal">New Arrinal</option>
                                        <option value="Featured">Featured</option>
                                        <option value="topProduct">Top Product</option>
                                        <option value="bestProduct">Best Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="seo_title" placeholder="Enter Seo Title" />
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <x-form.textarea name="seo_description" placeholder="Enter Seo Description" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="file" name="thumb_image" />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </x-form.form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $('#category_id').change(function() {
                var category_id = $(this).val();
                $.ajax({
                    url: '/admin/get/category',
                    type: 'post',
                    dataType: 'json',
                    data: 'category_id=' + category_id,
                    success: function(data) {
                        var options = '<option value="">Select A Sub Category</option>';
                        $.each(data, function(index, item) {
                            options += '<option value="' + item.id + '">' + item.name +
                                '</option>';
                        });
                        $('#subCategory_id').html(options);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        //subCategory_id
        $(document).ready(function() {
            $('#subCategory_id').change(function(params) {
                var subCategory_id = $(this).val();
                $.ajax({
                    url: "/admin/get/subCategory",
                    type: 'POST',
                    dataType: 'json',
                    data: 'subCategory_id=' + subCategory_id,
                    success: function(data) {
                        var option = '<option value="">Select A Child Category</option>';
                        $.each(data, function(index, item) {
                            option += '<option value="' + item.id + '">' + item.name +
                                '</option>';
                        });
                        $('#childCategory_id').html(option);
                    },
                    error: function(error, status, xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#long_description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#seo_description'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endpush
