<div>
    {{-- Be like water. --}}

    <div class="applyStepArea">


        @forelse ($questionScreens as $i => $item)
            <div class="applyStepSec {{ $item->sequence_no != $currentStep ? 'd-none' : 'd-block' }}">

                <div class="d-flex justify-content-between align-items-center applyStepSecHeader mb-4">
                    @if ($currentStep != 1)
                        <div class="bacck" style="font-size:20px;">

                            <a wire:click="prevStep"><i class="fa-regular fa-arrow-left"></i></a>
                        </div>
                    @else
                        <div class="bacck"></div>
                    @endif
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="fa-regular fa-xmark"></i></button>
                </div>

                <div class="progressBarArea mb-4">
                    <h6 class="mb-3">Preferences</h6>
                    <div class="progress">
                        @if ($currentStep != 1)
                            <div class="progress-bar" style="width: {{ (100 / $finalStep) * $currentStep }}%"></div>
                        @endif

                    </div>
                </div>
                <div class="applyStepSecinner">
                    <div class="form-group" id="accordion">
                        @forelse ($item->category as $j => $value)
                            @if ($item->category->count() > 1)
                                <div class="appStepAccordianArea">

                                    <div class="appStepAccordian">
                                        <div class="appStepAccordianItem  collapsed" id="headingOne-{{ $j }}"
                                            wire:key="item-{{ $j }}">
                                            <div data-toggle="collapse" data-target="#collapseOne-{{ $j }}"
                                                aria-expanded="true" aria-controls="collapseOne-{{ $j }}"
                                                wire:click="collapseSet({{ $j }})"
                                                class="d-flex justify-content-between align-items-center appStepAccordianHeader">
                                                <h5 class="title">{{ $value->name }}</h5>
                                                <span class="arrow"><i class="fa-regular fa-chevron-down"></i></span>
                                            </div>
                                            <div class=" collapse {{ $j == $collapseNum ? 'show' : '' }}"
                                                id="collapseOne-{{ $j }}"
                                                aria-labelledby="headingOne-{{ $j }}"
                                                data-parent="#accordion">
                                                <div class="mdCheckboxArea mb-4">
                                                    <div class="row rowBox">
                                                        @foreach ($value->subCategory as $k => $s_category)
                                                            @if ($value->type == 'checkbox')
                                                                <div
                                                                    class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                                    <div class="mdCheckbox mb-3">
                                                                        <input
                                                                            id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                                            type="{{ $value->type }}"
                                                                            wire:model="formData"
                                                                            value="{{ $s_category->id }}"
                                                                            wire:model.defer>
                                                                        <label
                                                                            for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                                                    </div>
                                                                </div>
                                                            @elseif($value->type == 'radio')
                                                                <div
                                                                    class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">
                                                                    <div class="mdradiobox mb-3">

                                                                        <input
                                                                            id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                                            type="{{ $value->type }}"
                                                                            wire:model="formDataStr"
                                                                            value="{{ $s_category->id }}">
                                                                        <label
                                                                            for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                                                    </div>
                                                                </div>
                                                            @elseif($value->type == 'text')
                                                                <div
                                                                    class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">
                                                                    <div class="mdradiobox mb-3">
                                                                        <input
                                                                            id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                                            type="{{ $value->type }}"
                                                                            wire:model="formDataStr" value="">
                                                                        <label
                                                                            for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @if ($value->type == 'dropdown')
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">

                                                            @if ($value->table_name == 'countries')
                                                                <select class="form-control" wire:model="country_id">
                                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                                        <option value="{{ $coun->id }}">
                                                                            {{ $coun->name }}
                                                                        </option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            @elseif($value->table_name == 'states')
                                                                <select class="form-control" wire:model="state_id">
                                                                    @forelse (DB::table($value->table_name)->where('country_id',$country_id)->get() as $coun)
                                                                        <option value="{{ $coun->id }}">
                                                                            {{ $coun->name }}
                                                                        </option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            @elseif($value->table_name == 'categories_of_educations')
                                                                <select class="form-control"
                                                                    wire:model="categories_of_education_id">
                                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                                        <option value="{{ $coun->id }}">
                                                                            {{ $coun->name }}
                                                                        </option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            @elseif($value->table_name == 'level_of_educations')
                                                                <select class="form-control"
                                                                    wire:model="level_of_education_id">
                                                                    @forelse (DB::table($value->table_name)->where('category_id', $categories_of_education_id)->get() as $coun)
                                                                        <option value="{{ $coun->id }}">
                                                                            {{ $coun->level_name }}
                                                                        </option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            @elseif($value->table_name == 'grading_schemes')
                                                                <select class="form-control"
                                                                    wire:model="grading_scheme_id">
                                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                                        <option value="{{ $coun->id }}">
                                                                            {{ $coun->scheme }}
                                                                        </option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <h4 class="mb-4"> {{ $value->name }}</h4>
                                <div class="mdCheckboxArea mb-4">

                                    @foreach ($value->subCategory as $k => $s_category)
                                        @if ($value->type == 'checkbox')
                                            <div class="mdCheckbox mb-3">
                                                <input id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                    type="{{ $value->type }}" wire:model="formData"
                                                    value="{{ $s_category->id }}">
                                                <label
                                                    for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                            </div>
                                        @elseif($value->type == 'radio')
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">
                                                <div class="mdradiobox mb-3">
                                                    <input id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                        type="{{ $value->type }}" wire:model="formDataStr"
                                                        value="{{ $s_category->id }}">
                                                    <label
                                                        for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                                </div>
                                            </div>
                                        @elseif($value->type == 'text')
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">
                                                <div class="mdradiobox mb-3">
                                                    <input id="{{ $item->sequence_no }}{{ $k . '-' . $j }}"
                                                        type="{{ $value->type }}" wire:model="formDataStr"
                                                        value="">
                                                    <label
                                                        for="{{ $item->sequence_no }}{{ $k . '-' . $j }}">{{ $s_category->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if ($value->type == 'dropdown')
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">

                                            @if ($value->table_name == 'countries')
                                                <select class="form-control" wire:model="country_id" required="">
                                                    <option value="">Select Country</option>
                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                        <option value="{{ $coun->id }}">{{ $coun->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            @elseif($value->table_name == 'states')
                                                <select class="form-control" wire:model="state_id" required="">
                                                    <option value="">Select State</option>
                                                    @forelse (DB::table($value->table_name)->where('country_id',$country_id)->get() as $coun)
                                                        <option value="{{ $coun->id }}">{{ $coun->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            @elseif($value->table_name == 'categories_of_educations')
                                                <select class="form-control" wire:model="categories_of_education_id"
                                                    required="">
                                                    <option value="">Select Category of education</option>
                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                        <option value="{{ $coun->id }}">{{ $coun->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            @elseif($value->table_name == 'level_of_educations')
                                                <select class="form-control" wire:model="level_of_education_id"
                                                    required="">
                                                    <option value="">Select Level of education</option>
                                                    @forelse (DB::table($value->table_name)->where('category_id', $categories_of_education_id)->get() as $coun)
                                                        <option value="{{ $coun->id }}">{{ $coun->level_name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            @elseif($value->table_name == 'grading_schemes')
                                                <select class="form-control" wire:model="grading_scheme_id"
                                                    required="">
                                                    <option value="">Select Grading Scheme</option>
                                                    @forelse (DB::table($value->table_name)->get() as $coun)
                                                        <option value="{{ $coun->id }}">{{ $coun->scheme }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @empty
                            <h4 class="mb-4"> {{ $item->label . ' ' . auth()->user()->name }}! </h4>
                            <p class="mb-4">{{ $item->description }}</p>
                        @endforelse
                        <div class="applyStepBtnArea">
                            {{-- @if (3 == $item->sequence_no) --}}
                            @if ($finalStep == $item->sequence_no)
                                <button type="button" wire:click="submit"
                                    class="applyStepBtn applyStepBtnNxt">Explore Programs
                                </button>
                            @else
                                <button type="button" wire:click="nextStep"
                                    class="applyStepBtn applyStepBtnNxt">Next
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>
</div>
