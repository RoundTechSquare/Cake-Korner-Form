   <!--Mobile navbar-->
   <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
       <div class="container">
           <!-- Brand -->
           <div class="navbar-brand">
               <!-- Mobile menu toggler icon -->
               <div class="brand-start">
                   <div class="navbar-burger">
                       <span></span>
                       <span></span>
                       <span></span>
                   </div>
               </div>

               <a class="navbar-item is-brand" href="index.html">
                   <img class="light-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto" alt="">
                   <img class="dark-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto" alt="">
               </a>

               <div class="brand-end">
                   <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                       <div class="is-trigger" aria-haspopup="true">
                           <div class="profile-avatar">
                               <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                           </div>
                       </div>
                       <div class="dropdown-menu" role="menu">
                           <div class="dropdown-content">
                               <div class="dropdown-head">
                                   <div class="h-avatar is-large">
                                       <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                   </div>
                                   <div class="meta">
                                       <span>Admin</span>
                                       <span>Super Admin</span>
                                   </div>
                               </div>

                               <div class="dropdown-item is-button">
                                   <button class="button h-button is-primary is-raised is-fullwidth logout-button">
                                       <span class="icon is-small">
                                           <i data-feather="log-out"></i>
                                       </span>
                                       <span>Logout</span>
                                   </button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </nav>
   <!--Mobile sidebar-->
   <div class="mobile-main-sidebar">
       <div class="inner">
           <ul class="icon-side-menu">
               <li>
                   <a class="single-link" href="./dashboard">
                       <span class="icon">
                           <i data-feather="grid"></i>
                       </span>
                   </a>
               </li>
               <li>
                   <a class="single-link" href="./products">
                       <span class="icon">
                           <i data-feather="briefcase"></i>
                       </span>

                   </a>
               </li>
           </ul>
       </div>
   </div>
   <!--Circular menu-->
   <div id="circular-menu" class="circular-menu">
       <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
           <i aria-hidden="true" class="fas fa-bars"></i>
           <i aria-hidden="true" class="fas fa-times"></i>
       </a>
       <div class="items-wrapper">
           <div class="menu-item is-flex">
               <label class="dark-mode">
                   <input type="checkbox" checked>
                   <span></span>
               </label>
           </div>
           <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
               <i data-feather="bell"></i>
           </a>
           <a href="./profile" class="menu-item is-flex">
               <i data-feather="user"></i>
           </a>
       </div>
   </div>
   <!--Sidebar-->
   <div id="sidebar-block" class="sidebar-block">
       <div class="sidebar-block-header">
           <a class="sidebar-block-logo " style="width:100%;height:auto;padding-top:30px" href="/">
               <img class="light-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto" alt="">
               <img class="dark-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto" alt="">
           </a>
       </div>
       <div class="sidebar-block-inner" data-simplebar>
           <ul>
               <li>
                   <a class="single-link" href="./dashboard">
                       <span class="icon">
                           <i data-feather="users"></i>
                       </span>
                       Contact Forms
                   </a>
               </li>
               <li>
                   <a class="single-link" href="./newsletter-subscriptions">
                       <span class="icon">
                           <i data-feather="file-minus"></i>
                       </span>
                       Newsletter Subscriptions
                   </a>
               </li>
               <li>
                   <a class="single-link" href="./artesia-orders">
                       <span class="icon">
                           <i data-feather="shopping-bag"></i>
                       </span>
                       Artesia Orders
                   </a>
               </li>
               <li>
                   <a class="single-link" href="./san-diego-orders">
                       <span class="icon">
                           <i data-feather="shopping-bag"></i>
                       </span>
                       San Diego Orders
                   </a>
               </li>
           </ul>
       </div>
   </div>