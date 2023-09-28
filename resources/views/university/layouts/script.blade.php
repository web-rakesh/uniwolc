  <!-- JavaScript -->
  <!--
         <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="assets/js/bootstrap.bundle.min.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
      integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="{{ asset('/') }}assets/js/our-partners.js"></script>
  <script src="{{ asset('/') }}assets/js/main.js"></script>
  <!-- Header Menu -->
  <script>
      $(document).ready(function() {
          // executes when HTML-Document is loaded and DOM is ready

          // breakpoint and up
          $(window).resize(function() {
              if ($(window).width() >= 980) {

                  // when you hover a toggle show its dropdown menu
                  $(".navbar .dropdown-toggle").hover(function() {
                      $(this).parent().toggleClass("show");
                      $(this).parent().find(".dropdown-menu").toggleClass("show");
                  });

                  // hide the menu when the mouse leaves the dropdown
                  $(".navbar .dropdown-menu").mouseleave(function() {
                      $(this).removeClass("show");
                  });

                  // do something here
              }
          });
      });
  </script>
  <!-- Header Menu End -->
  <!-- New on Awolc Tab -->
  <script>
      $('.nav-tabs-dropdown')
          .on("click", "li:not('.active') a", function(event) {
              $(this).closest('ul').removeClass("open");
          })
          .on("click", "li.active a", function(event) {
              $(this).closest('ul').toggleClass("open");
          });
  </script>
  <!-- New on Awolc Tab End -->
  <!-- dropdown menu btn -->
  <script>
      $('.dropdown-toggle').dropdown()
  </script>
  <!-- dropdown menu btn end -->
  <!-- Modal Video -->
  <script language="JavaScript">
      $(".VideoPopup").on('hidden.bs.modal', function(e) {
          $(".VideoPopup iframe").attr("src", $(".VideoPopup iframe").attr("src"));
      });
  </script>
  <script>
      $(document).ready(function() {
          $('#example').DataTable();
      });
  </script>
  <!-- Modal Video End -->
  <!-- JavaScript End -->


  <script>
      $(document).ready(function() {
          $('[data-toggle="tooltip"]').tooltip();
      });
  </script>
