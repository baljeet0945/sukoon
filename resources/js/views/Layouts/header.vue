<template>
	<header class="site-header mo-left header style-1">
			<!-- Main Header -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix ">
					<div class="container-fluid clearfix">
						<!-- Website Logo -->
						<div class="logo-header mostion logo-dark">
							  <router-link to="/menu"><img src="backend/images/sukoon.png" alt=""></router-link>
						</div>
						<!-- Nav Toggle Button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- Extra Nav -->
						<div class="extra-nav">
							<div class="extra-cell">
								<a href="javascript:void();" class="profile-box">
									<div class="header-info">
										<span>Robertos Jr.</span>
										<small>Super Admin</small>
									</div>
									<div class="img-bx">
										<img src="assets/images/avatar/1.jpg" alt="">
									</div>
								</a>
							</div>
						</div>
						
						<div class="sidebar-menu">
							<div class="menu-btn navicon">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						
						<div class="header-nav navbar-collapse collapse" id="navbarNavDropdown">
							<div class="logo-header">
								<img src="assets/images/avatar/1.jpg" alt="">
							</div>
							<ul class="nav navbar-nav navbar navbar-left">	
								<li class=""><router-link to="/menu">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
										<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
										<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
										<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
									</g>
								</svg>
								POS</router-link></li>							
								<li class=""><router-link to="/order-status">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
										<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
									</g>
								</svg>
								Orders Status</router-link></li>							
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Main Header End -->
		</header>
</template>
<script>
    export default {
       name:'HeaderLayout'
    }
</script>
