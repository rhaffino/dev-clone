<div
    class="modal fade"
    id="login-modal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" style="border-radius:16px">
            <div class="modal-header border-0 pb-2">
                <h1 class="font-weight-bolder">
                    @lang('modal.modal-login-title')
                </h1>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <i class="pb-2 bx bx-x bx-md"></i>
                </button>
            </div>
            <div class="modal-body py-2">
                @lang('modal.modal-login-text')
            </div>
            <div class="p-7">
                <div class="row justify-content-end">
                    <div class="col-sm-5">
                        <a
                            href="{{ env('MAIN_URL', 'https://cmlabs.co') }}/{{ App::isLocale('id') ? 'id-id' : 'en' }}/login/?logged_target={{ request()->url() }}"
                            class="btn btn-primary btn-sm btn-block font-weight-bolder"
                        >
                            Continue
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#login-modal').modal('show');
    });
</script>
