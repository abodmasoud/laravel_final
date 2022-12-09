@extends('panel.layout.app')

@section('main-content')

    <div class="col-md-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Create Product
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text"  id="name" name="name" class="form-control" value="{{ $product->name }}">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description : </label>
                        <input type="text"  id="description" name="description" class="form-control" value="{{ $product->description }}">
                        @error('description')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="store_id">Store : </label>
                        <select id="store_id" name="store_id" class="form-control">
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}" @if($product->store_id == $store->id) selected @endif>{{ $store->name }}</option>
                            @endforeach
                        </select>
                        @error('store_id')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="base_price">Base Price : </label>
                        <input type="text"  id="base_price" name="base_price" class="form-control" value="{{ $product->base_price }}">
                        @error('base_price')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="discount_price">Discount Price : </label>
                        <input type="text"  id="discount_price" name="discount_price" class="form-control" value="{{ $product->discount_price }}">
                        @error('discount_price')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox"  id="is_discount" name="is_discount" class="form-check-input" @if($product->is_discount) checked @endif>
                        <label for="is_discount">Discount Flag</label>
                        @error('is_discount')
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
