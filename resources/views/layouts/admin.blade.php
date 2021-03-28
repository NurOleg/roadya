<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="author" content="" />


    <title>Table basic | Eleven Admin Template</title>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/jquery-3.4.1.slim.min.js') }}"></script>
</head>
<body>
<svg width="24" height="24" viewBox="0 0 24 24" style="display:none">
    <g
        id="logo-icon"
        stroke="currentColor"
        stroke-width="1"
        stroke-linecap="round"
        stroke-linejoin="round"
        fill="none"
        fill-rule="evenodd"
    >
        <path
            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"
        ></path>
    </g>
</svg>

<div class="page page-sticky-sidebar">
    <div class="app-header" style="display: none; visibility: hidden;">
        <nav class="bg-white navbar">
            <ul class="navbar-nav">
                <a href="/" class="navbar-brand">
                    <svg width="24" height="24">
                        <use xlink:href="#logo-icon"></use>
                    </svg>
                    <span class="ml-2">Eleven</span>
                </a>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/calendar" class="nav-link">Calendar</a>
                </li>
                <li class="nav-item">
                    <a href="/messages" class="nav-link">Messages</a>
                </li>
            </ul>
            <div class="search input-group d-none d-sm-flex">
                <div class="input-group-prepend">
              <span class="input-group-text">
                <span class="animated-icon">
                  <div
                      style="width:20px;height:20px"
                      data-animation-path="vendor/animated-icons/search-cancel/search-cancel.json"
                  ></div>
                </span>
              </span>
                </div>
                <input
                    type="text"
                    placeholder="Search dashboard"
                    class="form-control"
                />
            </div>
            <ul class="ml-auto menu-right navbar-nav">
                <li class="nav-item">
                    <a class="nav-link toggle-fullscreen" href="javascript:;">
                <span class="animated-icon">
                  <div
                      style="width:18px;height:18px"
                      data-animation-path="vendor/animated-icons/fullscreen/fullscreen.json"
                  ></div>
                </span>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        href="#"
                        class="nav-link"
                        aria-expanded="false"
                    >
                <span class="animated-icon">
                  <div
                      style="width:18px;height:18px"
                      data-animation-path="vendor/animated-icons/toggle/toggle.json"
                  ></div>
                </span>
                    </a>
                    <div
                        tabindex="-1"
                        role="menu"
                        aria-hidden="true"
                        class="app-settings dropdown-menu dropdown-menu-right"
                    >
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Settings
                        </button>
                        <div tabindex="-1" class="m-0 dropdown-divider"></div>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="darkModeOption" class="m-0">Dark mode</label>
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="darkModeOption"
                                    name="darkModeOption"
                                    class="custom-control-input"
                                />
                                <label
                                    class="custom-control-label"
                                    for="darkModeOption"
                                ></label>
                            </div>
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="boxedOption" class="m-0">Boxed layout</label>
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="boxedOption"
                                    name="boxedOption"
                                    class="custom-control-input"
                                />
                                <label
                                    class="custom-control-label"
                                    for="boxedOption"
                                ></label>
                            </div>
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="stickyHeaderOption" class="m-0"
                            >Sticky header</label
                            >
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="stickyHeaderOption"
                                    name="stickyHeaderOption"
                                    class="custom-control-input"
                                />
                                <label
                                    class="custom-control-label"
                                    for="stickyHeaderOption"
                                ></label>
                            </div>
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="stickySidebarOption" class="m-0"
                            >Sticky sidebar</label
                            >
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="stickySidebarOption"
                                    name="stickySidebarOption"
                                    class="custom-control-input"
                                    checked=""
                                />
                                <label
                                    class="custom-control-label"
                                    for="stickySidebarOption"
                                ></label>
                            </div>
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="collapsedSidebarOption" class="m-0"
                            >Collapsed sidebar</label
                            >
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="collapsedSidebarOption"
                                    name="collapsedSidebarOption"
                                    class="custom-control-input"
                                />
                                <label
                                    class="custom-control-label"
                                    for="collapsedSidebarOption"
                                ></label>
                            </div>
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="d-flex align-items-center justify-content-between dropdown-item"
                        >
                            <label for="topHeaderOption" class="m-0">Top header</label>
                            <div class="custom-switch custom-control">
                                <input
                                    type="checkbox"
                                    id="topHeaderOption"
                                    name="topHeaderOption"
                                    class="custom-control-input"
                                />
                                <label
                                    class="custom-control-label"
                                    for="topHeaderOption"
                                ></label>
                            </div>
                        </button>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        href="#"
                        class="nav-link"
                        aria-expanded="false"
                    >
                <span class="animated-icon">
                  <div
                      style="width:18px;height:18px"
                      data-animation-path="vendor/animated-icons/globe/globe.json"
                  ></div>
                </span>
                        <span class="badge-top badge badge-danger badge-pill">6</span>
                    </a>
                    <div
                        tabindex="-1"
                        role="menu"
                        aria-hidden="true"
                        class="app-notifications dropdown-menu dropdown-menu-right"
                    >
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Notifications
                        </button>
                        <div tabindex="-1" class="m-0 dropdown-divider"></div>
                        <div class="app-notifications-inner">
                            <ul class="list-group">
                                <a
                                    href="#"
                                    class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                >
                      <span class="mr-3">
                        <span
                            class="position-relative d-flex rounded-circle"
                            style="width: 40px; height: 40px;"
                        >
                          <img
                              src="images/face2.jpg"
                              alt="Amber McCoy"
                              width="40px"
                              height="40px"
                              class="rounded-circle"
                          />
                        </span>
                      </span>
                                    <span>Amber McCoy has joined your mailing list</span>
                                </a>
                                <a
                                    href="#"
                                    class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                >
                      <span class="mr-3">
                        <span
                            class="position-relative d-flex rounded-circle"
                            style="width: 40px; height: 40px;"
                        >
                          <img
                              src="images/face2.jpg"
                              alt="Danielle Perkins"
                              width="40px"
                              height="40px"
                              class="rounded-circle"
                          />
                        </span>
                      </span>
                                    <span>Danielle Perkins created a new task list</span>
                                </a>
                                <a
                                    href="#"
                                    class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                >
                      <span class="mr-3">
                        <span
                            class="position-relative d-flex rounded-circle"
                            style="width: 40px; height: 40px;"
                        >
                          <img
                              src="images/face4.jpg"
                              alt="Megan Hanson"
                              width="40px"
                              height="40px"
                              class="rounded-circle"
                          />
                        </span>
                      </span>
                                    <span>Megan Hanson created a new task list</span>
                                </a>
                            </ul>
                        </div>
                        <div
                            class="d-flex align-items-center justify-content-between py-2 px-3"
                        >
                  <span>
                    <span class="badge badge-danger badge-pill">4</span>
                    <small class="mr-auto ml-1">Notifications</small>
                  </span>
                            <button
                                type="button"
                                class="button-shadow btn btn-outline-secondary btn-sm"
                            >
                                load more
                            </button>
                        </div>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        href="#"
                        class="nav-link"
                        aria-expanded="false"
                    >
                <span
                    class="position-relative d-flex rounded-circle"
                    style="width:32px;height:32px"
                >
                  <img
                      src="images/avatar.jpg"
                      alt="avatar"
                      width="32px"
                      height="32px"
                      class="rounded-circle"
                  />
                </span>
                    </a>
                    <div
                        tabindex="-1"
                        role="menu"
                        aria-hidden="true"
                        class="dropdown-menu dropdown-menu-right"
                    >
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Settings
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Profile
                        </button>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Notifications
                        </button>
                        <div tabindex="-1" class="dropdown-divider"></div>
                        <button
                            type="button"
                            tabindex="0"
                            role="menuitem"
                            class="dropdown-item"
                        >
                            Signout
                        </button>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="position-relative d-flex flex-row flex-fill page-wrapper">
        <div
            class="sidebar bg-dark page-sidebar"
            style="transform:translateX(0);min-width:280px;max-width:280px"
        >
            <div class="h-100 d-flex flex-column flex-1">
                <nav
                    class="navbar navbar-expand-md  d-none d-lg-flex d-xl-flex bg-dark"
                >
                    <a href="#" class="navbar-brand">
                        <svg width="24" height="24">
                            <use xlink:href="#logo-icon"></use>
                        </svg>
                        <span class="ml-3">Eleven</span>
                    </a>
                    <a href="javascript:;" class="nav-toggle">
                <span class="animated-icon">
                  <div
                      style="width:24px;height:24px"
                      data-animation-path="vendor/animated-icons/menu-back/menu-back.json"
                      data-anim-loop="false"
                  ></div>
                </span>
                    </a>
                </nav>
                <ul class="d-block scroll-y flex-1 py-3 nav flex-column">
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="index.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/shopping-bag/shopping-bag.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Home</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="widgets.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/book/book.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Widgets</span>
                                <span class="badge badge-danger badge-pill">5</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/folder/folder.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Bootstrap UI</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-alerts.html" class="nav-link">
                                            <span class="mr-auto menu-name">Alerts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-badge.html" class="nav-link">
                                            <span class="mr-auto menu-name">Badge</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-buttons.html" class="nav-link">
                                            <span class="mr-auto menu-name">Buttons</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-card.html" class="nav-link">
                                            <span class="mr-auto menu-name">Card</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-carousel.html" class="nav-link">
                                            <span class="mr-auto menu-name">Carousel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-jumbotron.html" class="nav-link">
                                            <span class="mr-auto menu-name">Jumbotron</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-list-group.html" class="nav-link">
                                            <span class="mr-auto menu-name">List Group</span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-progress.html" class="nav-link">
                                            <span class="mr-auto menu-name">Progress</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="bootstrap-ui-other.html" class="nav-link">
                                            <span class="mr-auto menu-name">Other</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="messages.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/speech/speech.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Messages</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/toggle/toggle.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Form</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="form-basic-form.html" class="nav-link">
                                            <span class="mr-auto menu-name">Basic Form</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="form-editor.html" class="nav-link">
                                            <span class="mr-auto menu-name">Editor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="form-validation.html" class="nav-link">
                                            <span class="mr-auto menu-name">Validation</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item  active">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/box/box.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Tables</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse  show" aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item  active">
                                        <a href="tables-basic-table.html" class="nav-link">
                                            <span class="mr-auto menu-name">Basic Table</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="tables-responsive.html" class="nav-link">
                                            <span class="mr-auto menu-name">Responsive</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="taskboard.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/bookmark-in-book/bookmark-in-book.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Taskboard</span>
                                <span class="badge badge-primary badge-pill">New</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="charts.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/loading-bar/loading-bar.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Charts</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="media.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/youtube/youtube.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Media</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/up-down/up-down.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Mapbox</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="mapbox-markers.html" class="nav-link">
                                            <span class="mr-auto menu-name">Markers</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="mapbox-location.html" class="nav-link">
                                            <span class="mr-auto menu-name">Location</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/document/document.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Pages</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="pages-invoice.html" class="nav-link">
                                            <span class="mr-auto menu-name">Invoice</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="pages-timeline.html" class="nav-link">
                                            <span class="mr-auto menu-name">Timeline</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="pages-blank.html" class="nav-link">
                                            <span class="mr-auto menu-name">Blank</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="pages-pricing.html" class="nav-link">
                                            <span class="mr-auto menu-name">Pricing</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="social.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/thumb/thumb.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Social</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="calendar.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/calendar/calendar.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Calendar</span>
                            </a>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/shield/shield.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Authentication</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="signin.html" class="nav-link">
                                            <span class="mr-auto menu-name">Signin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="signup.html" class="nav-link">
                                            <span class="mr-auto menu-name">Signup</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="forgot.html" class="nav-link">
                                            <span class="mr-auto menu-name">Forgot</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="lockscreen.html" class="nav-link">
                                            <span class="mr-auto menu-name">Lockscreen</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="javascript:;"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/warning-1/warning-1.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Error</span>
                                <span class="caret">
                      <span class="animated-icon">
                        <div
                            style="width:12px;height:12px"
                            data-animation-path="vendor/animated-icons/expand/expand.json"
                        ></div>
                      </span>
                    </span>
                            </a>
                            <div class="sub-menu collapse " aria-expanded="false">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a href="404.html" class="nav-link">
                                            <span class="mr-auto menu-name">404</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="500.html" class="nav-link">
                                            <span class="mr-auto menu-name">Error</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </div>
                    <div class="sidebar-item">
                        <li class="nav-item ">
                            <a
                                class="nav-link d-flex align-items-center nav-link"
                                href="https://eleven.fusepx.com/docs.html"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/subscribe-3/subscribe-3.json"
                          data-anim-loop="false"
                      ></div>
                    </span>
                                <span class="mr-auto menu-name">Documentation</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="page-overlay" style="visibility:hidden;opacity:0"></div>

        <div
            class="position-relative d-flex flex-column flex-fill page-content"
            style="min-width:0"
        >
            <div class="app-header">
                <nav class="bg-white navbar">
                    <ul class="navbar-nav d-lg-none d-sm-flex d-md-flex">
                        <a class="nav-toggle mobile-toggle">
                  <span class="animated-icon">
                    <div
                        style="width:24px;height:24px"
                        data-animation-path="vendor/animated-icons/menu-back/menu-back.json"
                    ></div>
                  </span>
                        </a>
                        <a href="/" class="navbar-brand">
                            <svg width="24" height="24">
                                <use xlink:href="#logo-icon"></use>
                            </svg>
                        </a>
                    </ul>
                    <ul class="navbar-nav d-none d-lg-flex d-xl-flex">
                        <li class="nav-item">
                            <a href="/calendar" class="nav-link">Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/messages" class="nav-link">Messages</a>
                        </li>
                    </ul>
                    <div class="search input-group d-none d-sm-flex">
                        <div class="input-group-prepend">
                  <span class="input-group-text">
                    <span class="animated-icon">
                      <div
                          style="width:20px;height:20px"
                          data-animation-path="vendor/animated-icons/search-cancel/search-cancel.json"
                      ></div>
                    </span>
                  </span>
                        </div>
                        <input
                            type="text"
                            placeholder="Search dashboard"
                            class="form-control"
                        />
                    </div>
                    <ul class="ml-auto menu-right navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link toggle-fullscreen" href="javascript:;">
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/fullscreen/fullscreen.json"
                      ></div>
                    </span>
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                href="#"
                                class="nav-link"
                                aria-expanded="false"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/toggle/toggle.json"
                      ></div>
                    </span>
                            </a>
                            <div
                                tabindex="-1"
                                role="menu"
                                aria-hidden="true"
                                class="app-settings dropdown-menu dropdown-menu-right"
                            >
                                <span class="dropdown-item-text">Settings</span>
                                <div tabindex="-1" class="m-0 dropdown-divider"></div>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="darkModeOption" class="m-0">Dark mode</label>
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="darkModeOption"
                                            name="darkModeOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="darkModeOption"
                                        ></label>
                                    </div>
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="boxedOption" class="m-0">Boxed layout</label>
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="boxedOption"
                                            name="boxedOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="boxedOption"
                                        ></label>
                                    </div>
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="stickyHeaderOption" class="m-0"
                                    >Sticky header</label
                                    >
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="stickyHeaderOption"
                                            name="stickyHeaderOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="stickyHeaderOption"
                                        ></label>
                                    </div>
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="stickySidebarOption" class="m-0"
                                    >Sticky sidebar</label
                                    >
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="stickySidebarOption"
                                            name="stickySidebarOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="stickySidebarOption"
                                        ></label>
                                    </div>
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="collapsedSidebarOption" class="m-0"
                                    >Collapsed sidebar</label
                                    >
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="collapsedSidebarOption"
                                            name="collapsedSidebarOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="collapsedSidebarOption"
                                        ></label>
                                    </div>
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="d-flex align-items-center justify-content-between dropdown-item"
                                >
                                    <label for="topHeaderOption" class="m-0"
                                    >Top header</label
                                    >
                                    <div class="custom-switch custom-control">
                                        <input
                                            type="checkbox"
                                            id="topHeaderOption"
                                            name="topHeaderOption"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="topHeaderOption"
                                        ></label>
                                    </div>
                                </button>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                href="#"
                                class="nav-link"
                                aria-expanded="false"
                            >
                    <span class="animated-icon">
                      <div
                          style="width:18px;height:18px"
                          data-animation-path="vendor/animated-icons/globe/globe.json"
                      ></div>
                    </span>
                                <span class="badge-top badge badge-danger badge-pill"
                                >6</span
                                >
                            </a>
                            <div
                                tabindex="-1"
                                role="menu"
                                aria-hidden="true"
                                class="app-notifications dropdown-menu dropdown-menu-right"
                            >
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="dropdown-item"
                                >
                                    Notifications
                                </button>
                                <div tabindex="-1" class="m-0 dropdown-divider"></div>
                                <div class="app-notifications-inner">
                                    <ul class="list-group">
                                        <a
                                            href="#"
                                            class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                        >
                          <span class="mr-3">
                            <span
                                class="position-relative d-flex rounded-circle"
                                style="width: 40px; height: 40px;"
                            >
                              <img
                                  src="images/face2.jpg"
                                  alt="Amber McCoy"
                                  width="40px"
                                  height="40px"
                                  class="rounded-circle"
                              />
                            </span>
                          </span>
                                            <span>Amber McCoy has joined your mailing list</span>
                                        </a>
                                        <a
                                            href="#"
                                            class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                        >
                          <span class="mr-3">
                            <span
                                class="position-relative d-flex rounded-circle"
                                style="width: 40px; height: 40px;"
                            >
                              <img
                                  src="images/face2.jpg"
                                  alt="Danielle Perkins"
                                  width="40px"
                                  height="40px"
                                  class="rounded-circle"
                              />
                            </span>
                          </span>
                                            <span>Danielle Perkins created a new task list</span>
                                        </a>
                                        <a
                                            href="#"
                                            class="w-100 d-flex flex-row align-items-center list-group-item-action list-group-item"
                                        >
                          <span class="mr-3">
                            <span
                                class="position-relative d-flex rounded-circle"
                                style="width: 40px; height: 40px;"
                            >
                              <img
                                  src="images/face4.jpg"
                                  alt="Megan Hanson"
                                  width="40px"
                                  height="40px"
                                  class="rounded-circle"
                              />
                            </span>
                          </span>
                                            <span>Megan Hanson created a new task list</span>
                                        </a>
                                    </ul>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between py-2 px-3"
                                >
                      <span>
                        <span class="badge badge-danger badge-pill">4</span>
                        <small class="mr-auto ml-1">Notifications</small>
                      </span>
                                    <button
                                        type="button"
                                        class="button-shadow btn btn-outline-secondary btn-sm"
                                    >
                                        load more
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                href="#"
                                class="nav-link"
                                aria-expanded="false"
                            >
                    <span
                        class="position-relative d-flex rounded-circle"
                        style="width:32px;height:32px"
                    >
                      <img
                          src="images/avatar.jpg"
                          alt="avatar"
                          width="32px"
                          height="32px"
                          class="rounded-circle"
                      />
                    </span>
                            </a>
                            <div
                                tabindex="-1"
                                role="menu"
                                aria-hidden="true"
                                class="dropdown-menu dropdown-menu-right"
                            >
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="dropdown-item"
                                >
                                    Settings
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="dropdown-item"
                                >
                                    Profile
                                </button>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="dropdown-item"
                                >
                                    Notifications
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <button
                                    type="button"
                                    tabindex="0"
                                    role="menuitem"
                                    class="dropdown-item"
                                >
                                    Signout
                                </button>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            @yield('content')

            <div class="app-footer bg-light">
                <nav class="navbar navbar-expand">
                    <div class="collapse show navbar-collapse" aria-expanded="true">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link"
                                >© Copyright FusePX Premium Templates 2020</a
                                >
                            </li>
                        </ul>
                    </div>
                    <ul class="ml-auto menu-right navbar-nav">
                        <li class="nav-item"><a class="nav-link">About</a></li>
                        <li class="nav-item"><a class="nav-link">Team</a></li>
                        <li class="nav-item"><a class="nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/lottie.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
