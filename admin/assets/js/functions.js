/*! functions.js | Huro | Css ninja 2020-2021 */
"use strict";var env="",themeColors={primary:"#E283AE",primaryMedium:"#d4b3ff",primaryLight:"#f4edfd",secondary:"#ff227d",accent:"#797bf2",success:"#06d6a0",info:"#039BE5",warning:"#faae42",danger:"#FF7273",purple:"#8269B2",blue:"#37C3FF",green:"#93E088",yellow:"#FFD66E",orange:"#FFA981",lightText:"#a2a5b9",fadeGrey:"#ededed"};function switchLayouts(){var e=window.location.pathname,i="",s=e.substring(e.lastIndexOf("/")+1,e.lastIndexOf("-"));s=s.substr(0,s.indexOf("-")),$(".layout-switcher").on("click",(function(){i="admin"==s?e.replace("admin","webapp"):e.replace("webapp","admin"),window.location.href=i}))}function changeDemoImages(){$("*[data-demo-src]").each((function(){var e=$(this).attr("data-demo-src");$(this).attr("src",e)})),$("*[data-demo-background]").each((function(){var e=$(this).attr("data-demo-background");$(this).attr("data-background",e)})),$("*[data-demo-href]").each((function(){var e=$(this).attr("data-demo-href");$(this).attr("href",e)}))}function initBgImages(){$(".has-background-image").length&&$(".has-background-image").each((function(){var e=$(this).attr("data-background");void 0!==e&&$(this).css("background-image","url("+e+")")}))}function initPageLoader(){$(".pageloader").length&&($(".pageloader").toggleClass("is-active"),$(window).on("load",(function(){var e=setTimeout((function(){$(".pageloader").toggleClass("is-active"),$(".infraloader").toggleClass("is-active"),clearTimeout(e),setTimeout((function(){$(".rounded-hero").addClass("is-active")}),350)}),700)})))}function setActivelink(){var e=window.location.href;$(".sidebar-panel .inner ul li a, .sidebar-block ul li a, .mobile-subsidebar ul li a").each((function(){var i=this.href;e==i&&($(this).closest("li").addClass("is-active"),$(this).closest(".has-children").find("ul").slideToggle(),$(this).closest(".has-children").addClass("active"))})),$(".main-sidebar .sidebar-inner ul li a").each((function(){var i=this.href;e==i&&$(this).closest("li").find("a").addClass("is-selected")})),$(".webapp-subnavbar-inner .center ul li a").each((function(){var i=this.href;if(e==i){$(this).closest("li").addClass("is-active"),$(this).closest(".tab-content").addClass("is-active").siblings(".tab-content").removeClass("is-active");var s=$(this).closest(".tab-content").attr("id");$(this).closest(".webapp-subnavbar-inner").find(".tabs ul li").removeClass("is-active"),$("[data-tab="+s+"]").addClass("is-active")}}))}function initSidebar(){$(".huro-hamburger").on("click",(function(){if($(this).hasClass("full-push")){var e=$(this).attr("data-sidebar");$(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$("#"+e).toggleClass("is-active"),$(".view-wrapper").toggleClass("is-pushed"),$(".main-sidebar, .sidebar-brand").hasClass("is-bordered")?$(".main-sidebar, .sidebar-brand").removeClass("is-bordered"):$(".main-sidebar, .sidebar-brand").addClass("is-bordered"),$("body").toggleClass("opened")}if($(this).hasClass("push-resize")){e=$(this).attr("data-sidebar");$(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$("#"+e).toggleClass("is-active"),$(".view-wrapper").toggleClass("is-pushed-full"),$(".main-sidebar, .sidebar-brand").hasClass("is-bordered")?$(".main-sidebar, .sidebar-brand").removeClass("is-bordered"):$(".main-sidebar, .sidebar-brand").addClass("is-bordered"),$("body").toggleClass("opened"),$(this).hasClass("messages-push")&&($(".view-wrapper").toggleClass("is-pushed-messages"),$(".collapsed-messaging").toggleClass("is-active"),$("body").toggleClass("is-chat-side-collapsed"))}if($(this).hasClass("push-block")){e=$(this).attr("data-sidebar");$(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$("#"+e).toggleClass("is-active"),$(".view-wrapper").toggleClass("is-pushed-block"),$(".sidebar-block").toggleClass("is-bordered"),$("body").toggleClass("opened"),$(this).hasClass("messages-push")&&($(".view-wrapper").toggleClass("is-pushed-messages"),$(".collapsed-messaging").toggleClass("is-active"),$("body").toggleClass("is-chat-side-collapsed"))}if($(this).hasClass("push-search")){e=$(this).attr("data-sidebar");$(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$("#"+e).toggleClass("is-active"),$(".view-wrapper").toggleClass("is-pushed-search"),$(".main-sidebar, .sidebar-brand").hasClass("is-bordered")?$(".main-sidebar, .sidebar-brand").removeClass("is-bordered"):$(".main-sidebar, .sidebar-brand").addClass("is-bordered"),$("body").toggleClass("opened")}})),$(".panel-close").on("click",(function(){$(this).closest(".sidebar-panel").removeClass("is-active"),$(".huro-hamburger .icon-box-toggle").removeClass("active"),$(".main-sidebar, .sidebar-brand").hasClass("is-bordered")?$(".main-sidebar, .sidebar-brand").removeClass("is-bordered"):$(".main-sidebar, .sidebar-brand").addClass("is-bordered"),$("body").toggleClass("opened")})),$(".main-sidebar ul li a").on("click",(function(){$(".main-sidebar ul li a").removeClass("is-selected"),$(this).addClass("is-selected")})),$("#user-menu").on("click",(function(){$(".naver").addClass("from-bottom"),$(".naver").css({"margin-bottom":64})})),$(window).on("scroll",(function(){$(window).scrollTop()>80?$(".circular-menu").addClass("is-active"):$(".circular-menu").removeClass("is-active active")}))}function closeSidebarPanel(){$(".sidebar-panel.is-active").removeClass("is-active"),$(".huro-hamburger .icon-box-toggle").removeClass("active"),$(".view-wrapper").removeClass("is-pushed-full"),$(".main-sidebar, .sidebar-brand").hasClass("is-bordered")?$(".main-sidebar, .sidebar-brand").removeClass("is-bordered"):$(".main-sidebar, .sidebar-brand").addClass("is-bordered"),$("body").toggleClass("opened")}function updateSidebarNaver(){var e=$("[data-menu-item]").attr("data-menu-item"),i=$("[data-mobile-item]").attr("data-mobile-item");if($(e).addClass("is-active"),$(i).addClass("is-active"),$("[data-naver-offset]").length){var s=parseInt($(".view-wrapper").attr("data-naver-offset"));$(".naver").removeClass("from-bottom"),$(".naver").css({"margin-top":s})}else if($("[data-naver-offset-bottom]").length){var t=parseInt($(".view-wrapper").attr("data-naver-offset-bottom"));$(".naver").addClass("from-bottom"),$(".naver").css({"margin-bottom":t})}}function initCollapsibleMenu(){$(".has-children .parent-link").on("click",(function(e){e.preventDefault(),$(this).closest(".has-children").hasClass("active")?($(this).closest(".has-children").find("ul").slideToggle(),$(".sidebar-panel li, .sidebar-block li, .mobile-subsidebar li").removeClass("active")):($(".sidebar-panel .has-children ul, .sidebar-block .has-children ul, .mobile-subsidebar .has-children ul").slideUp(),$(this).closest(".has-children").find("ul").slideToggle(),$(".sidebar-panel .has-children, .sidebar-block .has-children, .mobile-subsidebar .has-children").removeClass("active"),$(this).closest(".has-children").addClass("active"))}))}function initWebapp(){var e=$(".view-wrapper").attr("data-page-title");$("#webapp-page-title").html(e),$(window).on("scroll",(function(){$(window).scrollTop()>10?$(".webapp-navbar.is-transparent, .webapp-navbar-clean.is-transparent").addClass("is-scrolled"):$(".webapp-navbar.is-transparent, .webapp-navbar-clean.is-transparent").removeClass("is-scrolled")}));var i=$(".view-wrapper").attr("data-menu-item");$(".centered-link-toggle").removeClass("is-active"),$(i).addClass("is-active"),$(".webapp-navbar .centered-link-toggle").on("click",(function(){var e=$(this).attr("data-menu-id");$(this).hasClass("is-active")&&$(".webapp-subnavbar").hasClass("is-active")?($(".webapp-subnavbar").removeClass("is-active"),$(".webapp-navbar").removeClass("is-solid")):($(".webapp-subnavbar").addClass("is-active"),$(".webapp-navbar").addClass("is-solid")),$(".webapp-navbar .centered-link").removeClass("is-active"),$(this).addClass("is-active"),$(".webapp-subnavbar-inner").removeClass("is-active"),$("#"+e).addClass("is-active")})),$(".webapp-navbar .centered-link-search, #webapp-navbar-search-close").on("click",(function(){$("#webapp-navbar-menu, #webapp-navbar-search").toggleClass("is-hidden"),$("#webapp-navbar-search input").focus(),$(".webapp-subnavbar").removeClass("is-active")})),$(".webapp-navbar .category-selector").length&&($(".webapp-navbar .category-selector .category-item").on("click",(function(){var e=$(this).attr("data-category"),i=$(this).closest(".dropdown");i.find(".mega-menus").removeClass("is-active"),$("#"+e).addClass("is-active"),i.find(".content-wrap, .category-selector").toggleClass("is-hidden")})),$(".webapp-navbar .back-button").on("click",(function(){$(this).closest(".dropdown").find(".content-wrap, .category-selector").toggleClass("is-hidden")})))}function initMobileNavbar(){$(window).on("scroll",(function(){$(window).scrollTop()>65?$(".mobile-navbar").removeClass("no-shadow"):$(".mobile-navbar").addClass("no-shadow")}))}function initMobileNavbarHamburger(){$(".navbar-burger").length&&$(".navbar-burger").on("click",(function(){$(this).toggleClass("is-active"),$(".mobile-main-sidebar").hasClass("is-active")?$(".mobile-main-sidebar, .mobile-subsidebar").removeClass("is-active"):$(".mobile-main-sidebar, .mobile-subsidebar").addClass("is-active")}))}function openSidebar(){$(".main-sidebar").length&&($(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$(".sidebar-panel").addClass("is-active"),$(".view-wrapper").addClass("is-pushed-full"),$("body").addClass("opened"),$(".main-sidebar, .sidebar-brand").addClass("is-bordered")),$(".sidebar-block").length&&($(".nav-trigger .menu-toggle .icon-box-toggle").toggleClass("active"),$(".sidebar-block").addClass("is-active"),$(".view-wrapper").addClass("is-pushed-block"),$("body").addClass("opened"),$(".sidebar-block").addClass("is-bordered"))}function initStuckHeader(){$(".stuck-header").length&&$(window).on("scroll",(function(){$(window).scrollTop()>80?$(".stuck-header").addClass("is-stuck"):$(".stuck-header").removeClass("is-stuck")}))}function initNavbarDropdowns(){$(".has-dropdown").on("click",(function(){$(".has-dropdown").removeClass("is-active"),$(this).addClass("is-active")})),$(document).on("click",(function(e){var i=e.target;$(i).is(".has-dropdown .navbar-link")||$(i).parents().is(".has-dropdown")||$(".has-dropdown").removeClass("is-active")}))}function initDropdowns(){$(".dropdown-trigger").on("click",(function(){$(".dropdown").removeClass("is-active"),$(this).addClass("is-active")})),$(document).on("click",(function(e){var i=e.target;$(i).is(".dropdown img, .kill-drop")||$(i).parents().is(".dropdown")||$(".dropdown").removeClass("is-active"),$(i).is(".kill-drop")&&$(".dropdown").removeClass("is-active")}))}function initMobileDropdowns(){$(".has-dropdown.is-mobile").on("click",(function(){$(this).find(".navbar-link").toggleClass("is-active"),$(this).find(".mobile-dropdown").slideToggle()}))}function adjustDropdowns(){$(".dropdown:not(.user-dropdown):not(.profile-dropdown)").each((function(){var e=$(this);$(this).offset().top+$(this).height()>=$(window).height()-250?$(e).addClass("is-up"):$(e).removeClass("is-up")})),$(window).on("scroll",(function(){$(".dropdown:not(.user-dropdown):not(.profile-dropdown)").each((function(){var e=$(this);$(this).offset().top+$(this).height()>=$(window).height()-250?$(e).addClass("is-up"):$(e).removeClass("is-up")}))}))}function initConfirm(e,i,s,t,a,o,n){alertify.confirm("confirm").set({transition:"fade",title:e,message:i,movable:!1,maximizable:s,closableByDimmer:t,labels:{ok:a,cancel:o},reverseButtons:!0,onok:n}).show()}function initChosenSelects(){if($(".chosen-select-no-single").length){var e={".chosen-select-no-single":{disable_search_threshold:100,width:"100%"}};for(var i in e)e.hasOwnProperty(i)&&$(i).chosen(e[i])}}function initTabs(){$(".tabs-inner .tabs li, .vertical-tabs-wrapper .tabs li").on("click",(function(){var e=$(this).attr("data-tab");$(this).siblings("li").removeClass("is-active"),$(this).addClass("is-active"),$(this).closest(".tabs-wrapper, .vertical-tabs-wrapper").find(".tab-content").removeClass("is-active"),$("#"+e).addClass("is-active")}))}function initHSelect(){$(".h-select").on("click",(function(){$(this).toggleClass("is-active")})),$(document).click((function(e){var i=e.target;$(i).is(".h-select")||$(i).parents().is(".control")||$(".h-select").removeClass("is-active")})),$(".h-select input").on("change",(function(){var e=$(this).siblings(".option-meta").find("span").text();$(this).closest(".h-select").find(".select-box span").html(e)}))}function initComboBox(){$(".is-combo .combo-box").on("click",(function(){$(this).toggleClass("is-active")})),$(".combo-box .box-dropdown li").on("click",(function(e){var i=e.target,s=$(this).find(".item-icon i").attr("class"),t=$(this).find(".item-icon i"),a=(s=$(this).find(".item-icon i").attr("class"),$(this).find(".item-icon").html()),o=$(this).find(".item-name").text(),n='<i class="'+s+'"></i>',l="";(console.log(a),$(i).is(".box-dropdown li, body")||$(i).parents().is(".box-dropdown")||$(".box-dropdown").removeClass("is-active"),$(i).is("body")&&$(".box-dropdown").removeClass("is-active"),$(this).siblings("li.is-active").removeClass("is-active"),$(this).addClass("is-active"),t.length?($(this).closest(".combo-box").find(".combo-item i").remove(),$(this).closest(".combo-box").find(".combo-item svg").remove(),$(this).closest(".combo-box").find(".combo-item").prepend(n),$(this).closest(".combo-box").find(".combo-item .selected-item").text(o)):($(this).closest(".combo-box").find(".combo-item i").remove(),$(this).closest(".combo-box").find(".combo-item").prepend(a),$(this).closest(".combo-box").find(".combo-item .selected-item").text(o)),$(this).hasClass("data-push"))&&(l='\n            <div class="added-spec">\n                <i class="'+s+'"></i>\n                <div class="spec-name">'+o+'</div>\n                <div class="remove-spec">\n                    '+feather.icons.x.toSvg()+"\n                </div>\n            </div>\n            ",$.when($("#quick-specs").append(l)).then((function(){$("#quick-specs .added-spec .remove-spec").on("click",(function(){$(this).closest(".added-spec").remove()}))})))}))}function initImageComboBox(){$(".is-combo .image-combo-box").on("click",(function(){$(this).toggleClass("is-active")})),$(".image-combo-box .box-dropdown li").on("click",(function(e){var i=e.target,s=$(this).find(".item-icon img").attr("src"),t=$(this).find(".item-name").text();$(i).is(".box-dropdown li, body")||$(i).parents().is(".box-dropdown")||$(".box-dropdown").removeClass("is-active"),$(i).is("body")&&$(".box-dropdown").removeClass("is-active"),$(this).siblings("li.is-active").removeClass("is-active"),$(this).addClass("is-active"),$(this).closest(".image-combo-box").find(".combo-item img").attr("src",s),$(this).closest(".image-combo-box").find(".combo-item .selected-item").text(t)}))}function initUserComboBox(){$(".is-combo .user-combo-box").on("click",(function(){$(this).toggleClass("is-active")})),$(".user-combo-box .box-dropdown li").on("click",(function(e){var i=e.target,s=$(this).find(".item-icon .avatar").attr("src"),t=$(this).find(".item-icon .badge").attr("src"),a=$(this).find(".item-name").text();$(i).is(".box-dropdown li, body")||$(i).parents().is(".box-dropdown")||$(".box-dropdown").removeClass("is-active"),$(i).is("body")&&$(".box-dropdown").removeClass("is-active"),$(this).siblings("li.is-active").removeClass("is-active"),$(this).addClass("is-active"),$(this).closest(".user-combo-box").find(".combo-item .avatar").attr("src",s),$(this).closest(".user-combo-box").find(".combo-item .badge").attr("src",t),$(this).closest(".user-combo-box").find(".combo-item .selected-item").text(a)}))}function initStackedComboBox(){$(".is-combo .stacked-combo-box").on("click",(function(){$(this).toggleClass("is-active")})),$(".stacked-combo-box .box-dropdown li").on("click",(function(e){var i=e.target,s=$(this).find(".item-icon img").attr("src"),t=($(this).find(".item-name").text(),$(this).attr("data-skill")),a='\n            <img id="'+t+'" class="is-stacked" src="'+s+'">\n        ';$(i).is(".box-dropdown li, body")||$(i).parents().is(".box-dropdown")||$(".box-dropdown").removeClass("is-active"),$(i).is("body")&&$(".box-dropdown").removeClass("is-active"),$(this).toggleClass("is-active"),console.log(a),0==$(".stacked-combo-box li.is-active").length?($("#"+t).remove(),$("#skill-placeholder").removeClass("is-hidden"),$(this).closest(".stacked-combo-box").find(".selected-item").text("Select one or more skills")):($("#skill-placeholder").addClass("is-hidden"),$(this).closest(".stacked-combo-box").find(".selected-item").text(""),$("#"+t).length?$("#"+t).remove():$(this).closest(".stacked-combo-box").find(".combo-item").prepend(a))}))}function initBigComboBox(){$(".big-combo-box").on("click",(function(){$(this).toggleClass("is-active")})),$(".big-combo-box .box-dropdown li").on("click",(function(e){var i=e.target,s=$(this).find(".item-icon i").attr("class"),t=$(this).find(".item-name span:first-child").text(),a=$(this).find(".item-name span:nth-child(2)").text();$(i).is(".box-dropdown li, body")||$(i).parents().is(".box-dropdown")||$(".box-dropdown").removeClass("is-active"),$(i).is("body")&&$(".box-dropdown").removeClass("is-active"),$(this).siblings("li.is-active").removeClass("is-active"),$(this).addClass("is-active"),$(this).closest(".big-combo-box").find(".combo-item i").attr("class",s),$(this).closest(".big-combo-box").find(".combo-item .selected-item").text(t),$(this).closest(".big-combo-box").find(".combo-item .selected-desc").text(a)}))}function initAccordion(){var e=$(".accordion");e.each((function(){$(this).toggleClass("ui-accordion ui-widget ui-helper-reset"),$(this).find("h3").addClass("ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all"),$(this).find("div").addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"),$(this).find("div").hide()})),e.find("h3").on("click",(function(e){var i=$(this).parent();if($(this).next().is(":hidden")){var s=$("h3",i);s.removeClass("ui-accordion-header-active ui-state-active ui-corner-top").next().slideUp(300),s.find("span").removeClass("ui-accordion-icon-active"),$(this).find("span").addClass("ui-accordion-icon-active"),$(this).addClass("ui-accordion-header-active ui-state-active ui-corner-top").next().slideDown(300)}e.preventDefault()})),$(".toggle-container").hide(),$(".trigger, .trigger.opened").on("click",(function(e){$(this).toggleClass("active"),e.preventDefault()})),$(".trigger").on("click",(function(){$(this).next(".toggle-container").slideToggle(300)})),$(".trigger.opened").addClass("active").next(".toggle-container").show()}function initAnimatedModals(){var e;$(".modal-trigger").length&&($(".modal-trigger").on("click",(function(){e=$(this).attr("data-modal"),$("#"+e).toggleClass("is-active"),$("#"+e+" .modal-background").toggleClass("scaleInCircle"),$("#"+e+" .modal-content").toggleClass("scaleIn"),$("#"+e+" .modal-close").toggleClass("is-hidden"),setTimeout((function(){$("body").addClass("is-fixed")}),700)})),$(".modal-close, .modal-dismiss").on("click",(function(){$("#"+e+" .modal-background").toggleClass("scaleInCircle"),$("#"+e+" .modal-content").toggleClass("scaleIn"),$("#"+e+" .modal-close").toggleClass("is-hidden"),$("body").removeClass("is-fixed"),setTimeout((function(){$(".modal.is-active").removeClass("is-active")}),500)})))}function initHModals(){var e;$(".h-modal-trigger").length&&($(".h-modal-trigger").on("click",(function(){e=$(this).attr("data-modal"),$("#"+e).toggleClass("is-active")})),$(".h-modal-close").on("click",(function(){$(this).closest(".modal").removeClass("is-active")})))}function initPanels(){var e;$(".right-panel-trigger").length&&($(".right-panel-trigger").on("click",(function(){e=$(this).attr("data-panel"),$("#"+e).addClass("is-active"),"search-panel"==e&&$(".right-panel .search-input").focus()})),$(".panel-overlay, .right-panel .close-panel").on("click",(function(){$(this).closest(".right-panel-wrapper").removeClass("is-active")})))}function scrollToTop(){document.body.scrollTop=document.documentElement.scrollTop=0}function initSmallTextTip(){$(".has-small-text-tip").on("mouseenter",(function(){if($(this).find(".text-tip-text").width()>=250){var e=$(this).find(".text-tip-text").text();$.when($(this).append('\n                <div class="text-tooltip scaleInTooltip">\n                    <div class="tooltip-content">\n                        Some tooltip content\n                    </div>\n                </div>\n            ')).then((function(){$(this).find(".text-tooltip .tooltip-content").html(e)}))}})),$(".has-small-text-tip").on("mouseleave",(function(){$(this).find(".text-tooltip").remove()}))}function initTextTip(){$(".has-text-tip").on("mouseenter",(function(){if($(this).find(".text-tip-text").width()>=380){var e=$(this).find(".text-tip-text").text();$.when($(this).append('\n                <div class="text-tooltip scaleInTooltip">\n                    <div class="tooltip-content">\n                        Some tooltip content\n                    </div>\n                </div>\n            ')).then((function(){$(this).find(".text-tooltip .tooltip-content").html(e)}))}})),$(".has-text-tip").on("mouseleave",(function(){$(this).find(".text-tooltip").remove()}))}function initMediumTextTip(){$(".has-medium-text-tip").on("mouseenter",(function(){if($(this).find(".text-tip-text").width()>=345){var e=$(this).find(".text-tip-text").text();$.when($(this).append('\n                <div class="text-tooltip scaleInTooltip">\n                    <div class="tooltip-content">\n                        Some tooltip content\n                    </div>\n                </div>\n            ')).then((function(){$(this).find(".text-tooltip .tooltip-content").html(e)}))}})),$(".has-medium-text-tip").on("mouseleave",(function(){$(this).find(".text-tooltip").remove()}))}function launchToast(e,i,s,t){iziToast.show({class:"h-toast",icon:icon,title:e,message:i,titleColor:"#fff",messageColor:"#fff",iconColor:"#fff",backgroundColor:"#5d4394",progressBarColor:"#444F60",position:s,transitionIn:"fadeInUp",close:!1,timeout:t,zindex:99999})}function setThemeToLocalStorage(e){window.localStorage.setItem("theme",e),"dark"===e?$("body").addClass("is-dark"):$("body").removeClass("is-dark")}function initDarkMode(){var e=window.localStorage.getItem("theme");$(".landing-page-wrapper").length||null!=e&&null!=e&&(setThemeToLocalStorage(e),"dark"===e&&$(".dark-mode input").prop("checked",!1),$(document).trigger("themeChange",e)),$(".dark-mode input").on("change",(function(){!0===$(this).prop("checked")?($("html, body").removeClass("is-dark"),$(".theme-image").each((function(){var e=$(this).attr("data-light");$(this).attr("src",e)})),setThemeToLocalStorage("light"),$(document).trigger("themeChange","light")):($("html, body").addClass("is-dark"),$(".theme-image").each((function(){var e=$(this).attr("data-dark");$(this).attr("src",e)})),setThemeToLocalStorage("dark"),$(document).trigger("themeChange","dark"))}))}function initAnimatedCheckboxes(){$(".animated-checkbox input").each((function(){var e=$(this);$(this).closest(".animated-checkbox").hasClass("is-checked")?($(this).closest(".animated-checkbox").addClass("is-checked"),e.closest(".animated-checkbox").find(".shadow-circle").addClass("is-opaque"),setTimeout((function(){e.closest(".animated-checkbox").removeClass("is-unchecked")}),150)):($(this).closest(".animated-checkbox").addClass("is-unchecked").removeClass("is-checked"),setTimeout((function(){e.closest(".animated-checkbox").find(".shadow-circle").removeClass("is-opaque")}),150))})),$(".animated-checkbox input").on("change",(function(){var e=$(this);$(this).closest(".animated-checkbox").hasClass("is-checked")?($(this).closest(".animated-checkbox").addClass("is-unchecked").removeClass("is-checked"),setTimeout((function(){e.closest(".animated-checkbox").find(".shadow-circle").removeClass("is-opaque")}),150)):($(this).closest(".animated-checkbox").addClass("is-checked"),e.closest(".animated-checkbox").find(".shadow-circle").addClass("is-opaque"),setTimeout((function(){e.closest(".animated-checkbox").removeClass("is-unchecked")}),150))}))}function initTextFilter(){var e;$(".textFilter-input").length&&(e=$(".textFilter-input").val(),$(".textFilter-input").focus((function(i){$(this).val()===e&&$(this).val("")})).blur((function(i){""===$(this).val()&&$(this).val(e)})).keyup((function(e){var i=$(this).val().toLowerCase().split(" ");i.length&&$(".textFilter-target").hide().filter((function(){for(var e=$(this).find(".textFilter-match").text().toLowerCase(),s=0;s<i.length;s++)if(-1===e.indexOf(i[s]))return!1;return!0})).show()})))}function initCustomTextFilter(){$(".custom-text-filter").length&&$(".custom-text-filter").each((function(){var e=$(this).attr("data-filter-target"),i=$(this).val();$(this).focus((function(e){$(this).val()===i&&$(this).val("")})).blur((function(e){""===$(this).val()&&$(this).val(i)})).keyup((function(i){var s=$(this).val().toLowerCase().split(" ");s.length&&($(e).hide().filter((function(){for(var e=$(this).find("*[data-filter-match]").text().toLowerCase(),i=0;i<s.length;i++)if(-1===e.indexOf(s[i]))return!1;return!0})).show(),0===$(e+":visible").length?($("*[data-filter-hide]").addClass("is-hidden"),$(".custom-text-filter-placeholder").removeClass("is-hidden")):($(".custom-text-filter-placeholder").addClass("is-hidden"),$("*[data-filter-hide]").removeClass("is-hidden")))}))}))}function initPlayers(){if($(".video-player").length)if("development"===env){$("[data-demo-poster]").each((function(){var e=$(this).attr("data-demo-poster");void 0!==e&&$(this).attr("data-poster",e)}));Array.from(document.querySelectorAll(".bulkit-player")).map((function(e){return new Plyr(e)}))}else Array.from(document.querySelectorAll(".bulkit-player")).map((function(e){return new Plyr(e)}))}function initAdvancedFlexTable(){$("#advanced-flex-table").length&&$(".flex-table .flex-table-header .is-checkbox input").on("change",(function(){!1===$(this).prop("checked")?$(".flex-table .flex-table-item .is-checkbox input").prop("checked",!1):$(".flex-table .flex-table-item .is-checkbox input").prop("checked",!0)}))}function initSingleAccordion(){$(".single-accordion .accordion-header").on("click",(function(){$(this).closest(".single-accordion").hasClass("is-exclusive")?$(this).hasClass("is-active")?$(this).removeClass("is-active").next(".accordion-content").slideUp():($(this).closest(".single-accordion").find(".accordion-header").removeClass("is-active"),$(this).closest(".single-accordion").find(".accordion-content").slideUp(),$(this).toggleClass("is-active").next(".accordion-content").slideToggle()):$(this).toggleClass("is-active").next(".accordion-content").slideToggle()}))}function initCollapse(){$(".collapse .collapse-header").on("click",(function(){$(this).closest(".collapse").toggleClass("is-active").find(".collapse-content").slideToggle("fast")}))}function goBack(){window.history.go(-1)}function initBackToTop(){$(window).on("scroll",(function(){$(window).scrollTop()>=600?$("#backtotop").addClass("visible"):$("#backtotop").removeClass("visible")})),$("#backtotop a").on("click",(function(){return $("html, body").animate({scrollTop:0},500),!1}))}function initSearch(){$("#webapp-navbar-search-empty").on("click",(function(){$(".search-input").val(""),$(".search-results").removeClass("is-active")})),$(".search-input").each((function(){$(this).on("keyup",(function(){var e=$(this).closest(".control"),i=$(this).val();i.length>0?$("#webapp-navbar-search-empty").removeClass("is-hidden"):$("#webapp-navbar-search-empty").addClass("is-hidden");var s=new RegExp(i,"i");$.getJSON("assets/data/search.json",(function(i){if(e.find(".search-results .search-result, .search-results .placeholder-wrap").remove(),$.each(i,(function(i,t){if(-1!=t.name.search(s)||-1!=t.position.search(s))if(null!=t.pic){var a='\n                                    <a class="search-result">\n                                        <div class="h-avatar is-small">\n                                            <img class="'+("user"===t.type?"avatar":"article")+'" src="'+t.pic+'" alt="">\n                                        </div>\n                                        <div class="meta">\n                                            <span>'+t.name+"</span>\n                                            <span>"+t.position+"</span>\n                                        </div>\n                                    </a>\n                                ";e.find(".search-results").append(a)}else{var o=new Array("is-danger","is-info","is-primary","is-success","is-warning","is-h-purple","is-h-blue","is-h-green","is-h-orange","is-h-red","is-h-green"),n=o.length;a='\n                                    <a class="search-result">\n                                        <div class="h-avatar is-small">\n                                            <span class="avatar is-fake '+o[Math.floor(Math.random()*n)]+'">\n                                                <span>'+t.initials+'</span>\n                                            </span>\n                                        </div>\n                                        <div class="meta">\n                                            <span>'+t.name+"</span>\n                                            <span>"+t.position+"</span>\n                                        </div>\n                                    </a>\n                                ";e.find(".search-results").append(a)}})),0===$(".search-result").length){e.find(".search-results").append('\n                            <div class="placeholder-wrap">\n                                <div class="placeholder-content has-text-centered">\n                                    <img class="light-image" src="assets/img/illustrations/placeholders/search-4.svg" alt="" />\n                                    <img class="dark-image" src="assets/img/illustrations/placeholders/search-4-dark.svg" alt="" />\n                                    <h3 class="dark-inverted">No Matching Results</h3>\n                                    <p>Sorry, we couldn\'t find any matching records. Please try different search terms.</p>\n                                </div>\n                            </div>\n                        ')}})),""===i?e.find(".search-results").removeClass("is-active"):e.find(".search-results").addClass("is-active")}))}))}function customizeDatatable(){$(".datatable-filter-cell").find(".input").wrap("<div class='control has-icon'></div>");$(".datatable-filter-cell").find(".control.has-icon").append('\n        <div class="form-icon">\n            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>\n        </div>\n    '),$(".datatable-filter-cell").find("select").wrap("<div class='field'><div class='control has-icons-left'><div class='select'></div></div></div>");$(".datatable-filter-cell").find(".control.has-icons-left").append('\n        <div class="icon is-small is-left">\n            <i class="lnil lnil-menu-circle"></i>\n        </div>\n    '),$(".datatable-filter-cell").find("select option:first-child").html("Filter by"),$(".is-datatable tbody td .checkbox input").on("change",(function(){$(this).closest("tr").toggleClass("is-selected"),$(".is-datatable td .checkbox input:checked").length>0?$(".field.has-addons").removeClass("is-disabled"):$(".field.has-addons").addClass("is-disabled")})),$(".is-datatable th .checkbox input").on("change",(function(){!0===$(this).prop("checked")?($(".is-datatable td .checkbox input").prop("checked",!0).trigger("change"),$(".field.has-addons").removeClass("is-disabled")):($(".is-datatable td .checkbox input").prop("checked",!1).trigger("change"),$(".field.has-addons").addClass("is-disabled"))})),$(".pagination li").click((function(){$(".pagination li.is-selected").removeClass("is-selected"),$(this).addClass("is-selected")}))}function initTabbedWidgets(){$(".tabbed-widget .tabbed-control").on("click",(function(){var e=$(this).closest(".tabbed-widget");$(this).hasClass("is-active")||($(this).siblings(".tabbed-control").removeClass("is-active"),$(this).addClass("is-active"),e.find(".inner-list-wrapper").toggleClass("is-active"))}))}