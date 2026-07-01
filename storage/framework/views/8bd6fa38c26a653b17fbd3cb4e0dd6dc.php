<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(app()->getLocale() == 'ur' ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--
        Available classes for <html> element:

        'dark'                  Enable dark mode - Default dark mode preference can be set in app.js file (always saved and retrieved in localStorage afterwards):
                                window.One = new App({ darkMode: "system" }); // "on" or "off" or "system"
        'dark-custom-defined'   Dark mode is always set based on the preference in app.js file (no localStorage is used)
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?php echo app('translator')->get('messages.me_developers'); ?></title>

    <meta name="description" content="Mughal Estate Developers">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo e(asset('media/favicons/favicon.png')); ?>">
    <link rel="icon" sizes="192x192" type="image/png" href="<?php echo e(asset('media/favicons/favicon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('media/favicons/apple-touch-icon-180x180.png')); ?>">

    <!-- Modules -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/css/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">

    <style>
        #keyboard {
            display: none;
            z-index: 1000;
            background: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .simple-keyboard .hg-button.hg-red {
            background: rgba(255, 0, 0, 0.1);
            color: #d14545;
        }

        .simple-keyboard .hg-button.hg-highlight {
            background: #ff9800;
            color: white;
        }

        .input-urdu {
            font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', serif;
            font-size: 16px;
            direction: rtl;
            text-align: right;
        }

        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table th {
            font-weight: 500;
            color: #6c757d;
        }

        .text-muted {
            color: #6c757d !important;
        }

        /* RTL Layout Fixes */
        [dir="rtl"] {
            direction: rtl;
            text-align: right;
        }

        [dir="rtl"] body {
            font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', sans-serif;
        }

        /* Fix for sidebar positioning */
        [dir="rtl"] #sidebar {
            right: 0;
            left: auto;
            transform: translateX(100%);
        }

        [dir="rtl"] #sidebar.sidebar-o {
            transform: translateX(0);
        }

        /* Main content adjustments */
        

        /* Form elements RTL support */
        [dir="rtl"] .form-control,
        [dir="rtl"] .form-select,
        [dir="rtl"] .input-group-text {
            text-align: right;
            direction: rtl;
        }

        /* Dropdown menu alignment */
        [dir="rtl"] .dropdown-menu {
            text-align: right;
            right: 0;
            left: auto;
        }

        /* Navbar items alignment */
        [dir="rtl"] .nav-main-link {
            padding-right: 1rem;
            padding-left: 0.5rem;
        }

        /* Table cell alignment */
        

        /* Fix for language switcher spacing */
        .language-switcher {
            margin-left: 15px;
            margin-right: 15px;
            padding: 0 10px;
        }

        /* Profile dropdown spacing */
        #page-header-user-dropdown {
            margin-left: 10px;
        }

        /* Keyboard UI improvements */
        .simple-keyboard.urdu-layout {
            font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', sans-serif;
            direction: rtl;
        }

        .simple-keyboard.urdu-layout .hg-button {
            font-size: 16px;
            
        }

        [dir="rtl"] ul,
        [dir="rtl"] ol {
            padding-right: 1.5rem;
            padding-left: 0;
            width: 100%;
        }

        [dir="rtl"] li {
            text-align: right;
            margin-right: 0;
            margin-left: 1rem;
            width: 100%;
            padding: 0.25rem 0;
        }

        /* Fix for nested lists */
        [dir="rtl"] ul ul,
        [dir="rtl"] ol ol {
            padding-right: 1rem;
            margin-right: 1rem;
        }

        /* Specific fix for the list in your image */
        [dir="rtl"] .list-group {
            direction: rtl;
            text-align: right;
        }

        [dir="rtl"] .list-group-item {
            padding: 0.75rem 1.25rem 0.75rem 0.75rem;
            border-right: 1px solid rgba(0, 0, 0, 0.125);
            border-left: none;
        }

        /* Button fixes for RTL */
        [dir="rtl"] .btn {
            /* Size control */
             padding: 8px 16px;
            /* Consistent padding */
            height: 38px;
            /* Fixed height matching English buttons */

            /* Text alignment */
            display: inline-flex;
            align-items: center;
            justify-content: center;

            /* Font control */
            font-size: 14px;
            /* Match English font size */
            line-height: 1.42857;
            /* Standard line height */
            letter-spacing: normal;

            /* Urdu-specific adjustments */
            font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', sans-serif;
            white-space: nowrap;
            /* Prevent text wrapping */
        }

        /* Specific button types */
        [dir="rtl"] .btn-sm {
            padding: 5px 10px;
            height: 32px;
            font-size: 12px;
        }

        [dir="rtl"] .btn i {
            margin-right: 0;
            margin-left: 0.25rem;
        }

        [dir="rtl"] .btn-group>.btn:not(:first-child),
        [dir="rtl"] .btn-group>.btn-group:not(:first-child)>.btn {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        [dir="rtl"] .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        [dir="rtl"] .btn-group>.btn-group:not(:last-child)>.btn {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        /* Specific fix for dropdown buttons */
        [dir="rtl"] .dropdown-toggle::after {
            margin-right: 0.255em;
            margin-left: 0;
        }

        /* Fix for button groups */
        [dir="rtl"] .btn-group {
            direction: rtl;
        }

        [dir="rtl"] .btn-group>.btn+.btn,
        [dir="rtl"] .btn-group>.btn+.btn-group,
        [dir="rtl"] .btn-group>.btn-group+.btn,
        [dir="rtl"] .btn-group>.btn-group+.btn-group {
            margin-right: -1px;
            margin-left: 0;
        }

        /* Container fixes */
        [dir="rtl"] .container,
        [dir="rtl"] .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Card fixes */
        [dir="rtl"] .card {
            text-align: right;
            direction: rtl;
        }

        [dir="rtl"] .card-header {
            padding: 0.75rem 1.25rem 0.75rem 0.75rem;
        }

        /* Form control fixes */
        [dir="rtl"] .form-control {
            padding: 0.375rem 0.75rem 0.375rem 1.75rem;
        }

        [dir="rtl"] .input-group>.form-control,
        [dir="rtl"] .input-group>.form-select {
            border-radius: 0 0.25rem 0.25rem 0;
        }

        [dir="rtl"] .input-group-text {
            border-radius: 0.25rem 0 0 0.25rem;
        }

        /* Label spacing fixes */
        [dir="rtl"] label {
            display: block;
            margin-bottom: 10px;
            /* Space below label */
            margin-top: 10px;
            /* Space above label */
            width: 100%;
            text-align: right;
            font-weight: 500;
        }

        /* Specific fix for Urdu name label */
        #name_ur_label {
            margin-right: 10px;
            /* Extra right margin for Urdu labels */
        }

        /* Form group spacing */
        [dir="rtl"] .form-group {
            margin-bottom: 20px;
            /* Increased space between form elements */
        }

        /* Input field spacing */
        [dir="rtl"] .form-control {
            margin-top: 5px;
            /* Space between label and input */
            margin-bottom: 15px;
            /* Space after input */
            padding: 10px 15px;
            /* Better padding inside inputs */
        }

        /* Button text balancing */
        [dir="rtl"] .btn {
            padding: 10px 20px;
            /* More balanced padding */
             text-align: center;
            letter-spacing: normal;
            /* Fix for Urdu text spacing */
        }

        /* Specific fix for Cancel/Save buttons */
        [dir="rtl"] .btn-secondary,
        [dir="rtl"] .btn-primary {
            margin-left: 10px;
            /* Space between buttons */
            margin-right: 10px;
            padding: 10px 25px;
            /* More balanced padding */
        }

        /* Button container fix */
        [dir="rtl"] .button-group {
            display: flex;
            justify-content: flex-end;
            /* Align buttons to right */
            gap: 15px;
            /* Space between buttons */
            margin-top: 20px;
            /* Space above button group */
        }

        /* Urdu font optimization */
        [dir="rtl"] .btn,
        [dir="rtl"] label {
            font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', sans-serif;
            font-size: 16px;
            line-height: 1.5;
            /* Better line spacing */
        }

        [dir="rtl"] .btn-sm {
            padding: 5px 10px;
            height: 32px;
            font-size: 12px;
        }

        [dir="rtl"] .btn-lg {
            padding: 10px 20px;
            height: 46px;
            font-size: 16px;
        }

        /* Button group consistency */
        [dir="rtl"] .btn-group .btn {
            margin-right: -1px;
            /* Fix button group borders */
        }

        /* Ensure equal width for common action buttons */
        [dir="rtl"] .btn-cancel,
        [dir="rtl"] .btn-save {
            width: 90px;
            /* Fixed width for common actions */
        }

        /* For form submit/cancel button pairs */
        [dir="rtl"] .form-actions .btn {
            min-width: 90px;
            width: auto;
        }

        .img-thumbnail {
            object-fit: cover;
            /* Ensures the image fills the container */
            width: 200px;
            height: 200px;
            border-radius: 4px;
            background-color: #f8f9fa;
            /* Light gray if image fails */
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/keyboard.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('js/plugins/dropzone/min/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('js/plugins/select2/css/select2.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <?php echo $__env->yieldContent('css'); ?>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/main.scss', 'resources/js/oneui/app.js']); ?>

    <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
    

    <!-- Load and set dark mode preference (blocking script to prevent flashing) -->

    <script src="<?php echo e(asset('js/jquery/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/setTheme.js')); ?>"></script>
    <script src="<?php echo e(asset('js/keyboard.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/dropzone/min/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>

    
    
    <?php echo $__env->yieldContent('js'); ?>
</head>

<body>
    <!-- Page Container -->
    <!--
        Available classes for #page-container:

        SIDEBAR and SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header

        HEADER STYLE

        ''                                          Light themed Header
        'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
    -->
    <div id="page-container"
        class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="fs-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="<?php echo e(asset('media/avatars/avatar10.jpg')); ?>"
                        alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ms-2">
                    <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">John Smith</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>

            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <p>
                    Content..
                </p>
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
            Sidebar Mini Mode - Display Helper classes

            Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
            Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

            Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
            Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
            Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
        -->

        <?php if(isset($selectedCompany)): ?>
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header">
                    <!-- Logo -->
                    <a class="font-semibold text-dual" href="/">
                        <span class="smini-visible">
                            <i class="fa fa-circle-notch text-primary"></i>
                        </span>
                        <span class="smini-hide fs-5 tracking-wider"><?php echo app('translator')->get('messages.me_developers'); ?><span
                                class="fw-normal"></span></span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div class="d-flex align-items-center gap-3">
                        <!-- Dark Mode -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end smini-hide border-0"
                                aria-labelledby="sidebar-dark-mode-dropdown">
                                <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                                    <i class="far fa-sun fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">Light</span>
                                </button>
                                <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                                    <i class="far fa-moon fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">Dark</span>
                                </button>
                                <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                                    <i class="fa fa-desktop fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">System</span>
                                </button>
                            </div>
                        </div>
                        <!-- END Dark Mode -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                            data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">

                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('dashboard') ? ' active' : ''); ?>"
                                    href="/dashboard">
                                    <i class="nav-main-link-icon si si-cursor"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.dashboard'); ?></span>
                                </a>
                            </li>
                             <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('/payroll') ? ' active' : ''); ?>"
                                    href="/payroll">
                                   <i class="nav-main-link-icon si si-wallet"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.payroll'); ?></span>
                                </a>
                            </li>
                            
                            <li
                                class="nav-main-item<?php echo e(request()->is('users*') ||
                                request()->is('admin/permissions*') ||
                                request()->is('admin/users-roles*') ||
                                request()->is('admin/roles*')
                                    ? ' open'
                                    : ''); ?>">

                                
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-lock"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.admin'); ?></span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('permissions.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('permissions.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.users-permissions'); ?></span>
                                        </a>
                                        <a class="nav-main-link<?php echo e(request()->routeIs('roles.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('roles.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.roles-and-permissions'); ?></span>
                                        </a>

                                        <a class="nav-main-link<?php echo e(request()->routeIs('users-roles.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('users-roles.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.users-roles'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                                
                            </li>

                            <li
                                class="nav-main-item<?php echo e(request()->is('users*') ||
                                request()->is('companies*') ||
                                request()->is('itemRegistration*') ||
                                request()->is('groups*') ||
                                request()->is('projects*') ||
                                request()->is('cities*') ||
                                request()->is('residentials*') ||
                                request()->is('banks*') ||
                                request()->is('periods*') ||
                                request()->is('partyAccount.*') ||
                                request()->is('schedule-types*') ||
                                request()->is('casts*') ||
                                request()->is('warehouses*') ||
                                request()->is('units*') ||
                                request()->is('tehsils*') ||
                                request()->is('areas*') ||
                                request()->is('occupation-types*') ||
                                request()->is('phase-types*') ||
                                request()->is('departments*') ||
                                request()->is('road-categories*') ||
                                request()->is('road-specifications*') ||
                                request()->is('dealers*') ||
                                request()->is('parties*') ||
                                request()->is('relations*') ||
                                request()->is('registry-types*')
                                    ? ' open'
                                    : ''); ?>">

                                
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-plus"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.registration'); ?></span>
                                </a>
                                <ul class="nav-main-submenu">



                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('users.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('users.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.users'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('itemRegistration.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('itemRegistration.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.Item-Registration'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('parties.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('parties.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.party-registration'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('companies.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('companies.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.companies'); ?></span>
                                        </a>
                                    </li>

                                    

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('relations.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('relations.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.relations'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('groups.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('groups.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.groups'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('projects.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('projects.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.projects'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('cities.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('cities.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.cities'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('residentials.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('residentials.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.residential-types'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('banks.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('banks.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.banks'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('periods.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('periods.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.schedule-periods'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('schedule-types.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('schedule-types.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.schedule-type'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('casts.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('casts.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.casts'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('warehouses.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('warehouses.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.warehouses'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('units.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('units.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.measurement-units'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('tehsils.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('tehsils.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.tehsils'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('areas.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('areas.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.areas'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('occupation-types.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('occupation-types.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.occupation-types'); ?></span>
                                        </a>
                                    </li>
                                    

                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('phase-types.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('phase-types.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.phase-types'); ?></span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('departments.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('departments.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.department'); ?></span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('road-categories.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('road-categories.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.road-category'); ?></span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs(patterns: 'road-specifications.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('road-specifications.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.roads-specification'); ?></span>
                                        </a>
                                    </li>
                                    
                                    
                                    
                                </ul>
                                
                            </li>

                            <li
                                class="nav-main-item<?php echo e(request()->is('users*') ||
                                request()->is('main-heads*') ||
                                request()->is('control-heads*') ||
                                request()->is('sub-heads*') ||
                                request()->is('sub-sub-heads*') ||
                                request()->is('sub-sub-sub-heads*') ||
                                request()->is('detail-accounts*') ||
                                request()->is('products*') ||
                                request()->is('vouchers*') ||
                                request()->is('partyAccount*') ||
                                request()->is('bank-payment-voucher*') ||
                                request()->is('bank-receipt-voucher*') ||
                                request()->is('cash-payment-voucher*') ||
                                request()->is('cash-receipt-voucher*') ||
                                request()->routeIs('jv-voucher.*') ||
                                request()->routeIs('client-invoices.*') ||
                                request()->routeIs('receipts.*')
                                    ? ' open'
                                    : ''); ?>">

                                
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-calculator"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.account_module'); ?></span>
                                </a>
                                <ul class="nav-main-submenu">

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('main-heads.*') || request()->routeIs('control-heads.*') || request()->routeIs('sub-heads.*') || request()->routeIs('sub-sub-heads.*') || request()->routeIs('sub-sub-sub-heads.*') || request()->routeIs('detail-accounts.*') || request()->routeIs('products.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">

                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.chart_of_account'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('main-heads.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('main-heads.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.main-heads'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('control-heads.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('control-heads.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.control-heads'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('sub-heads.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('sub-heads.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.sub-heads'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('sub-sub-heads.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('sub-sub-heads.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.sub-sub-heads'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('sub-sub-sub-heads.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('sub-sub-sub-heads.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.sub-sub-sub-heads'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('products.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('products.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.products'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('detail-accounts.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('detail-accounts.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.detail-accounts'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('detail-accounts.tree') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('detail-accounts.tree')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.accounts_tree'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('bank-payment-voucher.*') || request()->routeIs('bank-receipt-voucher.*') || request()->routeIs('cash-payment-voucher.*') || request()->routeIs('cash-receipt-voucher.*') || request()->routeIs('jv-voucher.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.vouchers'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('bank-payment-voucher.*') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('bank-payment-voucher.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.bpv'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('bank-receipt-voucher.*') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('bank-receipt-voucher.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.brv'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('cash-payment-voucher.*') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('cash-payment-voucher.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.cpv'); ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('cash-receipt-voucher.*') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('cash-receipt-voucher.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.crv'); ?></span>
                                                </a>
                                            </li>

                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('jv-voucher.*') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('jv-voucher.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.journal_voucher'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('partyAccount.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.ledgers'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('partyAccount.ledger') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('partyAccount.ledger')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.party_ledger'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                
                            </li>


                            <li
                                class="nav-main-item<?php echo e(request()->routeIs('bookings.*') || request()->routeIs('bookingReturns.*') || request()->routeIs('registry-order.*') || request()->routeIs('possession-letter.*') ? ' open' : ''); ?>">

                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-plus"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.booking'); ?></span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('bookings.index') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('bookings.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.booking_application'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('bookings.bookingListing') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('bookings.bookingListing')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('messages.bookings'); ?></span>
                                        </a>
                                    </li>

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('bookingReturns.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.booking-return'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('bookingReturns.bookingListing') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('bookingReturns.bookingListing')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.approved_bookings_cancellation'); ?></span>
                                                </a>
                                            </li>

                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('bookingReturns.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('bookingReturns.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.bookingReturn'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('registry-order.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.registry-order'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('registry-order.bookingListing') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('registry-order.bookingListing')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.approved_bookings_registry_letters'); ?></span>
                                                </a>
                                            </li>

                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('registry-order.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('registry-order.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.registry-order'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('possession-letter.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="true" href="#">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.possession-letter'); ?></span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('possession-letter.bookingListing') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('possession-letter.bookingListing')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.approved_bookings_possession_letters'); ?></span>
                                                </a>
                                            </li>

                                            <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('possession-letter.index') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('possession-letter.index')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.possession-letter'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>

                            <li
                                class="nav-main-item<?php echo e(request()->is('purchase-order*') || request()->is('grn*') || request()->is('purchase-invoice*') || request()->is('purchase-return*') ? ' open' : ''); ?>">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-basket"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.purchase-module'); ?></span>
                                </a>

                                <ul class="nav-main-submenu">
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('purchase-module.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('purchase-order*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('purchase-order.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.purchase-order'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('grn*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('grn.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.grn'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('purchase-invoice*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('purchase-invoice.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.purchaseInvoice'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('purchase-return*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('purchase-return.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.purchaseReturn'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-item<?php echo e(request()->is('sale-invoice*') ? ' open' : ''); ?>">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-basket"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.sale-module'); ?></span>
                                </a>

                                <ul class="nav-main-submenu">

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('sale-invoice*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('sale-invoice.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.saleInvoice'); ?></span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li
                                class="nav-main-item<?php echo e(request()->is('construction-site*') || request()->is('tender*') || request()->is('boq-masters*') || request()->is('work-orders*') || request()->is('work-progress*') || request()->is('contractor-bills*')  ? ' open' : ''); ?>">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-home"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.construction-module'); ?></span>
                                </a>

                                <ul class="nav-main-submenu">

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('construction-sites*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('construction-sites.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.construction-site'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('tenders*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('tenders.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.tender'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('boq-masters*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('boq-masters.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.boq'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('work-orders*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('work-orders.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.work-order'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('work-progress*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('work-progress.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.work-progress'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('contractor-bills*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('contractor-bills.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.contractor-bill'); ?></span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                              

                            <li
                                class="nav-main-item<?php echo e(request()->is('land-module*') || request()->is('grn*') || request()->is('land-registration*') || request()->is('transfer-land*') ? ' open' : ''); ?>">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-layers"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.land-module'); ?></span>
                                </a>

                                <ul class="nav-main-submenu">
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('land-module.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('land-registration*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('lands.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.land-registration'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('land-transfer*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('land-transfers.index')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.land-transfer'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('land-report*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('land-report.area-summary')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.land-report'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li
                                class="nav-main-item<?php echo e(request()->is('reports*')  ? ' open' : ''); ?>">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-chart"></i>
                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.reports'); ?></span>
                                </a>

                                <ul class="nav-main-submenu">
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('reports.recovery.sheet.view.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('reports.recovery.sheet.view*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('reports.recovery.sheet.view')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.recovery-sheet'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-main-item">
                                                <a class="nav-main-link<?php echo e(request()->routeIs('bankBook.view') ? ' active' : ''); ?>"
                                                    href="<?php echo e(route('bankBook.view')); ?>">
                                                    <span class="nav-main-link-name"><?php echo app('translator')->get('menu.bank_book'); ?></span>
                                                </a>
                                            </li>

                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('reports.stock-report.filter') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('reports.stock-report.filter') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('reports.stock-report.filter')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.stock-report'); ?></span>
                                        </a>
                                    </li>
                                     <li
                                        class="nav-main-item<?php echo e(request()->routeIs('available-plots.filter') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('available-plots.filter') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('available-plots.filter')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.available-plots-report'); ?></span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('reports.bill.aging.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('reports.bill.aging.*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('reports.bill.aging.view')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.bill-aging'); ?></span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('reports.trial.balance.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('reports.trial.balance.*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('reports.trial.balance.view')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.trial-balance'); ?></span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-main-item<?php echo e(request()->routeIs('reports.balance.sheet.*') ? ' open' : ''); ?>">
                                        <a class="nav-main-link<?php echo e(request()->routeIs('reports.balance.sheet.*') ? ' active' : ''); ?>"
                                            href="<?php echo e(route('reports.balance.sheet.view')); ?>">
                                            <span class="nav-main-link-name"><?php echo app('translator')->get('menu.balance-sheet'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-heading">More</li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit-log.view')): ?>
                                <li class="nav-main-item">
                                    <a class="nav-main-link<?php echo e(request()->routeIs('audit-logs.index') ? ' active' : ''); ?>"
                                        href="<?php echo e(route('audit-logs.index')); ?>">
                                        <span class="nav-main-link-name"><?php echo app('translator')->get('menu.audit-log'); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('registry-types.view')): ?>
                                <li class="nav-main-item">
                                    <a class="nav-main-link<?php echo e(request()->routeIs('registry-types.index') ? ' active' : ''); ?>"
                                        href="<?php echo e(route('registry-types.index')); ?>">
                                        <span class="nav-main-link-name"><?php echo app('translator')->get('menu.registry-types'); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->
        <?php endif; ?>

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Search Form (visible on larger screens) -->
                    <form class="d-none d-md-inline-block" action="/dashboard" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="d-flex align-items-center px-2 text-dark fw-bold">
                            <?php if(isset($selectedCompany)): ?>
                                <img src="<?php echo e($selectedCompany->logo ? asset('storage/' . $selectedCompany->logo) : asset('media/avatars/avatar-default.jpg')); ?>"
                                    alt="Logo" style="height: 30px; width: auto; margin-right: 10px;" />

                                <span><?php echo e($selectedCompany->{'name_' . app()->getLocale()}); ?></span>
                            <?php else: ?>
                                <i class="fa fa-building me-2 text-primary"></i>
                            <?php endif; ?>
                        </div>

                    </form>
                    <!-- END Search Form -->
                </div>
                <!-- END Left Section -->
                
                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="<?php echo e(asset(path: 'storage/' . \Auth::user()->avatar)); ?>"
                                alt="Header Avatar" style="width: 21px;">
                            <span
                                class="d-none d-sm-inline-block ms-2"><?php echo e(\Auth::user()->{'name_' . app()->getLocale()}); ?></span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="<?php echo e(asset('storage/' . \Auth::user()->avatar)); ?>" alt="">
                                <p class="mt-2 mb-0 fw-medium"><?php echo e(\Auth::user()->{'name_' . app()->getLocale()}); ?>

                                </p>
                                
                            </div>
                            

                            <div role="separator" class="dropdown-divider m-0"></div>
                            <div class="p-2">
                                
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="fs-sm fw-medium"><?php echo app('translator')->get('messages.logout'); ?></span>
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Language Selector -->
                    <br>

                    <body>
                        <div class="language-switcher">
                            <a href="<?php echo e(route('language.switch', 'en')); ?>">English</a> |
                            <a href="<?php echo e(route('language.switch', 'ur')); ?>">اردو</a>
                        </div>
                        

                        <!-- Page Container -->
                        <!--
                Available classes for #page-container:

            <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ms-2">
                            
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                                    <h5 class="dropdown-header text-uppercase">Notifications</h5>
                                </div>
                                <ul class="nav-items mb-0">
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new follower</div>
                                                <span class="fw-medium text-muted">15 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">1 new sale, keep it up</div>
                                                <span class="fw-medium text-muted">22 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">Update failed, restart server</div>
                                                <span class="fw-medium text-muted">26 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">2 new sales, keep it up</div>
                                                <span class="fw-medium text-muted">33 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-user-plus text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new subscriber</div>
                                                <span class="fw-medium text-muted">41 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new follower</div>
                                                <span class="fw-medium text-muted">42 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2 border-top text-center">
                                    <a class="d-inline-block fw-medium" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        
                        <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="/dashboard" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
</body>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-popin">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <h5 class="modal-title" id="confirmDeleteLabel"> <?php echo app('translator')->get('messages.deletion-confirm'); ?> </h5>
            </div>
            <div class="modal-body text-center">
                <p> <?php echo app('translator')->get('messages.sure-to-delete'); ?></p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-sm btn-secondary"
                    data-bs-dismiss="modal"><?php echo app('translator')->get('messages.cancel'); ?></button>
                <button type="button" class="btn btn-sm btn-danger"
                    id="confirmDeleteBtn"><?php echo app('translator')->get('messages.yes-delete'); ?></button>
            </div>
        </div>
    </div>
</div>

</html>

<script>
    let formToSubmit;

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            formToSubmit = this.closest('form');
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    });

    jQuery('#tehsil-loading').show();
    $.ajax({
        // ... existing options ...
        complete: function() {
            $('#tehsil-loading').hide();
        }
    });

    //Get list of tehsils on city selection
    document.addEventListener('DOMContentLoaded', function() {

        const citySelect = document.getElementById('city_id');
        const tehsilSelect = document.getElementById('tehsil_id');
        const loadingIndicator = document.getElementById('tehsil-loading');

        citySelect.addEventListener('change', function() {
            const cityId = this.value;
            tehsilSelect.innerHTML = '<option value="">Select City First</option>';
            tehsilSelect.disabled = true;

            if (!cityId) return;

            loadingIndicator.style.display = 'block';

            fetch(`/get-tehsils/${cityId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    tehsilSelect.innerHTML = '';

                    if (data.length > 0) {
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Select Tehsil';
                        tehsilSelect.appendChild(defaultOption);

                        data.forEach(tehsil => {
                            const option = document.createElement('option');
                            option.value = tehsil.id;
                            option.textContent = tehsil.name_en;
                            tehsilSelect.appendChild(option);
                        });
                    } else {
                        const noDataOption = document.createElement('option');
                        noDataOption.value = '';
                        noDataOption.textContent = 'No tehsils available';
                        tehsilSelect.appendChild(noDataOption);
                    }

                    tehsilSelect.disabled = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    tehsilSelect.innerHTML = '<option value="">Error loading tehsils</option>';
                })
                .finally(() => {
                    loadingIndicator.style.display = 'none';
                });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Set initial RTL state
        if (document.documentElement.getAttribute('dir') === 'rtl') {
            document.body.classList.add('rtl');
            document.getElementById('page-container').classList.add('sidebar-r');
        }

        // Watch for language changes
        document.querySelectorAll('.language-switcher a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const isRtl = this.href.includes('ur');

                fetch(this.href)
                    .then(() => {
                        document.documentElement.setAttribute('dir', isRtl ? 'rtl' : 'ltr');
                        document.body.classList.toggle('rtl', isRtl);
                        document.getElementById('page-container').classList.toggle(
                            'sidebar-r', isRtl);
                        window.location.reload();
                    });
            });
        });

        // Toggle sidebar visibility
        document.querySelectorAll('[data-action="sidebar_toggle"]').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('sidebar-o');
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Toggle sidebar
        document.querySelectorAll('[data-action="sidebar_toggle"]').forEach(button => {
            button.addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('sidebar-o');

                // Adjust main content width
                const mainContainer = document.getElementById('main-container');
                if (sidebar.classList.contains('sidebar-o')) {
                    mainContainer.style.marginRight = '250px';
                } else {
                    mainContainer.style.marginRight = '0';
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize RTL state
        function setRtlLayout(isRtl) {
            document.documentElement.setAttribute('dir', isRtl ? 'rtl' : 'ltr');
            document.documentElement.setAttribute('lang', isRtl ? 'ur' : 'en');

            // Adjust sidebar position
            const sidebar = document.getElementById('sidebar');
            const pageContainer = document.getElementById('page-container');

            if (isRtl) {
                sidebar.classList.add('sidebar-r');
                pageContainer.classList.add('sidebar-r');
            } else {
                sidebar.classList.remove('sidebar-r');
                pageContainer.classList.remove('sidebar-r');
            }

            // Update keyboard if exists
            if (typeof updateKeyboardLayout === 'function') {
                updateKeyboardLayout();
            }
        }

        // Set initial state
        setRtlLayout(document.documentElement.getAttribute('lang') === 'ur');

        // Handle language switch
        document.querySelectorAll('[data-language-switch]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.getAttribute('data-language-switch');

                fetch(this.href, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            setRtlLayout(lang === 'ur');
                            window.location.reload();
                        }
                    });
            });
        });
    });

    function previewImage(input) {
        const preview = document.getElementById('previewImg');
        const previewDiv = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result; // Set image source
                previewDiv.style.display = 'block'; // Show the preview
            }

            reader.readAsDataURL(input.files[0]); // Convert image to Data URL
        } else {
            previewDiv.style.display = 'none'; // Hide if no file selected
        }
    }

    function previewImage2(input) {
        const preview = document.getElementById('previewImg2');
        const previewDiv = document.getElementById('imagePreview2');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result; // Set image source
                previewDiv.style.display = 'block'; // Show the preview
            }

            reader.readAsDataURL(input.files[0]); // Convert image to Data URL
        } else {
            previewDiv.style.display = 'none'; // Hide if no file selected
        }
    }

    function previewImage3(input) {
        const preview = document.getElementById('previewImg3');
        const previewDiv = document.getElementById('imagePreview3');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result; // Set image source
                previewDiv.style.display = 'block'; // Show the preview
            }

            reader.readAsDataURL(input.files[0]); // Convert image to Data URL
        } else {
            previewDiv.style.display = 'none'; // Hide if no file selected
        }
    }

    $(document).ready(function() {
        // Basic Select2
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: window.translations.selectPlaceholder,
            // allowClear: true
        });

        // For multiple select with AJAX (example)
        $('#example-multiple').select2({
            theme: 'bootstrap-5',
            placeholder: 'Select multiple options',
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: '/your-api-endpoint',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    return {
                        results: data.items
                    };
                },
                cache: true
            }
        });
    });

    window.translations = {
        selectPlaceholder: <?php echo json_encode(__('messages.select-an-option'), 15, 512) ?>
    };
</script>
<?php /**PATH D:\laragon\www\mughal-for-deploy\resources\views/layouts/backend.blade.php ENDPATH**/ ?>