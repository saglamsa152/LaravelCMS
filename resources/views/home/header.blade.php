<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="{{URL::action('HomeController@getIndex')}}">
                                <?= Html::image('assets/home/images/logo.png','Logo') ?>
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li class="<?php if(str_contains(URL::current(),'/')) echo ' current'?>"><a href="{{URL::action('HomeController@getIndex')}}">Home</a></li>
                            <li class="<?php if(str_contains(URL::current(),'about')) echo ' current'?>">
                                <a href="{{URL::action('HomeController@getAbout')}}">About</a>
                                <ul>
                                    <li><a href="#">Lorem ipsum</a></li>
                                    <li><a href="#">Dolor sit amet</a>
                                    <li><a href="#">Ctetur adipisicing</a>
                                    <li><a href="#">Elit sed do</a>
                                        <ul>
                                            <li><a href="#">Iusmod tempor</a></li>
                                            <li><a href="#">Incididunt ut labore</a></li>
                                            <li><a href="#">Et dolore magna</a></li>
                                            <li><a href="#">Aliqua Ut enim</a></li>
                                            <li><a href="#">Minim veniam</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(str_contains(URL::current(),'services')) echo ' current'?>"><a href="{{URL::action('HomeController@getServices')}}">Services</a></li>
                            <li class="<?php if(str_contains(URL::current(),'blog')) echo ' current'?>"><a href="{{URL::action('HomeController@getBlog')}}">Blog</a></li>
                            <li class="<?php if(str_contains(URL::current(),'contact')) echo ' current'?>"><a href="{{URL::action('HomeController@getContact')}}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>