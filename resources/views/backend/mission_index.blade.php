@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="#"> Mission </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title pull-left">Mission</h6>
        <div class="pull-right" title="Thêm mới"><a href="{{ route('admin.mission.create') }}" class="btn btn-outline-info btn-icon mg-r-5"><div><i class="fa fa fa-plus-circle"></i></div></a></div>
        <div style="row">
            <br>
            <hr style="border: 1px solid #D8DCE3;">
        </div>
    </div>

    @if (session('message_alert'))
        <div class="alert alert-{{session('type_alert')?? ''}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-{{session('type_alert') == 'success' ? 'ios-checkmark' : (session('type_alert') == 'info' ? 'ios-information' : (session('type_alert') == 'warning' ? 'alert-circled' : (session('type_alert') == 'danger' ? 'ios-close' : '')))}} alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <span>{!! session('message_alert') !!}</span>
            </div><!-- d-flex -->
        </div><!-- alert -->
    @endif
    <div class="table-wrapper">
        <table id="datatable" class="table table-striped responsive nowrap">
            <thead class="bg-info">
                <tr>
                    <th class="wd-25p text-center">Photo</th>
                    <th class="wd-20p">Title</th>
                    <th class="wd-25p">Text</th>
                    <th class="wd-10p text-center">Order</th>
                    <th class="wd-10p text-center">Show/Hide</th>
                    <th class="wd-10p"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($missions ?? [] as  $mission)
                    <tr>
                        <td class="text-center align-middle"> <img class="img-thumbnail" src="{{ asset('storage/app/' . $mission->image_link) }}" alt="" style="max-height: 256px; max-width: 256px;"> </td>
                        <td class="align-middle">{{$mission->title}}</td>
                        <td class="align-middle">{{$mission->text}}</td>
                        <td class="text-center align-middle">{{$mission->order}}</td>
                        <td class="text-center align-middle"><span href="#" class="btn btn-{{$mission->show ? 'info' : 'dark'}} btn-icon rounded-circle mg-r-5"><div><i class="fa fa fa-{{$mission->show ? 'eye' : 'eye-slash'}}"></i></div></span> </td>
                        <td class="text-center align-middle">
                            <form action="{{route('admin.mission.delete', ['id'=>$mission->id])}}" method="post">
                                <a href="{{ route('admin.mission.edit', ['id'=>$mission]) }}" class="btn btn-warning btn-icon mg-r-5" title="Edit"><div><i class="fa fa fa-edit"></i></div></a>
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete btn-icon mg-r-5" title="Delete"><div><i class="fa fa fa-trash"></i></div></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div><!-- card -->

@endsection