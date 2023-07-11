<div class="card card-custom mb-5 mt-4 calendar-container" id="history-calendar" style="display: none">
    <div class="card-body px-3 py-3">
        <div class="history-calendar">
            <div class="d-flex top-section w-100 justify-content-between mb-4">
                <div class="d-flex rounded-sm background-dark-40 overflow-hidden type-container">
                    <label class="font-size-container">
                        <input class="calendar-btn" value="request" type="radio" name="calendar" checked>
                        <span class="s-400 text-white">REQUEST</span>
                    </label>
                    <label class="font-size-container">
                        <input class="calendar-btn" value="cost" type="radio" name="calendar">
                        <span class="s-400 text-white">COST</span>
                    </label>
                </div>
                <div class="right-menu">
                    <label class="button-container">
                        <input class="calendar-btn" type="radio" name="calendar-type" value="all" checked>
                        <span class=""><i class='bx bxs-group'></i></span>
                    </label>
                    <label class="button-container">
                        <input class="calendar-btn" type="radio" name="calendar-type" value="user">
                        <span class=""><i class='bx bxs-user'></i></span>
                    </label>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn calendar-btn" onclick="prevDate()"><i class='bx bx-caret-left text-dark-70'></i></button>
                    <p class="m-0 text-dark-70 s-700" id="month">January 2023</p>
                    <button class="btn calendar-btn next" onclick="nextDate()"><i class='bx bx-caret-right text-dark-70'></i></button>
                </div>
            </div>

            <div class="calendar">
            </div>
        </div>
    </div>
</div>
