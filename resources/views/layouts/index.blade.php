<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Astro Channels List & Lineup SD, HD</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script>
        window.Laravel = '{{csrf_token()}}';
    </script>
</head>
<body>
<!-- <div class="container">
    <div class="row">
        <div class="logoholder">
            <div class="astrologo"></div>
        </div>

    </div>
</div> -->
<nav class="deep-orange darken-1">
    <div class="nav-wrapper">
        <!-- <a href="#!" class="brand-logo c">Logo</a> -->
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <li><a href="#">HOME</a></li>
            <li><a href="#">TV GUIDE</a></li>
            <li><a href="#">CHANNELS</a></li>
            <li><a href="#">FAVOURITES</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="#">HOMES</a></li>
            <li><a href="#">TV GUIDE</a></li>
            <li><a href="#">CHANNELS</a></li>
            <li><a href="#">FAVOURITES</a></li>
        </ul>
        <form>
            <div class="input-field right">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
</nav>
<div class="container channelContainer" id="app">
    <!-- title channel -->
    <div class="row">
        <div class="col s6">
            <h1 class="mainTitle">Channels</h1>
        </div>
        <div class="col s6 channelRightSec">
            <ul class="right tabs">
                <li class="tab">
                    <router-link to="/">
                        <a href="/" v-bind:class="{active: isGrid }" v-on:click="displayGrid(true)" id="grid-channels">
                            <div class="icon icon-channel-grid"></div>
                        </a>
                    </router-link>
                </li>
                <li class="tab">
                    <router-link to="/list">
                        <a href="/list" v-bind:class="{active: (isGrid == false) }" v-on:click="displayGrid(false)" id="list-channels">
                            <div class="icon icon-channel-list"></div>
                        </a>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="row trending-top-sec">
        <div class="col s8">
            <div class="dropdownSec">
                <div class="dropdown desktop">
                    <a class='dropdown-button' href='#' data-activates='dropdown1'>CATEGORIES
                        <span class="icon-dropdown"></span>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content dropdown-menu'>
                        <li>
                            <label>
                                <span class="custom-checkbox selected"> <input type="checkbox" name="category"></span>
                                Kids
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Learning
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                LifeStyle
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Movies
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Music
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                News
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Radio
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Sport
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Kids
                            </label>
                        </li>
                        <li class="btn-Section">
                            <button class=" btn-apply"> APPLY</button>
                            <button class=" btn-clear"> CLEAR ALL</button>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="dropdownSec">
                <div class="dropdown desktop">
                    <a class='dropdown-button' href='#' data-activates='dropdown1'>LANGUAGES
                        <span class="icon-dropdown"></span>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content dropdown-menu'>
                        <li>
                            <label>
                                <span class="custom-checkbox selected"> <input type="checkbox" name="category"></span>
                                Chinese
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Indian
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                International
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Korean & Japanese
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Malay
                            </label>
                        </li>
                        <li>
                            <label>
                                <span class="custom-checkbox"> <input type="checkbox" name="category"></span>
                                Mutiple Language
                            </label>
                        </li>
                        <li class="btn-Section">
                            <button class=" btn-apply"> APPLY</button>
                            <button class=" btn-clear"> CLEAR ALL</button>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Dropdown Trigger -->
        </div>
        <div class="col s4 list-padding	">
            <ul class="rightSectionTopTrending">
                <li class=" HD tooltipped active" alt="HD Active logo" data-position="bottom" data-delay="50"
                    data-tooltip="HD Channels">
                    <div class="icon icon-hd-icon"></div>
                </li>
                <li class=" SD tooltipped" alt="SD Active logo" data-position="bottom" data-delay="50"
                    data-tooltip="SD Channels">
                    <div class="icon icon-sd-icon"></div>
                </li>
                <li class=" GO tooltipped" alt="GO Active logo" data-position="bottom" data-delay="50"
                    data-tooltip="Astro on the Go Channels">
                    <div class="icon icon-go-icon"></div>
                </li>
                <li class=" Heart tooltipped" alt="FAV logo" data-position="bottom" data-delay="50" v-on:click="selectFavourite()"
                    data-tooltip="My Favourite" id="favourites">
                    <div v-bind:class="{active: isFavourite, icon: true, 'icon-heart-icon': true}"></div>
                </li>
            </ul>
        </div>
    </div>
    <!-- mobile result filter dropdown-->
    <div class="row mobile-dropdow">
        <div class="col s12">
            <div class="select-style">
                <ul class="collapsible" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header">
                            <div id="refineDropdown" class="mobileSelectWrap dropdown-button"
                                 data-activates='dropdown-mobile'>REFINE RESULTS <span class="icon-dropdown"></span>
                            </div>
                        </div>
                        <div class="collapsible-body mobileSelectDropDown ">
                            <div class="dropdown desktop">
                                <a class='dropdown-button' href='#' data-activates='dropdown1-mobile'>CATEGORIES
                                    <span class="icon-dropdown"></span>
                                </a>

                                <!-- Dropdown Structure -->
                                <ul id='dropdown1-mobile' class='dropdown-content mobile-dropdown-menu'>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox selected"> <input type="checkbox"
                                                                                           name="category"></span>
                                            Kids
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Learning
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            LifeStyle
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Movies
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Music
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            News
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Radio
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Sport
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Kids
                                        </label>
                                    </li>
                                    <li class="btn-Section">
                                        <button class=" btn-apply"> APPLY</button>
                                        <button class=" btn-clear"> CLEAR ALL</button>
                                    </li>

                                </ul>
                            </div>
                            <div class="dropdown desktop">
                                <a class='dropdown-button' href='#' data-activates='dropdown2-mobile-language'>LANGUAGES
                                    <span class="icon-dropdown"></span>
                                </a>

                                <!-- Dropdown Structure -->
                                <ul id='dropdown2-mobile-language' class='dropdown-content mobile-dropdown-menu'>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox selected"> <input type="checkbox"
                                                                                           name="category"></span>
                                            Chinese
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Indian
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            International
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Korean & Japanese
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Malay
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span class="custom-checkbox"> <input type="checkbox"
                                                                                  name="category"></span>
                                            Mutiple Language
                                        </label>
                                    </li>
                                    <li class="btn-Section">
                                        <button class=" btn-apply"> APPLY</button>
                                        <button class=" btn-clear"> CLEAR ALL</button>
                                    </li>
                                </ul>
                            </div>
                            <ul class="rightSectionTopTrending mobile">
                                <li class=" HD tooltipped active" alt="HD Active logo" data-position="bottom"
                                    data-delay="50" data-tooltip="HD Channels">
                                    <div class="icon icon-hd-icon"></div>
                                </li>
                                <li class=" SD tooltipped" alt="SD Active logo" data-position="bottom" data-delay="50"
                                    data-tooltip="SD Channels">
                                    <div class="icon icon-sd-icon"></div>
                                </li>
                                <li class=" GO tooltipped" alt="GO Active logo" data-position="bottom" data-delay="50"
                                    data-tooltip="Astro on the Go Channels">
                                    <div class="icon icon-go-icon"></div>
                                </li>
                                <li class=" Heart tooltipped" alt="FAV logo" data-position="bottom" data-delay="50"
                                    data-tooltip="My Faverites">
                                    <div class="icon icon-heart-icon"></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- channel list -->
    <div class="wrapperChennel">
        <div class="row">
            <div class="col s12 gridrow">
                <router-view class="view">
                    @section('content')

                    @show
                </router-view>
            </div>
        </div>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12 m3">
            <div class="icon-block">

            </div>
        </div>
    </div>
</div>

<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's
                    our full time job. Any amount would help support and continue development on this project and is
                    greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="{{mix('/js/app.js')}}"></script>

</body>
</html>
