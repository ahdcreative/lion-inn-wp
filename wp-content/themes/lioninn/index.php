<?php
/**
 * Template Name: Home
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lion Inn</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
</head>

<body class="montserrat" data-spy="scroll" data-target="#navbar-main">

    <!-- Background image at top of page -->
    <div class="home-bg-image"></div>

    <div class="container">
        <!-- Home section / landing page -->
        <div id="home" class="home p-0 d-flex flex-column" style="color: #FFF;">
            <!-- Header - logo and nav -->
            <nav id="navbar-main" class="header navbar navbar-expand-xl mb-5 pt-3 row fixed-top">
                <!-- Logo -->
                <a class="navbar-brand mr-0 p-0 pl-3 pl-xl-0 col-6 col-xl-1 offset-xl-2" href="#home">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png" width="75px" height="75px" alt="The Lion Inn Logo" />
                </a>
                <!-- Hamburger for smaller screens -->
                <div class="hamburger-container col-6 text-right p-0 d-xl-none">
                    <button class="navbar-toggler" id="hamburger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars" style="font-size:40pt; color:#FFF;"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse col-xl-6 p-0" id="navbarSupportedContent">
                    <ul class="navbar-nav row justify-content-center">
                        <li class="nav-item mr-xl-5 collapse-purple">
                            <a class="nav-link disabled pl-5 pt-xl-2 pl-xl-2 d-flex flex-column" href="#about-us">
                                <span class="my-auto">About Us</span>
                            </a>
                        </li>
                        <li class="nav-item mr-xl-5 collapse-white">
                            <a class="nav-link enabled pl-5 pt-xl-2 pl-xl-2 d-flex flex-column" href="#food">
                                <span class="my-auto">Food</span>
                            </a>
                        </li>
                        <li class="nav-item mr-xl-5 collapse-purple">
                            <a class="nav-link disabled pl-5 pt-xl-2 pl-xl-2 d-flex flex-column" href="#accommodation">
                                <span class="my-auto">Accommodation</span>
                            </a>
                        </li>
                        <li class="nav-item mr-xl-5 collapse-white">
                            <a class="nav-link enabled pl-5 pt-xl-2 pl-xl-2 d-flex flex-column" href="#events">
                                <span class="my-auto">Events</span>
                            </a>
                        </li>
                        <li class="nav-item mr-xl-5 collapse-purple">
                            <a class="nav-link disabled pl-5 pt-xl-2 pl-xl-2 d-flex flex-column" href="#gallery">
                                <span class="my-auto">Gallery</span>
                            </a>
                        </li>
                        <li class="nav-item collapse-hide">
                            <a class="nav-link enabled" href="#footer">Contact Us</a>
                        </li>
                        <!-- Footer just for mobile hamburger -->
                        <div class="footer mobile-footer py-2">
                            <div class="row contact text-center">
                                <div class="col-4 order-xl-1 col-xl-1 offset-xl-2">
                                    <i class="fas fa-phone mt-2"></i>
                                    <p class="mb-0 mt-1">01600 860322</p>
                                </div>
                                <div class="col-4 order-xl-2 col-xl-1">
                                    <i class="fas fa-envelope mt-2"></i>
                                    <p class="mb-0 mt-1">debs@globalnet.com</p>
                                </div>
                                <div class="col-4 order-xl-3 col-xl-1">
                                    <i class="fas fa-map-marker-alt mt-2"></i>
                                    <p class="mb-0 mt-1">Get Directions</p>
                                </div>
                                <div class="col-12 order-first order-xl-4 col-xl-2 algeria">
                                    <h3>THE LION INN</h3>
                                </div>
                                <div class="col-4 order-xl-5 col-xl-1">
                                    <a href="#">
                                        <i class="fab fa-google mt-2"></i>
                                    </a>
                                    <p class="mb-0 mt-1">Google</p>
                                </div>
                                <div class="col-4 order-xl-6 col-xl-1">
                                    <a href="https://www.tripadvisor.co.uk/Restaurant_Review-g552009-d732964-Reviews-Lion_Inn-Monmouth_Monmouthshire_South_Wales_Wales.html">
                                        <i class="fab fa-tripadvisor mt-2"></i>
                                    </a>
                                    <p class="mb-0 mt-1">TripAdvisor</p>
                                </div>
                                <div class="col-4 order-xl-7 col-xl-1">
                                    <a href="https://www.facebook.com/TheLionInnTrellech/">
                                        <i class="fab fa-facebook mt-2"></i>
                                    </a>
                                    <p class="mb-0 mt-1">Facebook</p>
                                </div>
                            </div>

                            <div class="copyright text-center mt-3 px-2">
                                <p class="mb-0">Copyright &copy; 2004 - 2018 All Content of this site is property of The Lion Inn and must not be reproduced without permission.  Every effort is made to ensure the details contained on this site are correct.  However, we cannot accept responsibility for errors and omissions.</p>
                            </div>
                        </div> <!-- End Footer -->
                    </ul>
                </div>

                <!-- Empty column-1 to center nav elements -->
                <div class="col-lg-1"></div>
            </nav>

            <div class="my-auto">
                <div class="center row">
                    <div class="col-xl-12 text-center mt-5 mb-3">
                        <h1 class="great-vibes m-0 mr-3 main-heading"><?php the_value( 'first_line' ) ?></h1>
                        <h4 class="m-0 to"><?php the_value( 'second_line' ) ?></h4>
                        <h1 class="algeria m-0 main-heading w-100"><?php the_value( 'third_line' ) ?></h1>
                    </div>
                </div>

                <div class="buttons row">
                    <div class="col-3 col-sm-2 offset-sm-2 col-md-2 offset-md-2 col-lg-2 offset-lg-3 col-xl-1 offset-xl-4 p-0 pr-lg-2 px-xl-0 text-right">
                        <button type="button" class="btn btn-transparent btn-lg p-0 py-sm-2 px-3 m-xl-0">
                            <a href="#food">
                                <i class="fas fa-utensils btn-icon"></i>
                            </a>
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2 offset-xl-0 p-0 text-center">
                        <button type="button" class="btn btn-lg py-1 px-2 btn-phone">
                            <span class="phone-no">01600 860322</span>
                        </button>
                    </div>
                    <div class="col-3 col-sm-4 col-md-2 col-lg-2 col-xl-1 p-0 pl-lg-2 px-xl-0 text-md-left">
                        <button type="button" class="btn btn-transparent btn-lg p-0 py-sm-2 px-3 m-xl-0">
                            <a href="#accommodation">
                                <i class="fas fa-bed btn-icon"></i>
                            </a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="arrow row mt-auto mb-4">
                <div class="col-12 text-center">
                    <a href="#food">
                        <i class="fas fa-arrow-circle-down btn-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- <div id="about-us" class="about-us">

        </div> -->

    </div> <!-- Container -->

    <!-- Background image for FOOD section -->
    <div class="food-bg-image"></div>

    <div class="container">

        <div id="food" class="food my-5">
            <div class="title text-center">
                <h1 class="great-vibes section-heading">Food</h1>
            </div>

            <div class="menu row">
                <div class="left col-lg-6 offset-lg-1 text-center">
                    <h2 class="great-vibes minor-heading">Menu</h2>
                    <div class="mt-3 desc">
                        <p>
                            The menus range from traditional pub grub, through to the exotic and unheard of; with children and vegetarians being catered for. Sourcing the majority of the produce within 10 miles of the pub.  For example, the meats come from the local communities of Shirenewton, Raglan & Trellech.  A "standard" menu is provided within the pub along with a number of "specials" menus.
                        </p>
                        <p>
                            The specials boards change regularly and often feature dishes that offer new eating experiences for more adventurous diners. Regular favourites include Beef Stroganoff, Chicken in a creamy Tarragon sauce, Kangaroo steak, Ostrich with a creamy garlic sauce, Pork steak with a cider sauce and Duck.
                        </p>
                        <p>
                            Special menu’s are created for Easter Sunday and Mother’s Day.  Takeaway pizza’s are also available.
                        </p>
                    </div>
                    <a class="btn btn-sm mt-3" href="menu">
                        <span class="px-1">View Menu</span>
                    </a>
                </div>

                <div class="right col-lg-3 offset-lg-1" style="overflow: hidden; position: relative; width: 100%;">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/images/menu.png" alt="Image of Menu" style="background:green; height: 100%; width: auto; position: absolute; right: 0; top: 0; object-fit: cover;" />
                </div>
            </div>

            <div class="book-table row mt-5">
                <div class="times col-lg-4 text-center py-4">
                    <h2 class="great-vibes minor-heading">Times</h2>
                    <i class="far fa-clock"></i>
                    <div class="opening-times">
                        <h4 class="mt-3">Opening Times</h4>
                        <hr class="bg-light mx-auto mt-0"/>
                        <p>
                            Monday - Wednesday <br/>
                            12:00 - 23:00 <br/>
                            Thursday - Saturday <br/>
                            12:00 - 00:00 <br/>
                            Sunday <br/>
                            12:00 - 22:00
                        </p>
                    </div>
                    <div class="dining-times">
                        <h4 class="mt-3">Dining Times</h4>
                        <hr class="bg-light mx-auto mt-0"/>
                        <p>
                            Monday - Saturday <br/>
                            12:00 - 21:30 <br/>
                            Sunday <br/>
                            12:00 - 18:00
                        </p>
                    </div>
                </div>

                <div class="reservation col-lg-8 text-center pt-4">
                    <h2 class="great-vibes minor-heading">Reservation</h2>
                    <i class="fas fa-book-open"></i>
                    <h4 class="mt-3">Please call us on the number below.</h4>
                    <p class="mt-5">
                        Please mention any special dietary requirements </br>
                        (vegetarian, gluten free, peanut allergy).
                    </p>
                    <p>
                        Please also mention if you are bringing a dog.
                    </p>
                    <div class="icons mt-4">
                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/pet-friendly.png" alt="Image of Pet Friendly Icon" />
                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/vegetarian.png" alt="Image of Vegetarian Icon" />
                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/gluten-free.png" alt="Image of Gluten Free Icon" />
                    </div>
                    <div class="book-now mt-4 mb-lg-0 mb-3">
                        <h4 class="great-vibes mb-0">Book Now</h4>
                        <button type="button" class="btn btn-lg mt-4 py-1 px-3">
                            <span>01600 860322</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div id="accommodation" class="accommodation">
            <div class="cottage">

            </div>

            <div class="cards">

            </div>

            <div class="phone-number">

            </div>
        </div> -->
    </div> <!-- Container -->

    <!-- Container fluid used just so that I can have full width background -->
    <div class="container-fluid bg-light pb-4">
        <div class="container">

            <div id="events" class="events mt-5 pt-5">
                <div class="title text-center">
                    <h1 class="great-vibes section-heading">Events</h1>
                </div>
                <!-- NOTE - use toggleable tabs for regular events section -->
                <div class="regular">
                    <h2 class="montserrat row event-sub-heading mb-0">Regular Events</h2>
                    <hr class="row mt-2"/>
                    <!-- Day Titles -->
                    <div class="row week-days week-days-titles">
                        <div class="col-1 p-0">Monday</div>
                        <div class="col-1 p-0">Tuesday</div>
                        <div class="col-1 p-0">Wednesday</div>
                        <div class="col-1 p-0">Thursday</div>
                        <div class="col-1 p-0">Friday</div>
                        <div class="col-1 p-0">Saturday</div>
                        <div class="col-1 p-0">Sunday</div>
                    </div>

                    <!-- Clickable Tabs -->
                    <ul class="nav nav-tabs row week-days text-center" id="myTab" role="tablist">
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link active p-0 d-flex flex-column" id="monday-tab" data-toggle="tab" href="#monday" role="tab" aria-controls="monday" aria-selected="true">
                                <i class="fas fa-microphone-alt m-auto"></i>
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab" aria-controls="tuesday" aria-selected="false">
                                <img class="m-auto" src="<?php echo get_bloginfo('template_directory'); ?>/images/cards.png" alt="Image of Card Deck" />
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="wednesday-tab" data-toggle="tab" href="#wednesday" role="tab" aria-controls="wednesday" aria-selected="false">
                                <i class="fas fa-question-circle m-auto"></i>
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab" aria-controls="thursday" aria-selected="false">
                                <img class="m-auto" src="<?php echo get_bloginfo('template_directory'); ?>/images/darts.png" alt="Image of Dart Board" />
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="friday-tab" data-toggle="tab" href="#friday" role="tab" aria-controls="friday" aria-selected="false">
                                <i class="fas fa-fish m-auto"></i>
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="saturday-tab" data-toggle="tab" href="#saturday" role="tab" aria-controls="saturday" aria-selected="false">
                                <i class="fas fa-minus m-auto"></i>
                            </a>
                        </li>
                        <li class="nav-item col-1 p-0">
                            <a class="nav-link p-0 d-flex flex-column" id="sunday-tab" data-toggle="tab" href="#sunday" role="tab" aria-controls="sunday" aria-selected="false">
                                <i class="fas fa-music m-auto"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Event information -->
                    <div class="tab-content row week-days" id="myTabContent" style="background-color: #FFF;">
                        <div class="col-1"></div> <!-- Empty div to help format page - align event info -->
                        <div class="tab-pane fade show active my-4" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                            <h3>Open Mic Night</h3>
                            <p class="mt-3 mb-2">
                                Come along the 1st & 3rd Monday night every month.
                            </p>
                            <p>
                                If you play an instrument or sing, or just enjoy entertaining come along fun begins at 8.30pm.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                            <h3>Cribb</h3>
                            <p class="mt-3 mb-2">
                                The Lion Inn participates in the local cribb league during the winter.
                            </p>
                            <p>
                                During the summer an in-house friendly ladder league is run - all are welcome.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                            <h3>Quiz</h3>
                            <p class="mt-3 mb-2">
                                The Lion Inn participates in the local quiz league during the winter.
                            </p>
                            <p>
                                During the summer on the 1st & 3rd Wednesday The Lion Inn hosts a friendly quiz night - all are welcome.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                            <h3>Darts</h3>
                            <p class="mt-3 mb-2">
                                The Lion Inn participates in the local darts league during the winter.
                            </p>
                            <p>
                                During the summer the darts team practice all are welcome to join in and take on the team members.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                            <h3>Fish on Friday</h3>
                            <p class="mt-3 mb-2">
                                Come along every Friday.
                            </p>
                            <p>
                                A choice of plaice or cod for £7.50.  Served with chips and peas (garden / mushy).  6:30 - 8:30pm.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">
                            <h3>No Regular Events</h3>
                            <p class="mt-3 mb-2">
                                No regular events happen on a Saturday.
                            </p>
                            <p>
                                Food is served as normal, until 9:30pm.  The pub closes at midnight.
                            </p>
                        </div>
                        <div class="tab-pane fade my-4" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">
                            <h3>Twilight Jazz</h3>
                            <p class="mt-3 mb-2">
                                Come along on the 2nd Sunday of every month.
                            </p>
                            <p>
                                If you enjoy jazz, this is the night for you. Come and join us.  Fun begins at 5pm.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="upcoming mt-5 mb-0 pb-0">
                    <h2 class="row montserrat event-sub-heading mb-0">Upcoming Events</h2>
                    <hr class="row mt-2"/>

                    <!-- DEC 24 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">24</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/xmas-meal.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">Christmas Eve</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 12:00am
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Carols around the fire. <br/>
                                Grand Christmas Raffle at 6:00pm. <br/>
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <hr />

                    <!-- DEC 25 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">25</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/xmas-stock.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">Christmas Day</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 2:00pm
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Show off your new Christmas Jumper whilst your lunch is cooking.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <hr />

                    <!-- DEC 26 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">26</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/rugby.jpg" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0 mb-0 mt-1 mt-lg-0">Boxing Day</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 5:00pm
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Boxing Day & Village Rugby Match. <br />
                                Food available until 4:00pm. <br />
                                Advisable to book.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <hr />

                    <!-- DEC 27 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">27</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/xmas-quiz.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">Christmas Quiz</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 12:00am
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Christmas Quiz. <br />
                                Fun begins at 8:00pm.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <hr />

                    <!-- DEC 28 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">28</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/karaoke.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">Christmas Karaokee</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 12:00am
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Christmas Karaokee. <br />
                                Pain begins at 9:00pm.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <hr />

                    <!-- DEC 31 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">DEC</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">31</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/nye-stock.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">New Years Eve</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Open 12:00pm - 12:00am
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Food available 12:00pm - 6:00pm. <br />
                                Party and food to see into the new year. <br />
                                Come and meet the rest of the village. Free Entry.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>

                    <!-- JAN 01 Event -->
                    <div class="row mt-3">
                        <div class="date col-2 col-lg-1">
                            <p class="month mb-0">JAN</p>
                            <hr class="text-left bg-light my-0"/>
                            <p class="day mt-0">01</p>
                        </div>

                        <div class="image col-10 col-lg-5">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/closed.png" alt="Placeholder Event Image" class="event-image" />
                        </div>

                        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                            <h2 class="event-title mb-0 mt-1 mt-lg-0">New Years Day</h2>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p class="my-1 mt-lg-0">
                                Sorry, Closed All Day.
                            </p>
                            <hr class="text-left bg-light my-1 my-lg-2"/>
                            <p>
                                Back to normal Wednesday 2nd January.
                            </p>
                        </div>
                        <div class="more col-5 offset-2 offset-lg-0 col-md-2 col-lg-2 d-flex flex-column">
                            <a href="#" class="mt-auto ml-lg-auto"><!-- More Info... --></a>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- Container -->

    </div> <!-- Container Fluid -->

    <div class="container-fluid footer-bg">
        <div class="container">

            <!-- <div id="gallery" class="gallery">

            </div> -->


            <div id="footer" class="footer py-2">
                <div class="row contact text-center">
                    <div class="col-4 order-lg-1 col-lg-1 offset-lg-2">
                        <i class="fas fa-phone mt-2"></i>
                        <p class="mb-0 mt-1">01600 860322</p>
                    </div>
                    <div class="col-4 order-lg-2 col-lg-1">
                        <i class="fas fa-envelope mt-2"></i>
                        <p class="mb-0 mt-1 overflow">debs@globalnet.com</p>
                    </div>
                    <div class="col-4 order-lg-3 col-lg-1">
                        <i class="fas fa-map-marker-alt mt-2"></i>
                        <a href="https://maps.google.com/?q=51.7460885,-2.7240651&t=m" target="_blank">
                            <p class="mb-0 mt-1">Get Directions</p>
                        </a>
                    </div>
                    <div class="col-12 order-first order-lg-4 col-lg-2 algeria d-flex flex-column">
                        <h2 class="my-auto">THE LION INN</h2>
                    </div>
                    <div class="col-4 order-lg-5 col-lg-1">
                        <a href="#">
                            <i class="fab fa-google mt-2"></i>
                        </a>
                        <p class="mb-0 mt-1">Google</p>
                    </div>
                    <div class="col-4 order-lg-6 col-lg-1">
                        <a href="https://www.tripadvisor.co.uk/Restaurant_Review-g552009-d732964-Reviews-Lion_Inn-Monmouth_Monmouthshire_South_Wales_Wales.html">
                            <i class="fab fa-tripadvisor mt-2"></i>
                        </a>
                        <p class="mb-0 mt-1">TripAdvisor</p>
                    </div>
                    <div class="col-4 order-lg-7 col-lg-1">
                        <a href="https://www.facebook.com/TheLionInnTrellech/">
                            <i class="fab fa-facebook mt-2"></i>
                        </a>
                        <p class="mb-0 mt-1">Facebook</p>
                    </div>
                </div>

                <div class="copyright text-center mt-3">
                    <p class="mb-0">Copyright &copy; 2004 - 2018 All Content of this site is property of The Lion Inn and must not be reproduced without permission.  Every effort is made to ensure the details contained on this site are correct.  However, we cannot accept responsibility for errors and omissions.</p>
                </div>

                <div class="feedback row mt-3">
                    <div class="col-4 offset-8 col-md-3 offset-md-9">
                        <a href="https://www.surveymonkey.co.uk/r/YWJWPG8" target="_blank">
                            <button type="button" href="" class="btn btn-sm btn-feedback py-1 px-2">
                                <i class="fas fa-comment"></i>
                                Feedback
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- Container -->

    </div> <!-- Container Fluid -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="<?php echo get_bloginfo('template_directory'); ?>/script.js"></script>
</body>
</html>
