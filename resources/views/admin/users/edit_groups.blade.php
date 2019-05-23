@extends('layouts.metronic')
@section('title','Edit group')
@section('subtitle', $user->name)
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="kt-portlet">
            <form method="POST" action="/admin/users/{{ $user->id }}/groups">
                <div class="kt-portlet__body">
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
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Update groups</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')

<script type="text/javascript">
    // Class definition
    var KTSelect2 = function() {
        // Private functions
        var demos = function() {
    
            // multi select
            $('#groups, #kt_select_groups_validate').select2({
                placeholder: "Select groups",
            });
    
           
        }
    
        // Public functions
        return {
            init: function() {
                demos();
            }
        };
    }();
    
    // Initialization
    jQuery(document).ready(function() {
        KTSelect2.init();
    });
    
    </script>
    
@endsection