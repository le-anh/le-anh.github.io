@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="{{ route('admin.supplier.index') }}"> Supplier <i class="fa fa-caret-right"></i> </a> <a href=""> Edit </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title">Supplier</h6>
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

    <form role="form" action="{{ route('admin.supplier.update') }}" method="post" enctype="multipart/form-data">
        @csrf()
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{ $supplier->id }}">
        
        <div class="pd-20 pd-sm-40">
            <div class="row">
                <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Name: </label>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university tx-16 lh-0 op-6"></i></span>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $supplier->name)}}" placeholder="Name" autofocus required>
                    </div>
                    @error('name') <div class="alert alert-danger"> {{$message}} </div> @enderror
                </div>
            </div><!-- row -->

            <div class="row mg-t-20">
                <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Surrogate: </label>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user tx-16 lh-0 op-6"></i></span>
                        <input type="text" id="surrogate" name="surrogate" class="form-control @error('surrogate') is-invalid @enderror" value="{{ old('surrogate', $supplier->surrogate)}}" placeholder="Surrogate" autofocus>
                    </div>
                    @error('surrogate') <div class="alert alert-danger"> {{$message}} </div> @enderror
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Phone: </label>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile tx-16 lh-0 op-6"></i></span>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $supplier->phone)}}" placeholder="Phone" autofocus>
                    </div>
                    @error('phone') <div class="alert alert-danger"> {{$message}} </div> @enderror
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Email: </label>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope tx-16 lh-0 op-6"></i></span>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $supplier->email)}}" placeholder="Email" autofocus>
                    </div>
                    @error('email') <div class="alert alert-danger"> {{$message}} </div> @enderror
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Address: </label>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker tx-16 lh-0 op-6"></i></span>
                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $supplier->address)}}" placeholder="Address" autofocus>
                    </div>
                    @error('address') <div class="alert alert-danger"> {{$message}} </div> @enderror
                </div>  
            </div>
        </div>
        <div class="form-layout-footer mg-t-30 text-center">
            <button class="btn btn-info mg-r-5"> <i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-secondary"> <i class="fa fa-retweet"></i> Cancel </button>
        </div><!-- form-layout-footer -->
    </form>
        
</div><!-- card -->
@endsection