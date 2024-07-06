@extends('frontend.dashboard.layouts.master')
@section('title')
    Vendor Profile
@endsection
@push('css')
    <style>
        @import url(https://fonts.googleapis.com/icon?family=Material+Icons);
        @import url('https://fonts.googleapis.com/css?family=Raleway');

        // variables
        $base-color: cadetblue;
        $base-font: 'Raleway', sans-serif;

        h1 {
            font-family: inherit;
            margin: 0 0 .75em 0;
            color: desaturate($base-color, 15%);
            text-align: center;
        }

        .box {
            display: block;
            min-width: 150px;
            height: 142px;
            margin: 5px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            overflow: hidden;
            background-color: lighten($base-color, 45%);
        }

        .upload-options {
            position: relative;
            height: 138px;
            bottom: 140px;
            background-color: $base-color;
            cursor: pointer;
            overflow: hidden;
            text-align: center;
            transition: background-color ease-in-out 150ms;

            &:hover {
                background-color: lighten($base-color, 10%);
            }

            & input {
                width: 0.1px;
                height: 0.1px;
                opacity: 1;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            & label {
                display: flex;
                align-items: center;
                width: 100%;
                height: 100%;
                font-weight: 400;
                text-overflow: ellipsis;
                white-space: nowrap;
                cursor: pointer;
                overflow: hidden;

                &::after {
                    content: 'add';
                    font-family: 'Material Icons';
                    position: absolute;
                    font-size: 2.5rem;
                    color: rgba(230, 230, 230, 1);
                    top: calc(50% - 2.5rem);
                    left: calc(50% - 1.25rem);
                    z-index: 0;
                }

                & span {
                    display: inline-block;
                    width: 50%;
                    height: 100%;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    vertical-align: middle;
                    text-align: center;

                    &:hover i.material-icons {
                        color: lightgray;
                    }
                }
            }
        }


        .js--image-preview {
            height: 142px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-image: url('');
            background-color: white;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;

            &::after {
                content: "photo_size_select_actual";
                font-family: 'Material Icons';
                position: relative;
                font-size: 4.5em;
                color: rgba(230, 230, 230, 1);
                top: calc(50% - 3rem);
                left: calc(50% - 2.25rem);
                z-index: 0;
            }

            &.js--no-default::after {
                display: none;
            }

            &:nth-child(2) {
                background-image: url('http://bastianandre.at/giphy.gif');
            }
        }

        i.material-icons {
            transition: color 100ms ease-in-out;
            font-size: 2.25em;
            line-height: 55px;
            color: white;
            display: block;
        }

        .drop {
            display: block;
            position: absolute;
            background: transparentize($base-color, .8);
            border-radius: 100%;
            transform: scale(0);
        }

        .animate {
            animation: ripple 0.4s linear;
        }
        @keyframes ripple {
            100% {
                opacity: 0;
                transform: scale(2.5);
            }
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                    <h3 class="my-2"><i class="fa fa-user text-dark"></i> Profile</h3>
                    <div class="card">
                        <div class="card-body">
                            <h5>Basic Information</h5>
                            <hr>
                            <form action="{{route('vendor.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12 col-md-12 col-xl-12 col-xm-12 d-flex">
                                    <div class="col-lg-8 col-md-8 col-xl-8 col-xm-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ Auth::user()->name }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                    value="{{ Auth::user()->phone }}" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xl-4 col-xm-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                                {{-- <input type="file" class="form-control" id="image" name="image"> --}}
                                                <div class="box">
                                                    @if (Auth::user()->image)
                                                    <div class="js--image-preview">
                                                        <img class="profile-user-img img-fluid img-circle img-style"
                                                           style="width: 140px;height:140px;display:block;" src="{{ asset(Auth::user()->image) }}" alt="picture">
                                                    </div>
                                                        <div class="upload-options">
                                                            <label>
                                                                <input type="file" name="image" class="image-upload"
                                                                    accept="image/*" />
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="js--image-preview"></div>
                                                        <div class="upload-options">
                                                            <label>
                                                                <input type="file" name="image" class="image-upload"
                                                                    accept="image/*" />
                                                            </label>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                    <div class="form-group row">
                                        <div class="offset-sm-1">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <x-error />
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <form action="{{ route('vendor.password.update') }}" class="form-horizontal" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="currentPassword" class="col-sm-4 col-form-label">Current
                                            Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="currentPassword"
                                                name="currentPassword" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="passwordConfirm" class="col-sm-4 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="passwordConfirm"
                                                name="passwordConfirm" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-1 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e) {
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file) {
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                reader.onload = function() {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file) {
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file) {
                    throw 'Kein Bild gewählt';
                } else {
                    previewImage(file);
                }
            }

        }

        // initialize box-scope
        var boxes = document.querySelectorAll('.box');

        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }



        /// drop-effect
        function initDropEffect(box) {
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e) {
                area = e.currentTarget
                // create drop
                if (!drop) {
                    drop = document.createElement('span');
                    drop.className = 'drop';
                    this.appendChild(drop);
                }
                // reset animate class
                drop.className = 'drop';

                // calculate dimensions of area (longest side)
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                // set drop dimensions to fill area
                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                // calculate dimensions of drop
                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                // calculate relative coordinates of click
                // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }
    </script>
@endpush
