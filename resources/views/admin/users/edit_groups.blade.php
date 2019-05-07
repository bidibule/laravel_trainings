@extends('layouts.metronic')
@section('title','Edit group for '.$user->name)
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('Add new user')  }}
                    </h3>
                </div>
            </div>
            <form method="POST" action="/users/{{ $user->id }}/groups">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">

                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="groups">Groups</label>
                            <select multiple class="form-control" id="groups" name="groups[]">
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}"
                                    {{  in_array($group->id, old('groups', $user->groups->pluck('id')->toArray())) ? 'selected' : ''  }}>
                                    {{ $group->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-alt-primary">Update</button>

                        </div>

                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Add user</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection