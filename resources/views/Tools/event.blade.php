@extends('layouts.app')

@section('title', Lang::get('event.meta-title'))

@section('meta-desc', Lang::get('event.meta-desc'))

@section('conical','/en/json-ld-website-schema-generator')

@section('en-link')
en/json-ld-website-schema-generator
@endsection

@section('id-link')
id/json-ld-website-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('event.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal mb-10">@lang('event.subtitle')</span>
            <div class="card card-custom mt-10 mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue custom-searchbox" tabindex="null" data-size="4" data-live-search="true" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                        <option value="website">Website</option>
                                        <option value="local-business">Local Business</option>
                                        <option value="video">Video</option>
                                        <option value="event" selected="selected">Event</option>
                                        <option value="organization">Organization</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Events Generator</p>
                            <form action="" id="form-event">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label class="text-black font-weight-bold" for="nameEvent">@lang('event.label-name')</label>
                                        <input type="text" name="" class="form-control nameEvent mb-5" placeholder="@lang('event.placeholder-name')" value="">
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <label class="text-black font-weight-bold" for="imageUrl">@lang('event.label-imageUrl')</label>
                                                <input type="text" name="" class="form-control imageUrl" placeholder="@lang('event.placeholder-imageUrl')" value=""  data-id="0">
                                                <div class="invalid-feedback imageUrl" data-id="0">@lang('layout.invalid-url')</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-8 mb-lg-5">
                                        <label class="text-black font-weight-bold" for="descriptionVideo">@lang('event.label-description')</label>
                                        <textarea name="" class="form-control custom-textarea-82 descriptionVideo" placeholder="@lang('event.placeholder-description')" data-id="0"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12 col-xl-6">
                                        <div class="row mb-5">
                                            <div class="col-6">
                                                <label class="text-black font-weight-bold" for="startDate">@lang('event.label-start-date')</label>
                                                <div class="input-group date">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="bx bx-calendar text-darkgrey"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date startDate" readonly placeholder="@lang('event.placeholder-start-date')" value="" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="startTime" class="font-weight-bold text-black">@lang('event.label-startTime')</label>
                                                <input type="text" class="form-control startTime" name="" placeholder="@lang('event.placeholder-startTime')" value="" data-id="0" disabled>
                                                <div class="invalid-feedback startTime" data-id="0">@lang('layout.invalid-hours')</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="row mb-5">
                                            <div class="col-6">
                                                <label class="text-black font-weight-bold" for="endDate">@lang('event.label-end-date')</label>
                                                <div class="input-group date">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="bx bx-calendar text-darkgrey"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date endDate" readonly placeholder="@lang('event.placeholder-end-date')" value="" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="endTime" class="font-weight-bold text-black">@lang('event.label-endTime')</label>
                                                <input type="text" class="form-control endTime" name="" placeholder="@lang('event.placeholder-endTime')" value="" data-id="0" disabled>
                                                <div class="invalid-feedback endTime" data-id="0">@lang('layout.invalid-hours')</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12 col-xl-6 mb-5">
                                        <label class="text-black font-weight-bold" for="eventStatus">@lang('event.label-event-status')</label>
                                        <select class="form-control selectpicker custom-select-blue eventStatus">
                                            <option value="EventScheduled">@lang('event.event-status-opt-1')</option>
                                            <option value="EventPostponed">@lang('event.event-status-opt-2')</option>
                                            <option value="EventCancelled">@lang('event.event-status-opt-3')</option>
                                            <option value="EventMovedOnline">@lang('event.event-status-opt-4')</option>
                                            <option selected="selected" value="none">@lang('event.event-status-opt-0')</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <label class="text-black font-weight-bold" for="attendanceMode">@lang('event.label-attendance')</label>
                                        <select class="form-control selectpicker custom-select-blue attendanceMode">
                                            <option value="OnlineEventAttendanceMode">@lang('event.attendance-opt-1')</option>
                                            <option value="OfflineEventAttendanceMode">@lang('event.attendance-opt-2')</option>
                                            <option value="MixedEventAttendanceMode">@lang('event.attendance-opt-3')</option>
                                            <option selected="selected" value="none">@lang('event.attendance-opt-0')</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="onlineAttendance">
                                    <div class="row">
                                        <div class="col-12 col-xl-8 mb-5">
                                            <label class="text-black font-weight-bold" for="streamUrl">@lang('event.label-stream-url')</label>
                                            <input type="text" name="" class="form-control streamUrl" placeholder="@lang('event.placeholder-stream-url')" value="" data-id="0">
                                            <div class="invalid-feedback streamUrl" data-id="0">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="timeZone">@lang('event.label-time-zone')</label>
                                            <select id="timeZone" class="form-control selectpicker custom-select-blue custom-searchbox timeZone" data-size="4" data-live-search="true" tabindex="null">
                                                <option value="none">@lang('event.placeholder-time-zone')</option>
                                                @foreach($timezone as $t)
                                                    <option value="{{ $t['value'] }}">{{ $t['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="offlineAttendance">
                                    <div class="row">
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="vanue">@lang('event.label-vanue')</label>
                                            <input type="text" name="" class="form-control vanue" placeholder="@lang('event.placeholder-vanue')" value="">
                                        </div>
    
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="street">@lang('event.label-street')</label>
                                            <input type="text" name="" class="form-control street" placeholder="@lang('event.placeholder-street')" value="">
                                        </div>
    
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="city">@lang('event.label-city')</label>
                                            <input type="text" name="" class="form-control city" placeholder="@lang('event.placeholder-city')" value="">
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="country">@lang('event.label-country')</label>
                                            <select id="country" class="form-control selectpicker custom-select-blue custom-searchbox country mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                <option value="none">@lang('event.placeholder-country')</option>
                                                @foreach($country as $c)
                                                    <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="region">@lang('event.label-region')</label>
                                            <select id="region" class="form-control selectpicker custom-select-blue custom-searchbox region mb-5" data-size="4" data-live-search="true" tabindex="null" disabled>
                                                <option value="none">@lang('event.placeholder-region')</option>
                                                @foreach($province as $p)
                                                    <option value="{{ $p['code'] }}">{{ $p['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-12 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="zip">@lang('event.label-zip')</label>
                                            <input type="text" name="" class="form-control zip" placeholder="@lang('event.placeholder-zip')" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12 col-xl-6 mb-5">
                                        <label class="text-black font-weight-bold" for="performerType">@lang('event.label-performer-type')</label>
                                        <select class="form-control selectpicker custom-select-blue performerType">
                                            <option value="Person">@lang('event.performer-type-opt-1')</option>
                                            <option value="PerformingGroup">@lang('event.performer-type-opt-2')</option>
                                            <option value="MusicGroup">@lang('event.performer-type-opt-3')</option>
                                            <option value="DanceGroup">@lang('event.performer-type-opt-4')</option>
                                            <option value="TheaterGroup">@lang('event.performer-type-opt-5')</option>
                                            <option selected="selected" value="none">@lang('event.performer-type-opt-0')</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <label class="text-black font-weight-bold" for="performerName">@lang('event.label-performerName')</label>
                                        <input type="text" name="" class="form-control performerName mb-5" placeholder="@lang('event.placeholder-performerName')" value="" disabled>
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-5">
                                    <div class="col-12 col-md-4 mb-5 mb-md-0 d-flex align-items-end">
                                        <label class="text-black font-weight-bold" for="contentUrl">@lang('event.label-information')</label>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <button type="button" class="btn btn-block btn-add-question mt-8" name="button" id="add-ticket" disabled>
                                            <i class='bx bx-plus'></i> @lang('event.btn-addTicket')
                                        </button>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label class="text-black font-weight-bold" for="currency">@lang('event.label-currency')</label>
                                        <select id="currency" class="form-control selectpicker custom-select-blue custom-searchbox currency mb-5" data-size="4" data-live-search="true">
                                            <option value="none">@lang('event.placeholder-currency')</option>
                                            @foreach($currencies as $c)
                                                <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Add ticket Type = Dinamic -->
                                <div id="ticket-offers"></div>
                                
                            </form>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" style="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
                                    <div class="row mb-2">
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="copy" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-copy'></i> <span>@lang('layout.btn-copy')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="submit" id="test" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-check-circle'></i> <span>@lang('layout.btn-check')</span></button>
                                        </div>
                                        <div id="reset" class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" class="btn font-weight-bold reset" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" data-key="{{time()}}" readonly></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('event.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
    <div class="local-collection-mobile bg-white py-5">
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('event.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'JSON-LD Event Schema Generator')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2>@lang('event.title-1')</h2>
            <p>@lang('event.desc-1-1')</p>
            <p>@lang('event.desc-1-2')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            @lang('event.desc-1-3')
            <h2>@lang('event.title-2')</h2>
            <p>@lang('event.desc-2-1')</p>
            <p>@lang('event.desc-2-2')</p>
            <h3 class="sub-titles">@lang('event.desc-2-2-1')</h3>
            <p>@lang('event.desc-2-2-2')</p>
            <h3 class="sub-titles">@lang('event.desc-2-3-1')</h3>
            <p>@lang('event.desc-2-3-2')</p>
            <h3 class="sub-titles">@lang('event.desc-2-4-1')</h3>
            <p>@lang('event.desc-2-4-2')</p>
            <h3 class="sub-titles">@lang('event.desc-2-5-1')</h3>
            <p>@lang('event.desc-2-5-2')</p>
            <p>@lang('event.desc-2-5-3')</p>
            <h3 class="sub-titles">@lang('event.desc-2-6-1')</h3>
            <p>@lang('event.desc-2-6-2')</p>
            <p>@lang('event.desc-2-6-3')</p>
            <p>@lang('event.desc-2-6-4')</p>
            <h3 class="sub-titles">@lang('event.desc-2-7-1')</h3>
            <p>@lang('event.desc-2-7-2')</p>
            <p>@lang('event.desc-2-7-3')</p>
            <h3 class="sub-titles">@lang('event.desc-2-8-1')</h3>
            <p>@lang('event.desc-2-8-2')</p>
            <p>@lang('event.desc-2-8-3')</p>
            <h3 class="sub-titles">@lang('event.desc-2-9-1')</h3>
            <p>@lang('event.desc-2-9-2')</p>
            <h3 class="sub-titles">@lang('event.desc-2-10-1')</h3>
            <p>@lang('event.desc-2-10-2')</p>
        </div>
    @endslot
    @slot('subcontent_3')
        <div class="d-none" id="description-tab-3">
            <h2>@lang('event.title-3')</h2>
            <p>@lang('event.desc-3-1')</p>
            <p>@lang('event.desc-3-2')</p>
            <pre class="language-html mb-4">
                <code class="language-html" style="white-space: pre-wrap; word-break: keep-all;">
                    &lt;script type="application/ld+json"&gt;
                        {
                            "@context": "https://schema.org",
                            "@type": "Event",
                            "name": "",
                            "startDate": ""
                        }
                    &lt;/script&gt;
                </code>
            </pre>            
        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('event.howto-title-1')
            <div class="expand-text">
                @lang('event.howto-1')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_1.webp')}}" alt="HowTo-Event-1" width="80%">
                @lang('event.howto-2')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_2.webp')}}" alt="HowTo-Event-2" width="80%">
                @lang('event.howto-3')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_3.webp')}}" alt="HowTo-Event-3" width="80%">
                @lang('event.howto-4')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_4.webp')}}" alt="HowTo-Event-4" width="80%">
                @lang('event.howto-5')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_5.webp')}}" alt="HowTo-Event-5" width="80%">
                @lang('event.howto-6')
                <img class="mb-4" src="{{asset('/media/images/event_schema_instruction_6.webp')}}" alt="HowTo-Event-6" width="80%">
                @lang('event.howto-7')
                <p>@lang('event.closing-1')</p>
                <p>@lang('event.closing-2')</p>
                <p>@lang('event.closing-3')</p>
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">Read more</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('layout.home')",
            "item": "{{url('/')}}/{{$local}}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "JSON-LD Event Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-event-schema-generator"
        }]
    }
</script>
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const description_3 = document.getElementById('description-tab-3');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            description_3.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            description_3.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = 'Show less';
            read = true;
        } else {
            description_2.style.display = 'none';
            description_3.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            description_3.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = 'Read more';
            read = false;
        }
    });
</script>
@endpush
@push('script')
<script src="{{asset('js/logic/event-json.js')}}"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.min.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection