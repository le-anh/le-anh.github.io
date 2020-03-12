
<!-- Contact & Map -->
<div class="container-xl animated fadeInUp" style="padding-top:100px; padding-bottom: 50px;">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 img-thumbnail" style="color:#fff; background-color:#011E46; padding-top:50px; padding-bottom: 50px;">
            <h4><strong><p class="text-center"> LIÊN HỆ </p></strong></h4>

            <form action="{{ route('contact.store') }}" method="post">
                @csrf()
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Họ tên" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label for="phone_email">Điện thoại/Email</label>
                    <input type="text" name="phone_email" class="form-control @error('phone_email') is-invalid @enderror" @error('phone_email') autofocus @enderror placeholder="Điện thoại hoặc Email" value="{{old('phone_email')}}">
                    @error('phone_email')
                        <div class="alert alert-danger" autofocus>{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" rows="2" class="form-control" placeholder="Địa chỉ">{{old('address')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror" @error('content') autofocus @enderror placeholder="Nội dung">{{old('content')}}</textarea>
                    @error('content')
                        <div class="alert alert-danger" autofocus>{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-primary"> <i class="fa fa-sync-alt"></i> Hủy </button>
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-paper-plane"></i> Gửi </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8 img-thumbnail" style="background-color:#fff; padding-top:50px; padding-bottom: 50px;">
            <h4><strong><p class="text-center"> ĐỊA CHỈ TRÊN GOOGLE MAP </p></strong></h4>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5584.75626998027!2d105.43671897989383!3d10.375969673640482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a73516859e609%3A0x82bde909630449ed!2sTRUE%20COFFEE!5e1!3m2!1sen!2s!4v1581667249000!5m2!1sen!2s" width="100%" height="520" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>