@extends('panel.layout.app')

@section('main-content')

    <div class="col-md-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Create Store
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="post" action="{{ route('stores.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text"  id="name" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address : </label>
                        <input type="text"  id="address" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('image')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
{{--                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>

    </div>
@endsection
