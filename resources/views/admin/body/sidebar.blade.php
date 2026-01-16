 <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo_light" height="24">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-dark">
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

                            <!-- <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> -->

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Manage Slider </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
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
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Manage Services </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
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
                                    <i data-feather="alert-octagon"></i>
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
                                    <i data-feather="alert-octagon"></i>
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

                            <li class="menu-title mt-2">General</li>

                            <li>
                                <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                    <i data-feather="package"></i>
                                    <span> Components </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarBaseui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ui-accordions.html" class="tp-link">Accordions</a>
                                        </li>
                                        <li>
                                            <a href="ui-alerts.html" class="tp-link">Alerts</a>
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
