  
$(document).ready(function(){
    var lion_purple = "#673ab7";

    // Add / Remove 'd-flex flex-column' classes from navbar based on screen width
    // They are needed above 1200px to center nav but cause issues below 1200px
    var toggleFlexClasses = function() {
        var width = $(window).width();

        if (width < 1200) {
            $("#navbarSupportedContent").removeClass("d-flex flex-column");
        }
        else {
            $("#navbarSupportedContent").addClass("d-flex flex-column");
        }
    }

    $(window).resize(function() {
        toggleFlexClasses();
    });
    // Check size and classes when page loads
    toggleFlexClasses();

    // Change navbar background colour, font colour and hamburger icon
    // Once navbar gets to FOOD section
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();

        if (scroll > 800) {
            $(".header").css("background" , "#FFF");
            $(".header a.enabled").css("color" , "#000");
            $(".navbar-toggler i").css("color" , lion_purple);
        }

        else {
            $(".header").css("background" , "transparent");
            $(".header a.enabled").css("color" , "#FFF");
            $(".navbar-toggler i").css("color" , "#FFF");
        }
    });

    // On hamburger click
    // Change header section (where logo and hamburger is)
    $('#hamburger').click(function() {
        // Toggle hamburger colour
        $(".navbar-toggler i").toggleClass("purple-hamburger");
        // Toggle background colour
        $("#navbar-main").toggleClass("clicked");
    });

    // Close navbar when a nav element link is clicked
    $(".navbar-nav li a").click(function(event) {
        $(".navbar-collapse").collapse('hide');
    });
})
