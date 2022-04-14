<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
   
    <div class="credits">
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js');}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js');}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js');}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js');}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js');}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js');}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js');}}"></script>

  <script src="{{asset('js/app.js')}} "></script>
<script src="{{asset('js/notify.min.js')}}"></script>



  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js');}}"></script>


  <script>
    window.parseMessage = function (e){
        for(var a in e){
          return e[a][0] ;
        }
      }
            function notify(id=null,message='Something went wrong',position='top right',type='error',willReload=false,url=null,timeout=3000){
                if(id!=null && id != 'input[name=error]' && id!='input[name=error]') $(id).notify(
                                 message,
                                 {
                                     position:position,
                                     className:type
                                 }
                             );
            else  $.notify(
                    message,
                    {
                        position:'top right',
                        className:type
                    }
                );
                if (willReload) setTimeout(function () {
                      if(url==null)window.location.reload();
                      else window.location.href = url;
                    }, timeout)
            }
        </script>

</body>

</html>