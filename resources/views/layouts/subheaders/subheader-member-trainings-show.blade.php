<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">@yield('title')</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <span class="kt-subheader__desc">@yield('subtitle')</span>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        @if($training->pivot->status == 0)
            <span class="badge badge-warning"><i class="la la-warning"></i> {{ __('Incompleted') }}</span> 
        @else
            <span class="badge badge-success"><i class="la la-check"></i> &nbsp;{{ __('Completed on ').format_date($training->pivot->completion_date) }}</span>
        @endif
    </div>
    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            @if($training->pivot->status == 0)
            <form> @csrf @method('PATCH')
                <a href="#" class="btn kt-subheader__btn-primary" style="color: #959cb6"><i class="la la-check"></i> {{ _('Complete procedure') }}</a>
            </form>
            @endif
            <a href="#" class="btn kt-subheader__btn-primary btn-icon" title="{{ __('Download Procedure') }}"> <i class="la la-download"></i> </a>     
        </div>
       
    </div>

</div>