<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>

  <body>

	@include('layout.partials.topnav')
    
    <div class="container-fluid">
        <div class="row">
            
            @include('layout.partials.mainnav')
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  @yield('content')              
            </main>

	        @include('layout.partials.footer-scripts')

        </div>
    </div>
  </body>
</html>

{{ method_field('DELETE') }}