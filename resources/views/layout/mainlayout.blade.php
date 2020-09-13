<!DOCTYPE html>
<html lang="en">
 <head>
   @include('layout.partials.head')
 </head>
 <body>
@include('layout.partials.nav')
@include('layout.partials.masthead')
@include('layout.partials.midnav')
@include('layout.partials.iconsgrid')
@include('layout.partials.imageshowcase')
@yield('content')
@include('layout.partials.footer')
@include('layout.partials.footer-scripts')
 </body>
</html>