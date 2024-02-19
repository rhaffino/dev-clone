<form class="tab-pane-inner" id="plagiarism-checker-form">
    <div class="upper class-name d-flex flex-column gap-5">
        <h2 class="h4-700 h4-m-700">@lang('plagiarism.survey-title')</h2>
        <div class="form-container pt-4">
            <div>
                <label for="" class="b1-400 b1-m-400">@lang('plagiarism.survey-q1')</label>
                <div class="input-group w-100">
                    <div class="d-flex justify-content-between align-items-center w-100 text-dark-20">
                        <div class="flex-1">1</div>
                        <div class="flex-1">2</div>
                        <div class="flex-1">3</div>
                        <div class="flex-1">4</div>
                        <div class="flex-1">5</div>
                        <div class="flex-1">6</div>
                        <div class="flex-1">7</div>
                        <div class="flex-1">8</div>
                        <div class="flex-1">9</div>
                        <div class="flex-1">10</div>
                    </div>
                    <input type="range" name="interest" id="interest" class="form-range w-100" min="1"
                        max="10" step="1" value="5">
                    <div class="d-flex justify-content-between align-items-center w-100 text-dark-20">
                        <div>@lang('plagiarism.survey-q1-left')</div>
                        <div>@lang('plagiarism.survey-q1-right')</div>
                    </div>
                </div>
            </div>
            <div>
                <label for="" class="b1-400 b1-m-400">@lang('plagiarism.survey-q2')</label>
                <div class="input-group w-100">
                    <div class="d-flex justify-content-between align-items-center w-100 text-dark-20">
                        <div class="flex-1">1</div>
                        <div class="flex-1">2</div>
                        <div class="flex-1">3</div>
                        <div class="flex-1">4</div>
                        <div class="flex-1">5</div>
                        <div class="flex-1">6</div>
                        <div class="flex-1">7</div>
                        <div class="flex-1">8</div>
                        <div class="flex-1">9</div>
                        <div class="flex-1">10</div>
                    </div>
                    <input type="range" name="frequency" id="frequency" class="form-range w-100" min="1"
                        max="10" step="1" value="5">
                    <div class="d-flex justify-content-between align-items-center w-100 text-dark-20">
                        <div>@lang('plagiarism.survey-q2-left')</div>
                        <div>@lang('plagiarism.survey-q2-right')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="buttons d-flex align-items-center justify-content-end gap-3">
        <button type="button" class="btn button-gray-10" onclick="$('#nav-hiw-tab').trigger('click')">
            @lang('plagiarism.nav-back')
        </button>
        <button type="submit" id="submit-survey-btn" class="btn button-primary-70">
            @lang('plagiarism.nav-submit')
        </button>
    </div>
</form>

@push('scripts')
    <script>
        $("#plagiarism-checker-form").on('submit', function(e) {
            const url = "{{ route('api.plagiarism.survey') }}";
            e.preventDefault();
            $("#submit-survey-btn").prop("disabled", true);

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    interest: $("#interest").val(),
                    frequency: $("#frequency").val(),
                },
                success: (res) => {
                    window.scrollTo(0, 0)
                    $(".form-element").hide()
                    $(".survey-success-container").show()
                    toastr.success('@lang("plagiarism.toast-success")')
                    $("#submit-survey-btn").prop("disabled", false)

                    localStorage.setItem('isFilledPlagiarism', 'true');
                },
                error: (e) => {
                    console.log('error', e);
                    toastr.error('@lang("plagiarism.toast-error")')
                    $("#submit-survey-btn").prop("disabled", false)
                },
                failed: () => {
                    console.log('failed');
                    toastr.error('@lang("plagiarism.toast-error")')
                    $("#submit-survey-btn").prop("disabled", false)
                }
            });
        })
    </script>
@endpush
