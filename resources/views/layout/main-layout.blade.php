
<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <!-- <meta name="generator" content="Jekyll v4.1.1"> -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>My Space</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

    <script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  </head>
  <body>
 
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 abc border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">My Space</h5>
  <nav class="my-2 my-md-0 mr-md-3 top-nav">
  <a class="p-2 text-dark {{(request()->route()->getName()=='home')?'active':''}}" href="{{route('home')}}">Home</a>
  <a class="p-2 text-dark{{(request()->route()->getName()=='getLogin')?'active':''}}" href="{{route('getLogin')}}">Login</a>
  </nav>
  <a class="btn btn-outline-primary {{(request()->route()->getName()=='getRegister')?'active':''}}" href="{{route('getRegister')}}">Sign up</a>
</div>
<script type="text/javascript">
  window.baseUrl="";
  @if(session('success'))
  toastr.success('{{session("success")}}', 'Success', {timeOut: 5000});
  @endif
  @if(session('error'))
  toastr.error('{{session("error")}}', 'Error', {timeOut: 5000});
  @endif
</script>
<div class="container-fluid" style="min-height: 74vh;">
@yield('body')
</div>



<script type="text/javascript" src="{{asset('js/auth.js')}}"></script>
</body>
</html>
