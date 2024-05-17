<div class="floating-marketing-section">
    <div class="card card-custom card-floating-popup desktop hide d-none">
        <div class="card-header border-0">
            <div class="d-flex w-100 align-items-center justify-content-between mb-2">
                <h3 class="b1-700 p-0 m-0 text-white">
                    Test Title
                </h3>
                <i class='bx bx-x bx-sm d-sm-none text-white-50' id="dismiss-btn"></i>
            </div>
            <p class="text-white s-400 m-0">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, aliquam ipsam! Sapiente assumenda
                perferendis nihil, fugit unde et, fugiat repudiandae quo voluptate ducimus consequuntur aliquid
                distinctio. Eum accusantium nulla natus?
            </p>
        </div>
        <div class="card-body background-gray-10 p-0">
            <div class="px-2 mx-3 mt-3 rounded-3 py-2 s-400 text-dark-70 background-gray-40">Lorem, ipsum dolor sit amet
                consectetur adipisicing elit. Voluptatum voluptates
                <a href='{{ $lang == 'id' ? 'https://cmlabs.co/id-id/notification/pengumuman-waspada-penipuan-dengan-nama-cmlabs' : 'https://cmlabs.co/en-id/notification/announcement-beware-of-scam' }}'
                    class='text-primary-70 text-underline'>readm more</a>
            </div>
            <div class="d-flex flex-column people-container">
                {{-- @include('v2.widget.contact-list') --}}
            </div>
        </div>
        <div class="card-footer">
            <p class="text-dark-70 s-400">Schedule</p>
            <a class="mktcmlgtm_schedule_meeting d-flex text-decoration-none" href="#">
                <svg class="mktcmlgtm_schedule_meeting " width="18" height="20" viewBox="0 0 18 20"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 2H14V0H12V2H6V0H4V2H2C0.897 2 0 2.897 0 4V18C0 19.103 0.897 20 2 20H16C17.103 20 18 19.103 18 18V4C18 2.897 17.103 2 16 2ZM15 17H9V11H15V17ZM16 7H2V5H16V7Z"
                        fill="#0699F9" />
                </svg>
                <span class="mktcmlgtm_schedule_meeting ms-2 b2-700 text-primary-70">Schedule Meeting Now</span>
            </a>
        </div>
    </div>
    <div class="button-container d-flex flex-column align-items-end mt-3">
        <button class="btn btn-float-marketing align-items-center button-marketing">
            <i class="bx bxl-whatsapp bx-flashing bx-sm icon-open icon-xl"></i>
            <span>Contact</span>
        </button>
        <button class="btn btn-float-marketing align-items-center close">
            <i class="bx bx-x bx-sm icon-open icon-xl"></i>
            <span>Close</span>
        </button>
    </div>
</div>
