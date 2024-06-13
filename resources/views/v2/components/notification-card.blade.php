@php
    $lang_reg = $lang === 'id' ? 'id-id' : 'en-id';
@endphp

<div class="notification-center-card">
    <i class="bx bxs-bell bx-md text-yellow-80"></i>
    <div class="card-content">
        <p class="h6-700 h6-m-700 mb-3">@lang('plagiarism.whatsnew')</p>
        <p class="mb-4 b2-400 b2-m-400">
            <span class="text-dark-30">@lang('plagiarism.last_update')</span> {{ $last_updated }}
        </p>
        <p class="m-0 b2-400 b2-m-400">{{ $desc }}</p>
        <a href="https://cmlabs.co/{{ $lang_reg }}/notification"
            class="text-primary-70 b2-700 b2-m-700 text-underline">@lang('plagiarism.notif_center')</a>
    </div>
</div>
