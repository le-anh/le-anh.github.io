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