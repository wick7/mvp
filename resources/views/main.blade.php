
<!DOCTYPE html>
<html lang="en">
@include('partials._head')
    <body>
      <div class="main-content">
        @include('partials._messages')
        @yield('content')

      </div>

    </body>

    



      <!-- jQuery -->
      <script src="public/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="public/bootstrap/js/bootstrap.min.js"></script>

      <!-- Plugin JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

      <!-- Contact Form JavaScript -->
      <script src="js/jqBootstrapValidation.js"></script>
      <script src="js/contact_me.js"></script>

      <!-- Theme JavaScript -->
      <script src="js/agency.min.js"></script>

</html>
