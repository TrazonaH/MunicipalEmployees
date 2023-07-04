<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
	<meta charset="utf-8" />
	<title>Admin | Dashboard</title>
	<meta name="description" content="Updates and statistics" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="assets/dashboard/css/stylec619.css?v=1.0" rel="stylesheet" type="text/css" />
	<link href="assets/dashboard/api/pace/pace-theme-flat-top.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="assets/dashboard/api/mcustomscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<link href="assets/dashboard/api/datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="assets/dashboard/media/logos/favicon.html" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
	<div id="tc_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<!--begin::Logo-->
		<a href="index.html" class="brand-logo">
			<span class="brand-text"><h4>Municipality of Cordova</h4></span>
		</a>
		<!--end::Logo-->
	</div>
	<!--end::Header Mobile-->
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root" id='app'>
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<div>
				<div  class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="tc_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="tc_brand">
						<!--begin::Logo-->
						<a href="index-2.html" class="brand-logo">
							<img class="brand-image" alt="Logo" src="assets/dashboard/images/misc/marching.gif" style="margin-left: -15px; border-radius: 50%;" />
						</a>
						<!--end::Logo-->


					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<?php
					include('sidebar/adminSideBar.php');
					?>
					<!--end::Aside Menu-->
				</div>
			</div>
			<!--begin::Aside-->

			<div class="aside-overlay"></div>
			<!--end::Aside-->
			<!--begin::Wrapper-->

			<div class="d-flex flex-column flex-row-fluid wrapper" id="tc_wrapper">
				<!--begin::Header-->
				<div id="tc_header" class="header header-fixed">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="tc_header_menu_wrapper">
							<!--begin::Header Menu-->
							<div id="tc_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">

									<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active p-0" data-menu-toggle="click" aria-haspopup="true">
										<!--begin::Toggle-->
										<div class="btn  btn-clean btn-dropdown mr-0 p-0" id="tc_aside_toggle">
											<span class="svg-icon svg-icon-xl svg-icon-primary">

												<svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="../../www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
												</svg>
											</span>
										</div>
										<!--end::Toolbar-->
									</li>

								</ul>
								<!--end::Header Nav-->
							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">
							<div class="topbar-item">
								<div v-if="pageName == 'products'" class="quick-search quick-search-inline ml-20 mr-1 w-300px" id="kt_quick_search_inline">
									<!--begin::Form-->
									<form method="get" class="quick-search-form">
										<div class="input-group rounded bg-light">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span class="svg-icon svg-icon-lg">
														<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-search-heart" fill="currentColor" xmlns="../../www.w3.org/2000/svg">
															<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
															<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
														</svg>
													</span>
												</span>
											</div>
											<input type="text" v-model="searchQuery" class="form-control h-45px search " placeholder=" Search...">

										</div>
									</form>
									<!--end::Form-->
									<!--begin::Search Toggle-->
									<div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
									<!--end::Search Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
										<div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="350" data-mobile-height="200" style="height: 350px; overflow: hidden;">
											<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
												<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
												</div>
											</div>
											<div class="ps__rail-y" style="top: 0px; right: 0px;">
												<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
												</div>
											</div>
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
							</div>
							<!-- <div class="dropdown" >

								<div class="topbar-item" data-toggle="dropdown" data-display="static">
									<div class="btn btn-icon btn-clean btn-dropdown mr-1">
										<div class="svg-icon svg-icon-xl svg-icon-primary" title="Notification">

											<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="../../www.w3.org/2000/svg.html">
												<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
												<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
											</svg>
											<div class="lds-ripple">
												<div></div>
												<div></div>
											</div>
										</div>
										<span class="badge badge-pill badge-primary" v-if="notifyCounter != 0">{{ notifyCounter }}</span>
									</div>
								</div>
								<div class="dropdown-menu p-0 m-0 dropdown-menu-right w-300px">
									<form>
										<div class="d-flex flex-column p-3 border-bottom rounded-top">
											<h4 class="d-flex justify-content-between align-items-center mb-0 rounded-top">
												<span class="font-size-h5 ">Notifications</span>
											</h4>
										</div>
										<div class="nav nav-hover scrollbar-1 ">

											<a href="javascript:void(0)" class="nav-item border-bottom" v-for="request in requests" @click="updateUnreadRequest(request.request_id)">
												<div class="nav-link">
													<div class="nav-icon mr-3">
														<i class="fas fa-cog text-primary"></i>
													</div>
													<div class="nav-text">
														<div class="font-weight-bold">{{request.message}}</div>
														<div class="text-muted">{{request.date_requested}}</div>
													</div>
												</div>
											</a>
										</div>
										<div class="d-flex flex-column p-3 rounded-top">

											<h4 class="d-flex justify-content-center mb-0  rounded-top">
												<a href="javascript:void(0)" class="font-size-base text-primary">View All</a>

											</h4>

										</div>
									</form>
								</div>

							</div> -->
							<!--begin::user-->
							<div class="dropdown">

								<div class="topbar-item" data-toggle="dropdown" data-display="static">
									<div class="btn btn-icon w-auto btn-clean d-flex align-items-center pr-1 pl-3">
										<span class="text-dark-50 font-size-base d-none d-xl-inline mr-3"></span>
										<span class="symbol symbol-35 symbol-light-success">
											<span class="symbol-label font-size-h5 ">
												<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="../../www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
												</svg>
											</span>
										</span>
									</div>
								</div>

								<!-- <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">
									<a href="javascript:void(0)" class="dropdown-item" @click='logout'>
										<span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
												<path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
												<line x1="12" y1="2" x2="12" y2="12"></line>
											</svg>
										</span>
										Logout
									</a>
								</div> -->
							</div>
							<!--end::user-->


						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>