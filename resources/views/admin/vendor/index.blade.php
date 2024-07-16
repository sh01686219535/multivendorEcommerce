@extends('admin.layouts.master')
@section('title')
    Vendor Profile
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i> Vendor Profile Update</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <x-form.form action="{{ route('admin.vendor.store') }}" method="post" has-files>
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="text" name="phone" value="{{$vendor->phone}}" placeholder="Enter Phone Number" />
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="email" name="email" value="{{$vendor->email}}" placeholder="Enter Email Address" />
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="text" name="address" value="{{$vendor->address}}" placeholder="Enter Address" />
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="text" name="facebook"
                                            value="{{$vendor->facebook}}" placeholder="Enter Facebook Account" />
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="text" name="twitter"
                                            value="{{$vendor->twitter}}" placeholder="Enter Twitter Account" />
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="text" name="instragram"
                                            value="{{$vendor->instragram}}" placeholder="Enter Instragram Account" />
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <x-form.textarea name="description" id="description"
                                             placeholder="Enter Description" value="{!! $vendor->description !!}"/>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <x-form.input type="file" name="image" id="image" />
                                            @if ($vendor->image)
                                            <img style="width:200px;height:200px" id="showImage"
                                            src="{{ asset($vendor->image) }}" alt=""
                                            class="image-style mb-3">
                                            @else
                                            <img style="width:200px;height:200px" id="showImage"
                                            src="{{ asset('backendAsset/img/previewImage.png') }}" alt=""
                                            class="image-style mb-3">
                                            @endif
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </x-form.form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#image').change('click', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
