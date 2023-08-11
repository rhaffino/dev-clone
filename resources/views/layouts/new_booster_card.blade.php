<div id="seo-booster-container" class="seo-booster-container" style="width:100%; overflow: auto;">
    <h2 class="h2-700 h2-m-700">{{ $title }}</h2>
    <div class="d-flex align-items-center author">
        <i class='bx bxs-user-circle'></i>
    <p class="m-0 b2-400 b2-m-400">@lang('layout.writen-by') cmlabs</p>
        <div>|</div>
        <p class="m-0 b2-400 b2-m-400">@lang('layout.published-at') Aug 2, 2023</p>
    </div>
    <div class="subcontents">
        @if (isset($subcontent_1))
        {{ $subcontent_1 }}
        @endif

        @if (isset($subcontent_2))
        {{ $subcontent_2 }}
        @endif

        @if (isset($subcontent_3))
        {{ $subcontent_3 }}
        @endif

        @if (isset($subcontent_4))
        {{ $subcontent_4 }}
        @endif

        @if (isset($subcontent_5))
        {{ $subcontent_5 }}
        @endif

        @if (isset($subcontent_6))
        {{ $subcontent_6 }}
        @endif

        @if (isset($subcontent_7))
        {{ $subcontent_7 }}
        @endif

        @if (isset($how_to_content))
        {{ $how_to_content }}
        @endif
        {{ $read_more }}
    </div>
    <p class="m-0 b2-400 b2-m-400" style="color:#959595">@lang('layout.edited-at') Aug 11, 2023</p>
</div>