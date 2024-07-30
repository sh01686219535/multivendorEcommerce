@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i> Product Upload Image</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <x.form.form action="{{ route('admin.productImgGallery.store') }}" method="post" has-fails>
                                    @csrf
                                    <div class="row m-2">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                            <x-form.input type="file" name="thumb_image" id="thumb_image" class="m-2" multiple="true"/>
                                            @if ($product->thumb_image)
                                            <img src="{{ asset($product->thumb_image) }}" width="100"
                                            height="100" class="rounded-circle" alt="" id="showImage">
                                            @else
                                            <img src="{{ asset('backendAsset/img/avatar5.png') }}" width="100"
                                            height="100" class="rounded-circle" alt="" id="showImage">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 my-2">
                                        <button type="submit" class="btn btn-success m-2">Submit</button>
                                    </div>
                                </x.form.form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Create -->
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#thumb_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endpush
