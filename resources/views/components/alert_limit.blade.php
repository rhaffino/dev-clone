@if ((isset($access_limit) && $access_limit > 0 && !session()->has('logged_in') && !session()->get('logged_in') == 'true'))
    <div class="alert alert-limit d-flex justify-content-between align-items-center alert-php" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">
        <div class=" d-flex align-items-center mr-2" style="color: #C29C13;">
            <i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i> @lang('alert.alert-limit')
        </div>
        <a href="{{url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login')}}" style="color: #C29C13; font-weight: 700;">Login</a>
    </div>
@else 
    <div id="alert-limit"></div>
@endif