<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.partials.head')
  </head>

  <body>

	@include('layouts.partials.topnav')
    
    <div class="container-fluid">
        <div class="row">
            
            @include('layouts.partials.mainnav')
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  @yield('content')              
            </main>

	        @include('layouts.partials.footer-scripts')

        </div>
    </div>
  </body>
</html>

{{ method_field('DELETE') }}