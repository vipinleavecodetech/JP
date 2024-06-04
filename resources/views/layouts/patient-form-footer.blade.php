 <!-- Footer Start -->
            <footer class="footer ml-0 l-0">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        2023 &copy; HEADS UP
                     </div>
                  </div>
               </div>
            </footer>
            <!-- end Footer -->
         </div>
         <!-- ============================================================== --> 
         <!-- End Page content -->
         <!-- ============================================================== -->
      </div>

      <!-- model -->
      <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h2 class="fs-title mt-5 text-center">No recommended treatment</h2>
                                    <p class="sub-header text-center">
                                        our health is our priority. To determine the most appropriate care for you, I would like you to be seen in person by a primary care provider or Urologist to further discuss your health history and symptoms. Thank you for trusting us with your care.
                                    </p>
                                    <h5 class="header-title text-center mb-4">Did you make a mistake answering?</h5>
                                    <div class="button-list my-model">
                                        <div class="button-list">
                                            <button class="btn btn-success waves-effect"> Change Your Answers </button>
                                            <button class="btn btn-white waves-effect">  Call us at (866) 294-3772 </button>
                                            
                                        </div>
                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

      <!-- model -->
      <!-- Vendor js -->
      <script src="{{ url('public/quiz-assets/js/vendor.min.js') }}"></script>
      <!-- plugin js -->
      <script src="{{ url('public/quiz-assets/libs/moment/moment.min.js') }}"></script>
      <script src="{{ url('public/quiz-assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>        
      <!-- App js -->
      <script src="{{ url('public/quiz-assets/js/app.min.js') }}"></script>
      <script src="{{ url('public/quiz-assets/js/quiz.js') }}"></script>
      <script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>-->
    
    <script>
      CKEDITOR.replace('editor', {
    height: '100px',
    width: '100%',
    placeholder: 'Write your Prescription Here....',
});


/*CKEDITOR.on('instanceReady', function(evt) {
    var instanceName = 'editor';
    var editor = CKEDITOR.instances[instanceName];
    editor.execCommand('maximize');
});

$(document).ready(function() {
    $('#page_effect').fadeIn(8000);
});*/
    </script>


  

      <script type="text/javascript">
         $(document).ready(function () {
        
          $('.cust_4opt').hide();
          $('.cust_6opt').hide();
          $('.cust_10opt').hide();
          $('.cust_12opt').hide();
          $('.cust_13opt').hide();
          $('.cust_16opt').hide();
          $('.cust_18opt').hide();
          $('.cust_25opt').hide();
          $('.cust_26opt').hide();
          $('.cust_29opt').hide();


        // For 4th Quiz
        $('#n-option4').on('click', function(){
          $('.cust_4opt').toggle();
        });
        // For 4th Quiz

         // For 6th Quiz

        $('#s-option6').on('click', function(){
          $('.cust_6opt').show();
        });

        $('#f-option6').on('click', function(){
         $('.cust_6opt').hide();
        });
        // For 6th Quiz

        // For 10th Quiz
          $('#i-option10').on('click', function(){
          $('.cust_10opt').toggle();
        });
        // For 10th Quiz

       // For 12th Quiz

        $('#b-option12').on('click', function(){
          $('.cust_12opt').show();
        });

        $('#a-option12').on('click', function(){
         $('.cust_12opt').hide();
        });
        // For 12th Quiz

         // For 13th Quiz

        $('#a-option13').on('click', function(){
          $('.cust_13opt').show();
        });

        $('#b-option13').on('click', function(){
         $('.cust_13opt').hide();
        });
        // For 13th Quiz

        // For 16th Quiz

        $('#b-option16').on('click', function(){
          $('.cust_16opt').show();
        });

        $('#a-option16').on('click', function(){
         $('.cust_16opt').hide();
        });
        // For 16th Quiz
  

         // For 16th Quiz

        $('#b-option18').on('click', function(){
          $('.cust_18opt').show();
        });

        $('#a-option18').on('click', function(){
         $('.cust_18opt').hide();
        });
        // For 16th Quiz
  

      // For 25th Quiz
        $('#f-option25').on('click', function(){
          $('.cust_25opt').show();
        });

        $('#a-option25,#b-option25,#c-option25,#d-option25,#e-option25,#g-option25').on('click', function(){
          $('.cust_25opt').hide();
        });
         

        // For 26th Quiz

        $('#b-option26').on('click', function(){
          $('.cust_26opt').show();
        });

        $('#a-option26').on('click', function(){
         $('.cust_26opt').hide();
        });
        // For 26th Quiz

        // For 29th Quiz

        $('#b-option29').on('click', function(){
          $('.cust_29opt').show();
        });

        $('#a-option29').on('click', function(){
         $('.cust_29opt').hide();
        });
        // For 29th Quiz
        
   });

        
      </script>
   </body>
</html>