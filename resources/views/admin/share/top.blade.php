<div class="page-header">
    <div class="header-wrapper row m-0 justify-content-between">
        <div class="header-logo-wrapper img-20 p-0">
            <div class="toggle-sidebar" checked="checked"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-align-center status_toggle middle sidebar-toggle">
                    <line x1="18" y1="10" x2="6" y2="10"></line>
                    <line x1="21" y1="6" x2="3" y2="6"></line>
                    <line x1="21" y1="14" x2="3" y2="14"></line>
                    <line x1="18" y1="18" x2="6" y2="18"></line>
                </svg></div>
        </div>
        <div class="nav-right col-2 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="maximize">
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize">
                            <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <img class="b-r-10 img-40" src="{{Auth::guard('admin')->user()->anh_dai_dien}}" alt="anh_admin" style="height: 40px; object-fit: cover">
                        <div class="media-body">
                            <span>{{Auth::guard('admin')->user()->email}}</span>
                            <p class="mb-0 font-roboto">Admin</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
