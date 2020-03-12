<!-- Gallery -->
@if(isset($image_actives) && $image_actives)
<div class="container-fluid" style="color:#fff; background-color:#011E46; padding-top:100px; padding-bottom: 50px;">
    <div class="container-xl">
        <h4><strong><p class="text-center"> HÌNH ẢNH HOẠT ĐỘNG </p></strong></h4>

        <div class="row">
            @foreach($image_actives as $image_active)
            <div class="col-lg-3 col-md-4 col-xs-6 my-3 delay-1s slow">
                <a class="thumbnail" href="#" data-image-id="{{ $image_active->id }}" data-toggle="modal" data-title="{{ $image_active->title }}" data-detail="{{ $image_active->description }}"
                    data-image="{{ $path_image = asset('storage/app/' . $image_active->image_link) }}" data-target="#image-gallery">
                    <img class="img-thumbnail" src="{{ $path_image }}" alt="Image active of TRUE COFFEE">
                </a>
                <div class="image-active-title text-center">{{$image_active->title}}</div>
            </div>
            @endforeach
        </div>

        
    </div>
</div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title"></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
            </div>
            <div class="modal-footer">
                <div class="container-fluid modal-detail text-center" id="image-gallery-detail"></div>
                <div class="container-fluid">
                    <button type="button" class="btn btn-secondary float-left" id="show-previous-image" style="float:left;"><i class="fa fa-arrow-left"></i>
                    </button>

                    <button type="button" id="show-next-image" class="btn btn-secondary float-right" style="float:right;"><i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif