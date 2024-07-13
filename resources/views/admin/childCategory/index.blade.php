@extends('admin.layouts.master')
@section('title')
    Child Category
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i>Child Category</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="head d-flex justify-content-between m-3">
                                    <h3>Child Category Create</h3>
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
                                                <th>Sl</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Ation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($childCategory as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->subCategory->name }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        @if ($item->status == 'active')
                                                            <button class="btn btn-success">{{ $item->status }}</button>
                                                        @elseif($item->status == 'Inactive')
                                                            <button class="btn btn-danger">{{ $item->status }}</button>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info ds-ib-block" data-bs-toggle="modal"
                                                            data-bs-target="#childCategoryUpdateModal{{ $item->id }}"><i
                                                                class="fa fa-edit"></i></a>
                                                        <!-- Slider Update -->
                                                        <div class="modal fade"
                                                            id="childCategoryUpdateModal{{ $item->id }}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <x-form.form
                                                                    action="{{ route('admin.childCategory.update', $item->id) }}"
                                                                    method="post" has-files>
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="exampleModalLabel">Child Category Update
                                                                            </h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <x-error />
                                                                        <div class="modal-body">
                                                                            <x-form.input type="text" name="name"
                                                                                placeholder="Enter Text"
                                                                                value="{{ $item->name }}" />

                                                                            <x-form.select :category="$category"
                                                                                name="category_id"
                                                                                class="form-control category-select" />
                                                                            <x-form.select :category="$subCategory"
                                                                                name="subCategory_id"
                                                                                class="form-control subcategory-select" />

                                                                            <div class="form-group">
                                                                                <label for="status">Status</label>
                                                                                <select id="status" name="status"
                                                                                    class="form-control">
                                                                                    <option
                                                                                        value="active"{{ $item->status == 'active' ? 'selected' : '' }}>
                                                                                        Active</option>
                                                                                    <option value="Inactive"
                                                                                        {{ $item->status == 'Inactive' ? 'selected' : '' }}>
                                                                                        Inactive
                                                                                    </option>
                                                                                </select>
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
                                                        <form class="ds-ib-block" id="delete-form-{{ $item->id }}"
                                                            action="{{ route('admin.childCategory.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger delete-item"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
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
        <div class="modal-dialog">
            <x-form.form action="{{ route('admin.childCategory.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Child Category Create</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-error />
                    <div class="modal-body">
                        <x-form.input type="text" name="name" placeholder="Enter Name" />
                        <x-form.select :category="$category" name="category_id" class="form-control category-select" />
                        <x-form.select :category="$subCategory" name="subCategory_id" class="form-control subcategory-select" />

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.category-select').change(function() {
                var categoryId = $(this).val();
                var subCategorySelect = $(this).closest('.form-group').next().find('.subcategory-select');
                subCategorySelect.empty();
                subCategorySelect.append('<option value="">Select Subcategory</option>');

                var subcategories = {!! json_encode($subCategory) !!};

                for (var i = 0; i < subcategories.length; i++) {
                    if (subcategories[i].category_id == categoryId) {
                        subCategorySelect.append('<option value="' + subcategories[i].id + '">' +
                            subcategories[i].name + '</option>');
                    }
                }
            });
        });
    </script>
@endpush
