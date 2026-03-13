 <div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo_light" height="24">
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo_sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo_dark" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#slider" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="slider">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.slider') }}" class="tp-link">All Slider</a>
                            </li>
                            <li>
                                <a href="{{ route('add.slider') }}" class="tp-link">Add Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#services" data-bs-toggle="collapse">
                        <i data-feather="tool"></i>
                        <span> Manage Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="services">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.services') }}" class="tp-link">All Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.services') }}" class="tp-link">Add Services</a>
                            </li>
                        </ul>
                    </div>
                </li>

                    <li>
                    <a href="#gateway" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span> Manage Gateway </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="gateway">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('gateway.one') }}" class="tp-link">Gateway One</a>
                            </li>
                            <li>
                                <a href="{{ route('gateway.two') }}" class="tp-link">Gateway Two</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#testimonial" data-bs-toggle="collapse">
                        <i data-feather="message-square"></i>
                        <span> Manage Testimonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="testimonial">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.testimonial') }}" class="tp-link">All Testimonials</a>
                            </li>
                            <li>
                                <a href="{{ route('add.testimonial') }}" class="tp-link">Add Testimonial</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#blogCategory" data-bs-toggle="collapse">
                        <i data-feather="folder"></i>
                        <span>Blog Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blogCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('blog.category') }}" class="tp-link">Blog Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#blogPost" data-bs-toggle="collapse">
                        <i data-feather="edit"></i>
                        <span>Blog Post </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blogPost">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.blog.posts') }}" class="tp-link">All Blog Posts</a>
                            </li>
                            <li>
                                <a href="{{ route('add.blog.post') }}" class="tp-link">Add Blog Post</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#siteSetting" data-bs-toggle="collapse">
                        <i data-feather="settings"></i>
                        <span>Site Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="siteSetting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('site.setting') }}" class="tp-link">Site Setting</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#about" data-bs-toggle="collapse">
                        <i data-feather="info"></i>
                        <span>About</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="about">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('about') }}" class="tp-link">About</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#contact" data-bs-toggle="collapse">
                        <i data-feather="mail"></i>
                        <span> Contact </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contact">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('contact') }}" class="tp-link">Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
