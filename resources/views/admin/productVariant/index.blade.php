@extends('admin.layouts.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <h3><i class="fas fa-sliders-h icon-i m-2"></i> Product Variant</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <a href="{{ route('admin.product.index') }}" class="m-2 btn btn-secondary">Back</a>
                                <div class="index d-flex justify-content-between m-3">
                                    <h3 class="m-2">Product Name : {{ $product->name }}</h3>
                                    <div>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="btn btn-info">Create</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Variant</th>
                                                <th>Variant status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productVariant as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        @if ($item->status == 'active')
                                                        <span class="badge bg-success">{{ $item->status }} </span>
                                                        @elseif($item->status == 'Inactive')
                                                        <span class="badge bg-danger">{{ $item->status }} </span>
                                                        @endif
                                                        
                                                    </td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#variantModal{{$item->id}}"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                       <form class="ds-ib-block" action="{{ route('admin.productVariant.delete', $item->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger delete-item"><i class="fa fa-trash"></i></button>
                                                       </form>
                                                            <!-- Modal -->
                                                        <div class="modal fade" id="variantModal{{$item->id}}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form
                                                                    action="{{ route('admin.productVariant.update', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Variant</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="name"
                                                                                    class="form-label">Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="name" name="name" value="{{$item->name}}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="name"
                                                                                    class="form-label">Status</label>
                                                                                <select id="status" name="status"
                                                                                    class="form-control">
                                                                                    <option value="active"{{$item->status == 'active' ? 'selected': ''}}>Active</option>
                                                                                    <option value="Inactive"{{$item->status == 'Inactive' ? 'selected': ''}}>Inactive
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
                                                                </form>
                                                            </div>
                                                        </div>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.productVariant.create', $product->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Variant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Status</label>
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
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush
