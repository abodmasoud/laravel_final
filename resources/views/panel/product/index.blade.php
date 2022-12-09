@extends('panel.layout.app')

@section('main-content')
    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        Stores
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Search Form -->

                <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Store</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->store->name }}</td>
                                <td>{{ $product->base_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mr-1">Edit</a>
                                    @if($product->trashed())
                                        <form method="post" action="{{ route('products.restore', $product->id) }}" class="">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">Restore</button>
                                        </form>
                                    @else
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
            <div class="d-flex justify-content-center align-items-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="{{ asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>

@endsection
