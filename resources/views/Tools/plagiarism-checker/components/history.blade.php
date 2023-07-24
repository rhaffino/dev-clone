<div class="history mt-10" id="history-list" style="display: none">
    <ul class="history-tabs nav nav-tabs" id="myTab" role="tablist">
        <div class="d-flex">
            <i class='bx bxs-collection b5-400'></i>
            <p class="m-0 ml-2 b2-500">@lang('plagiarism.history')</p>
        </div>
        <li class="nav-item" role="presentation">
            <a class="nav-link active b2-500 text-decoration-underline" id="my-account-tab" data-toggle="tab"
                href="#my-account" role="tab" aria-controls="my-account" aria-selected="true">@lang('plagiarism.my_acc')</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link b2-500 text-underline" id="all-account-tab" data-toggle="tab" href="#all-account"
                role="tab" aria-controls="all-account" aria-selected="false">@lang('plagiarism.all_acc')</a>
        </li>

        <div class="align-self-end b2-400 text-dark-60 flex-grow-1 d-flex justify-content-end">
            <a href="">@lang('plagiarism.download')</a>
        </div>
    </ul>
    <div class="history-container tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="my-account" role="tabpanel" aria-labelledby="my-account-tab">
            @foreach ($userLogs as $log)
                <div class="card card-custom mb-5 mt-4">
                    <div class="card-body px-3 py-3 row align-items-center">
                        <div class="col-4 b2-400 text-dark-60">
                            {{ substr($log->content, 0, 58) }}...
                        </div>
                        <div class="col-2 b2-700 text-purple-70">
                            ${{ $log->cost }}
                        </div>
                        <div class="col-2 b2-700 text-primary-70">
                            {{ $log->word_count }} words
                        </div>
                        <div class="col-2 b2-400 text-dark-60">
                            {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'l, d F Y') }}
                        </div>
                        <div class="col-2 b2-400 text-dark-60">
                            {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'H:i') }}
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($userLogs) === 0)
                <div class="card card-custom mb-5 mt-4 py-3 d-flex align-items-center justify-content-center b2-400">
                    @lang('plagiarism.empty_history')
                </div>
            @endif
        </div>
        <div class="tab-pane fade" id="all-account" role="tabpanel" aria-labelledby="all-account-tab">
            @foreach ($cummulativeLogs as $log)
                <div class="card card-custom mb-5 mt-4">
                    <div class="card-body px-3 py-3 row align-items-center">
                        <div class="col-4 b2-400 text-dark-60">
                            {{ substr($log->content, 0, 58) }}...
                        </div>
                        <div class="col-2 b2-700 text-purple-70">
                            ${{ $log->cost }}
                        </div>
                        <div class="col-2 b2-700 text-primary-70">
                            {{ $log->word_count }} words
                        </div>
                        <div class="col-2 b2-400 text-dark-60">
                            {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'l, d F Y') }}
                        </div>
                        <div class="col-2 b2-400 text-dark-60">
                            {{ date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), 'H:i') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
