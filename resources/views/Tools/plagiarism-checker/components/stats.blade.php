<div class="card card-custom mb-5">
    <div class="card-body p-0 d-flex flex-column flex-lg-row overflow-hidden">
        <div class="col-12 col-lg-6 px-5 pt-4 pb-4 background-white">
            <div class="d-flex gap-4 text-dark-50">
                <i class='bx bxs-user'></i>
                <h3 class="b2-700 ml-2">ACCOUNT USAGE</h3>
            </div>
            <div class="row mt-2 text-dark-70">
                <div class="col-4">
                    <p class="s-400 m-0">
                        YOUR REQUEST
                    </p>
                    <p class="b1-700 m-0">
                        {{ $userSummaryLogs->user_requests }} times
                    </p>
                </div>
                <div class="col-4">
                    <p class="s-400 m-0">
                        WORDS CHECKED
                    </p>
                    <p class="b1-700 m-0">
                        {{ $userSummaryLogs->total_words ?? '0' }} WORDS
                    </p>
                </div>
                <div class="col-4">
                    <p class="s-400 m-0">
                        COST
                    </p>
                    <p class="b1-700 m-0">
                        ${{ $userSummaryLogs->total_cost ?? '0' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 background-dark-70 text-white px-5 pt-4 pb-4">
            <div class="d-flex gap-4">
                <i class='bx bxs-group text-white'></i>
                <h3 class="b2-700 ml-2">CUMMULATIVE USSAGE</h3>
            </div>
            <div class="mt-2 d-flex justify-content-between">
                <div class="">
                    <p class="s-400 m-0">
                        TEAM REQUEST </p>
                    <p class="b1-700 m-0"> {{ $cummulativeSummaryLogs->team_requests }} times
                    </p>
                </div>
                <div class="">
                    <p class="s-400 m-0">
                        USERS </p>
                    <p class="b1-700 m-0"> {{ $cummulativeSummaryLogs->total_users }}
                    </p>
                </div>
                <div class="col-3 flex-shrink-0">
                    <p class="s-400 m-0">
                        TOTAL WORDS </p>
                    <p class="b1-700 m-0"> {{ $cummulativeSummaryLogs->total_words }} WORDS
                    </p>
                </div>
                <div class="">
                    <p class="s-400 m-0">
                        COST </p>
                    <p class="b1-700 m-0"> ${{ $cummulativeSummaryLogs->total_cost }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
