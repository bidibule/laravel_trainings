@extends('layouts.metronic')
@section('title','Groups ('.count($groups).')')
@section('content')

<div class="row">
  <div class="col-lg-6">

    <div class="kt-portlet">
      <div class="kt-portlet__body">
        <!--begin::Section-->
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-striped">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{ __('Name') }}</th>
                  <th scope="col">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($groups as $group)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $group->name }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('admin.groups.show',['id' => $group->id ]) }}">
                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip"
                          title="" data-original-title="{{ __('View') }}">
                          <i class="fa fa-eye"></i>
                        </button>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection