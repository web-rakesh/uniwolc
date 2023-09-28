<!-- JavaScript -->
<script src="{{ asset('/') }}assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/') }}assets/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{ asset('/') }}assets/js/our-partners.js"></script> --}}
<script src="{{ asset('/') }}assets/js/range-slider.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- <script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js'></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Header Menu -->
<script>
    //     $('.label.ui.dropdown')
    //     .dropdown();

    //   $('.no.label.ui.dropdown')
    //     .dropdown({
    //     useLabels: false
    //   });

    //   $('.ui.button').on('click', function () {
    //     $('.ui.dropdown')
    //       .dropdown('restore defaults')
    //   })
</script>
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
<!-- Modal Video End -->

<!-- JavaScript End -->
