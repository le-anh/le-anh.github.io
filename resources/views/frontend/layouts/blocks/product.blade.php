<!-- Products -->
<div class="container-xl animated fadeInUp" style="padding-top:100px; padding-bottom: 50px;">
    <h4><strong><p class="text-center">  SẢN PHẨM </p></strong></h4>
    <div class="row">
        @foreach($productTypeSpecifications ?? [] as $productTypeSpecification)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 my-3">
            <div class="card h-100"> <!-- full height -->
                <!-- <a href="" target="" rel="noopener noreferrer" title="Click để xem chi tiết">  -->
                    <img class="img-thumbnail" src="{{ file_exists($image_path = 'storage/app/' . $productTypeSpecification->image_link) ? asset( $image_path) : asset('storage/app/uploads/products/product_default.jpg') }}"  alt="Card image cap"><br><br>
                    <div class="card-body text-center">
                        <!-- $500 <br>   -->
                        <strong>{{ $productTypeSpecification->ProductType->name }} <br> ({{number_format($productTypeSpecification->net_weight, 0, ',', '.') }} gr)</strong>
                    </div>
                <!-- </a> -->
                <div class="card-footer" style="background-color: #fff; border:none;"> 
                    <!-- <button class="btn btn-primary btn-block"> <i class="fa fa-shopping-cart"></i> MUA </button> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>