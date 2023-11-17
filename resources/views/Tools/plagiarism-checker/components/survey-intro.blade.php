<div class="tab-pane-inner">
    <div class="upper class-name d-flex flex-column gap-5">
        <h1 class="h4-700 h4-m-700">@lang('plagiarism.intro-title')</h1>
        @foreach(trans('plagiarism.intro-desc') as $item)
            <p class="b1-400 b1-m-400">{!! $item !!}</p>
        @endforeach
        <ul>
            @foreach(trans('plagiarism.intro-list') as $item)
                <li> <i class="bx bx-sm bx-check-double text-primary-70"></i> {!! $item !!}</li>
            @endforeach            
        </ul>
    </div>
    <div class="buttons d-flex align-items-center justify-content-end">
        <button class="btn button-primary-70" onclick="$('#nav-hiw-tab').trigger('click')">
            @lang('plagiarism.nav-hiw')
        </button>
    </div>
</div>