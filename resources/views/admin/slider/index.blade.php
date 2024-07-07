@extends('admin.layouts.master')
@section('title')
    Slider
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i> Slider</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="head d-flex justify-content-between m-3">
                                    <h3>Slider Create</h3>
                                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#sliderModal"><i
                                            class="fa fa-plus"></i> Create</a>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="example">
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
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($slider as $item)
                                                <tr>
                                                    <td>{{ $item->text }}</td>
                                                    <td>{{ Str::limit($item->title, 10) }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ Str::limit($item->description, 10) }}</td>
                                                    <td>
                                                        <img src="{{ asset($item->image) }}" width="50" height="50"
                                                            alt="">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#sliderUpdateModal{{$item->id}}"><i
                                                                class="fa fa-edit"></i></a>
                                                        <!-- Slider Update -->
                                                        <div class="modal fade" id="sliderUpdateModal{{$item->id}}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <x-form.form action="{{ route('admin.slider.update',$item->id) }}"
                                                                    method="post" has-files>
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="exampleModalLabel">Slider Create</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <x-error />
                                                                        <div class="modal-body">
                                                                            <x-form.input type="text" name="text"
                                                                                placeholder="Enter Text" value="{{$item->text}}"/>
                                                                            <x-form.input type="text" name="title"
                                                                                placeholder="Enter Title" value="{{$item->title}}"/>
                                                                            <x-form.input type="text" name="btnUrl"
                                                                                placeholder="Enter Btn URL" value="{{$item->btnUrl}}"/>
                                                                            <x-form.textarea name="description"
                                                                                placeholder="Enter Description" value="{{$item->description}}"/>
                                                                            <x-form.input type="text" name="serial"
                                                                                placeholder="Enter serial" value="{{$item->serial}}"/>
                                                                            <div class="form-group">
                                                                                <label for="status">Status</label>
                                                                                <select id="status" name="status"
                                                                                class="form-control">
                                                                                <option value="{{$item->status}}"{{$item->status == 'active' ? 'selected': ''}}>Active</option>
                                                                                <option value="{{$item->status}}" {{$item->status == 'Inactive' ? 'selected': ''}}>Inactive
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <x-form.input type="file" name="image" />
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
                                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.slider.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger delete-item" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
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
            <x-form.form action="{{ route('admin.slider.store') }}" method="post" has-files>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Slider Create</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-error />
                    <div class="modal-body">
                        <x-form.input type="text" name="text" placeholder="Enter Text" />
                        <x-form.input type="text" name="title" placeholder="Enter Title" />
                        <x-form.input type="text" name="btnUrl" placeholder="Enter Btn URL" />
                        <x-form.textarea name="description" placeholder="Enter Description" />
                        <x-form.input type="file" name="image" />
                        <x-form.input type="text" name="serial" placeholder="Enter serial" />
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
