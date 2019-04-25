@if(session('message'))
<div style="position: fixed; top: 3rem; right: 3rem; z-index: 9999999;">
    <div id="toast" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="si si-bubble text-primary mr-2">Title</i>
        <strong class="mr-auto"></strong>
        <small class="text-muted">just now</small>
        <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="toast-body">
          {{ session('message') }}
      </div>
    </div>
  </div>
@endif