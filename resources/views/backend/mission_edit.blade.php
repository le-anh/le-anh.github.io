@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="{{ route('admin.mission.index') }}"> Mission <i class="fa fa-caret-right"></i> </a> <a href=""> Edit </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title">Mission</h6>
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
    
    <form role="form" action="{{ route('admin.mission.update') }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf()
        <input type="hidden" id="id" name="id" value="{{ $mission->id }}">
        
        <div class="row pd-20 pd-sm-40">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
            
                <div class="row">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Photo: <span class="tx-danger">*</span></label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-images tx-16 lh-0 op-6"></i></span>
                            <label class="custom-file form-control">
                                    <input type="file" id="photo" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" value="dcv">
                                    <span class="custom-file-control"></span>
                            </label>
                        </div>
                        @error('photo') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                    
                </div><!-- row -->

                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Title: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $mission->title) }}">
                        </div>
                        @error('title') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Content: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text tx-16 lh-0 op-6"></i></span>
                            <input type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" value="{{ old('content', $mission->text) }}">
                        </div>
                        @error('content') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Order: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-sort-numeric-desc tx-16 lh-0 op-6"></i></span>
                            <input type="number" id="order" name="order" class="form-control @error('order') is-invalid @enderror" placeholder="Order" value="{{ old('order', $mission->order) }}">
                        </div>
                        @error('order') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Show/Hide: </label>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                        <label class="ckbox">
                            <input type="checkbox" id="show" name="show" class="@error('show') is-invalid @enderror" {{ old('show', $mission->show) ? 'checked' : ''}}><span> Show </span>
                        </label>
                        @error('show') <div class="alert alert-danger"> {{$message}} </div> @enderror
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center pd-t-10 rounded" style="background: #D8DCE3;">
                <img id="imgshow" name="imgshow" src="{{ asset('storage/app/' . $mission->image_link) }}" class="img-thumbnail" alt="" style="max-height: 300px; max-width: 300px;">
            </div>
        </div>

        <div class="form-layout-footer mg-t-30 text-center">
            <button class="btn btn-info mg-r-5"> <i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-secondary"> <i class="fa fa-retweet"></i> Cancel </button>
        </div><!-- form-layout-footer -->
    </form>

</div><!-- card -->
@endsection