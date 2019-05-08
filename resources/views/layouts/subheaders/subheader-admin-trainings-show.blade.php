<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">@yield('title')</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        @hasSection('subtitle')
        <span class="kt-subheader__desc">@yield('subtitle')</span>
        @endif
        <a href="{{  route('admin.trainings.edit',['id' => $training->id]) }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                {{ __('Edit') }}
        </a>
    </div>
    <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                  {{ __('Effective date') }}: {{ format_date( $training->effective_date) }}
                  &nbsp;&nbsp;
                  @switch($training->status) @case(0)
                  <span class="badge badge-secondary">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(1)
                  <span class="badge badge-dark">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(2)
                  <span class="badge badge-info">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(3)
                  <span class="badge badge-success">{{ config('app.training_statuses.'.$training->status) }}</span> @break 
                @endswitch         
    

            </div>
        </div>
</div>