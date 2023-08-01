<div class="card card-custom mb-5">
    <div class="card-body p-0 d-flex flex-column flex-lg-row overflow-hidden">
        <div class="col-12 col-lg-6 px-5 pt-4 pb-4 background-white">
            <div class="d-flex gap-4 text-dark-50">
                <i class='bx bxs-user'></i>
                <div class="b2-700 b2-m-700 ml-2">@lang('plagiarism.account_usage')</div>
            </div>
            <div class="row mt-2 text-dark-70">
                <div class="col-4">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.your_request')
                    </p>
                    <p class="b1-700 b1-m-700 m-0">
                        <span id="userReq">{{ $userSummaryLogs->user_requests }}</span>
                        @lang('plagiarism.times')
                    </p>
                </div>
                <div class="col-4">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.words_checked')
                    </p>
                    <p class="b1-700 b1-m-700 m-0">
                        <span id="userWord">{{ $userSummaryLogs->total_words ?? '0' }}</span> @lang('plagiarism.words')
                    </p>
                </div>
                <div class="col-4">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.cost')
                    </p>
                    <p class="b1-700 b1-m-700 m-0">
                        $<span id="userCost">{{ $userSummaryLogs->total_cost ?? '0' }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 background-dark-70 text-white px-5 pt-4 pb-4">
            <div class="d-flex gap-4">
                <i class='bx bxs-group text-white'></i>
                <div class="b2-700 b2-m-700 ml-2">@lang('plagiarism.cummulative_usage')</div>
            </div>
            <div class="mt-2 d-flex justify-content-between">
                <div class="">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.team_request') </p>
                    <p class="b1-700 b1-m-700 m-0"><span
                            id="teamReq">{{ $cummulativeSummaryLogs->team_requests }}</span> @lang('plagiarism.times')
                    </p>
                </div>
                <div class="">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.users') </p>
                    <p class="b1-700 b1-m-700 m-0"><span
                            id="teamTotal">{{ $cummulativeSummaryLogs->total_users }}</span>
                    </p>
                </div>
                <div class="col-3 flex-shrink-0">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.total_words') </p>
                    <p class="b1-700 b1-m-700 m-0"><span
                            id="teamWord">{{ $cummulativeSummaryLogs->total_words }}</span>
                        @lang('plagiarism.words')
                    </p>
                </div>
                <div class="">
                    <p class="s-400 s-m-400 m-0">
                        @lang('plagiarism.cost') </p>
                    <p class="b1-700 b1-m-700 m-0">$<span
                            id="teamCost">{{ $cummulativeSummaryLogs->total_cost }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>