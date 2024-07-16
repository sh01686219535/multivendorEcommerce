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
                                                <th>Text</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Ation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
            <x-form.form action="{{ route('admin.slider.store') }}" method="post" has-files>
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
                                    <label for="subCategory_id">Sub Category</label>
                                    <select id="subCategory_id" name="subCategory_id" class="form-control">
                                        <option value="active">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <x-form.input type="text" name="name" placeholder="Enter Name" />
                            </div>
                        </div>

                        <x-form.textarea name="description" placeholder="Enter Description" />

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
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
    <script>
        $(document).ready(function() {
    $('#category_id').change(function() {
        var id = $(this).val();
        $.ajax({
            method: 'GET',
            url: "{{ route('admin.get.subCategory') }}", // Corrected route name
            data: { id: id },
            success: function(data) {
                // Handle success response here
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

    </script>
@endpush
