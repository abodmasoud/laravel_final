@extends('panel.layout.app')

@section('main-content')
    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt -portlet__head-title">
                        Payment Report
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin: Datatable -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Store Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th scope="row">{{ $transaction->id }}</th>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->product->store->name }}</td>
                                <td>{{ $transaction->purchase_price }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaction->purchase_date)->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/app/custom/general/crud/metronic-datatable/base/html-table.js') }}"
        type="text/javascript"></script>
@endsection
