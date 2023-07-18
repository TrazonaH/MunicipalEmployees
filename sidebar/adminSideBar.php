<div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper">
	<!--begin::Menu Container-->
	<div id="tc_aside_menu" class="aside-menu  mb-5" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
		<!--begin::Menu Nav-->
		<div id="accordion">
			<ul class="nav flex-column">
				<li class="nav-item active" >
					<a href="index.php" @click="pageName = 'default';" class="nav-link" style="background-color: red">
						<span class="svg-icon nav-icon">
							<!-- <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
												<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
												<polyline points="9 22 9 12 15 12 15 22"></polyline>
											</svg> -->
						</span>
						<span class="nav-text" style="font-size: 18px; ">
							Dashboard
						</span>
					</a>


				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#employee" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						<!-- <i class="fa-sharp fa-solid fa-trophy"></i> -->
						<i class="fa-solid fa-users fa-xl" style="color: #11e815;"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Employee</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="employee" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'viewEmployees'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Employees</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'cos'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Contract of Service</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'jo'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Job Order</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item" >
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#department" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						
						<i class="fa-solid fa-sitemap fa-xl"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Departments</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="department" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
								
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'MayorsOffice'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Mayor's Office</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Tourism'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Tourism</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'HR'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">HR</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DRRM'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">DRRM</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'VMsbOffice'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Vice Mayor/SB Office</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'MPDC'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">MPDC</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Engineering'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Engineering</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Budget'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Budget</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DSWD'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">DSWD</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Assessor'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Assessor</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Accounting'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Accounting</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DA'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">DA</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'LCR'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">LCR</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'Treasury'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Treasury</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'RHUpersonnel'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">RHU Personnel</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'PublicMarket'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Public Market</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'SolidWaste'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Solid Waste</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'CTM'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">CTM</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'MarineWatch'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Marine Watch</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'ROROport'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">RORO Port</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'CPC'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">CPC</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'SBmember'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">SB Member</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'BrgyCaptain'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Brgy. Captain</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DepedChed'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">DEPED/CHED</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'PolicePersonnel'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Police Personnel</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'BFPpersonnel'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">BFP Personnel</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DayCareTeacher'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Day Care Teachers</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'SoloParentFederation'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Solo Parent Federation</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'SeniorCitizen'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">Senior Citizen</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'CCCS'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">CCCS</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'COMELEC'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">COMELEC</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0)" @click="pageName = 'DILG'" class=" nav-link sub-nav-link">
										<span class="svg-icon nav-icon d-flex justify-content-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
											</svg>
										</span>
										<span class="nav-text">DILG</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#birthdays" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						<i class="fa-solid fa-cake-candles fa-xl" style="color: #df6b0c;"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Birthdays</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="birthdays" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
							<li class="nav-item" >
								<a href="javascript:void(0)" @click="pageName = 'viewMonthly'" class="nav-link sub-nav-link">
									<span class="svg-icon nav-icon">
									<i class="fa-solid fa-user"></i>
									</span>
									<span class="nav-text" >This Month Celebrants</span>
									<!-- <i class="fas fa-chevron-right fa-rotate-90"></i> -->
								</a>
							</li>
							<li class="nav-item" >
								<a href="javascript:void(0)" @click="pageName = 'viewNextMonthly'" class="nav-link sub-nav-link">
									<span class="svg-icon nav-icon">
									<i class="fa-solid fa-user"></i>
									</span>
									<span class="nav-text" >Next Month Celebrants</span>
									<!-- <i class="fas fa-chevron-right fa-rotate-90"></i> -->
								</a>
							</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#bonus" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						<!-- <i class="fa-sharp fa-solid fa-trophy"></i> -->
						<i class="fa-sharp fa-solid fa-trophy fa-xl" style="color: #08388c;"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Loyalty Bonus</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="bonus" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
								<li class="nav-item" >
									<a href="javascript:void(0)" @click="pageName = 'loyaltyB'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon">
										<i class="fa-solid fa-gift fa-lg" style="color: #f11d0e;"></i>
										</span>
										<span class="nav-text" >This Year</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#step" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						<!-- <i class="fa-sharp fa-solid fa-trophy"></i> -->
						<i class="fa-solid fa-coins fa-xl" style="color: #e2ab12;"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Salary Increment</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="step" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
								<li class="nav-item" >
									<a href="javascript:void(0)" @click="pageName = 'step'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon">
										<i class="fa-solid fa-coins fa-xl" style="color: black;"></i>
										</span>
										<span class="nav-text" >This Year</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#emergency" role="button" aria-expanded="false" aria-controls="catalog">
						<span class="svg-icon nav-icon">
						<!-- <i class="fa-sharp fa-solid fa-trophy"></i> -->
						<i class="fa-solid fa-phone fa-xl" style="color: #eb0f0f;"></i>
						</span>
						<span class="nav-text" style="font-size: 18px;">Emergency Contact</span>
						<i class="fas fa-chevron-right fa-rotate-90"></i>
					</a>
					<div class="collapse nav-collapse" id="emergency" data-parent="#accordion">
						<div id="accordion1">
							<ul class="nav flex-column">
								<li class="nav-item" >
									<a href="javascript:void(0)" @click="pageName = 'emergency'" class="nav-link sub-nav-link">
										<span class="svg-icon nav-icon">
										<i class="fa-solid fa-phone fa-xl" style="color: #eb0f0f;"></i>
										</span>
										<span class="nav-text" >Hotline Numbers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				
				

				
			</ul>
		</div>

		<!--end::Menu Nav-->
	</div>
	<!--end::Menu Container-->
</div>