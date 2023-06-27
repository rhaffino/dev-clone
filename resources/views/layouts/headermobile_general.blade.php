<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed custom-header-mobile">
    <div class="w-100 px-4 d-flex align-items-center justify-content-between pr-4">
        <div class="d-flex align-items-center">
            <a href="https://cmlabs.co/" class="btn btn-cmlabs-back">
                <i class="bx bx-chevron-left bx-sm"></i>
            </a>
            <a href="/{{ $local }}" class="d-flex align-items-center">
                <img alt="Logo" src="{{ asset('media/logos/new/new-logo-default.png') }}" height="40px"
                    width="40px" />
                <span class="h4 header-mobile-title ml-3 my-2 mt-2">SEO Tools</span>
            </a>
        </div>   
        <div>
            <a href="https://cmlabs.co/{{$local}}-id/company/contact" class="btn btn-cmlabs-consult mobile mr-4">@lang('layout.button-consult')</a>
            <button class="btn p-0 burger-icon" id="kt_aside_mobile_toggle">
                <span></span>
            </button>     
        </div>
    </div>
</div>
