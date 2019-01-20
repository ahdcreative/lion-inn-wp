<?php
/**
 * Template Name: Test
 */
?>

    <?php get_header(); ?>

<body class="montserrat">

    <h1>Test Page</h1>

    <?php

        if(function_exists('test_foo_out')){
            test_foo_out();
        }

        if (class_exists( 'LionMenu' )) {
            $lionMenu = new LionMenu();
            echo "Lion Class Created <br/>";
        }
        
        if(method_exists($lionMenu, 'test_foo_in')){
            $lionMenu->test_foo_in();
        } else {
            echo 'No In';
        }

    ?>

    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>