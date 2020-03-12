@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="{{ route('admin.product_type.index') }}"> Product type <i class="fa fa-caret-right"></i> </a> <a href=""> Edit </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title">Product type</h6>
        <div style="margin-top:-10px;">
            <hr style="border: 1px solid #D8DCE3;">
        </div>
    </div>

    @if (session('message_alert'))
        <div class="alert alert-{{session('type_alert')?? ''}} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! session('message_alert') !!}
        </div>
    @endif
    
    <form role="form" action="{{ route('admin.product_type.update') }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf()
        <input type="hidden" id="id" name="id" value="{{ $productType->id }}">
        
        <div class="row pd-20 pd-sm-40">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
            
                <div class="row">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Photo: <span class="tx-danger">*</span></label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-images tx-16 lh-0 op-6"></i></span>
                            <label class="custom-file form-control">
                                    <input type="file" id="photo" name="photo" class="custom-file-input @error('photo') is-invalid @enderror">
                                    <span class="custom-file-control"></span>
                            </label>
                        </div>
                        @error('photo') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                    
                </div><!-- row -->

                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Name: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $productType->name) }}">
                        </div>
                        @error('name') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>

                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Ingredient: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="ingredient" name="ingredient" ingredient="ingredient" class="form-control @error('ingredient') is-invalid @enderror" placeholder="Ingredient" value="{{ old('ingredient', $productType->ingredient) }}">
                        </div>
                        @error('ingredient') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Use manual: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="use_manual" name="use_manual" class="form-control @error('use_manual') is-invalid @enderror" placeholder="Use manual" value="{{ old('use_manual', $productType->use_manual) }}">
                        </div>
                        @error('use_manual') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Use periord: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-sort-numeric-desc tx-16 lh-0 op-6"></i></span>
                            <input type="number" id="use_periord" name="use_periord" class="form-control @error('use_periord') is-invalid @enderror" placeholder="Use periord" value="{{ old('use_periord', $productType->use_periord) }}">
                        </div>
                        @error('use_periord') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Description: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ old('description', $productType->description) }}">
                        </div>
                        @error('description') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>

                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Show/Hide: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <label class="ckbox">
                            <input type="checkbox" id="show" name="show" class="@error('show') is-invalid @enderror" {{ old('show', $productType->show) ? 'checked' : ''}}><span> Show </span>
                        </label>
                        @error('show') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center pd-t-10 rounded" style="background: #D8DCE3;">
                <img id="imgshow" name="imgshow" src="{{ asset('storage/app/' . $productType->image_link) }}" class="img-thumbnail" alt="" style="max-height: 300px; max-width: 300px;">
            </div>
        </div>

        <div class="form-layout-footer mg-t-30 text-center">
            <button class="btn btn-info mg-r-5"> <i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-secondary"> <i class="fa fa-retweet"></i> Cancel </button>
        </div><!-- form-layout-footer -->
    </form>

</div><!-- card -->
@endsection