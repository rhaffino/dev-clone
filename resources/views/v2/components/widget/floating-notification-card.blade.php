<div class="notif-card notif" data-id="{{ $id }}">
    @if ($image)
        <div class="notif-card-header">
            <img src="{{ 'https://s3-cdn.cmlabs.co/' . $image }}" alt="notif header image">
        </div>
    @endif

    <div class="notif-card-body">
        <p class="b1-400 b1-m-400 text-dark-40 m-0 {{ $image ? '' : 'pe-4' }}">{{ $title }}</p>
        <a href="{{ $url }}" class="text-primary-70 b1-700 b1-m-700">@lang('home.check')</a>
    </div>

    @if ($isPinned)
        <i class='pin-icon bx bxs-pin bx-sm text-gray-100'></i>
    @endif
    <i data-id="{{ $id }}" class='close-btn close-notif-btn bx bx-x bx-sm text-gray-100'></i>
</div>
