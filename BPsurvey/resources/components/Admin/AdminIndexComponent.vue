<template>
	<div class="border-box admin_index_container">
		<div class="admin_index_section">
			<div class="admin_index_left_container">
				<div class="text-center admin_index_left_info_section">
					<a href="/admin/index" class="text-3xl font-bold admin_index_left_info_title_area" @click="showIndex">BOOKPICK'</a>
					<span class="text-xl font-semibold admin_index_left_info_name_area">{{ loginAdminName }}</span>
				</div>
					<p class="mb-5 font-semibold text-center">권한 : {{ loginAdminFlg }}</p>
				<hr>
				<div class="admin_index_left_nav_section">
					<ul class="admin_index_left_nav_ul">
						<li class="admin_index_left_nav_li">
							<a class="font-semibold admin_index_left_nav_dropdown_a" href="#" @click="toggleUserDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
								</svg>
								User
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="userDropdown">
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="/admin/auth/user/management" @click="showUserMenuManagement">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</a>
								</li>
							</ul>
						</li>
						<li class="admin_index_left_nav_li" v-if="isAdmin">
							<a class="font-semibold admin_index_left_nav_dropdown_a" href="#" @click="toggleAdminDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
								</svg>
								Administrator
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="adminDropdown">
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="/admin/auth/management" @click="showAdminMenuManagement">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 
											0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</a>
								</li>
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="/admin/registration" @click="showAdminMenuRegistration">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 
											4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 
											1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
										</svg>
										Registration
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div v-if="showAdminIndex">
				<div class="admin_index_right_container">
					<div class="admin_index_right_top_container">
						<div class="admin_index_right_top_title_section">
							<div class="admin_index_right_top_title_area">
								<span class="mb-5 text-xl font-bold">반가워요, {{ loginAdminName }} 관리자님!</span>
								<span>시스템 관리를 간편하고 효율적으로 할 수 있도록 도와드릴게요.</span>
							</div>
							<a class="text-center" href="/admin" @click="adminLogout" v-if="isAdmin">로그아웃</a>
						</div>	
					</div>
					<div class="admin_index_right_middle_container">
						<div class="mr-5 admin_index_right_middle_section">
							<div class="admin_index_right_middle_number_of_transactions">
								<div class="admin_index_right_middle_number_of_transactions_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
									</svg>		
								</div>
								<div class="admin_index_right_middle_number_of_transactions_text">
									<p class="font-semibold">총 가입유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalRegisterUser }}</span>
									<span class="font-semibold"> 명</span>
								</div>
							</div>
						</div>
						<div class="mr-5 admin_index_right_middle_section">
							<div class="admin_index_right_middle_paymont_amount">
								<div class="admin_index_right_middle_paymont_amount_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
									</svg>
								</div>
								<div class="admin_index_right_middle_paymont_amount_text">
									<p class="font-semibold">금일 가입유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalTodayRegisterUser }}</span>
									<span class="font-semibold"> 명</span>
								</div>
							</div>
						</div>
						<div class="admin_index_right_middle_section">
							<div class="admin_index_right_middle_register_users">
								<div class="admin_index_right_middle_register_users_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
									</svg>
								</div>
								<div class="admin_index_right_middle_register_users_text">
									<p class="font-semibold">만족도 조사 참여유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalSurveyResponseUser }}</span>
									<span class="font-semibold"> 명</span>
								</div>
							</div>
						</div>					
					</div>
					<div class="admin_index_right_bottom_container">
						<div class="admin_index_right_bottom_chart_section">
							<div class="admin_index_right_bottom_chart_area">
								<p class="mb-5 text-xl font-semibold">월 별 가입유저 수</p>
								<apexchart width="1200" height="230" type="bar" :options="chartOption" :series="barChartData"></apexchart>
							</div>
						</div>
						<div class="admin_index_right_bottom_text_section">
							<div class=" admin_index_right_bottom_latest_Posts_section">
								<div class="admin_index_right_bottom_latest_Posts_title_area">
									<span class="mb-5 text-xl font-semibold">만족도 조사 질문 등록</span>
									<a class="admin_index_right_bottom_latest_Posts_title_a" href="/admin/question">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
										</svg>
									추가
									</a>									
								</div>
								<div class="admin_index_right_bottom_latest_Posts_content_area">
									<p class="mb-2 text-sm font-semibold" v-for="question in surveyQuestionList" :key="question">{{ question.survey_question_title }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- User 탈퇴 -->
			<div v-if="showAdminUserManagement">
				<div class="admin_index_right_container">
					<div class="admin_auth_user_section">
						<div class="admin_user_top_container">
							<div class="admin_user_title_section">
								<p class="text-3xl font-semibold">유저관리</p>
							</div>
						</div>

						<div class="admin_user_middle_container">
							<div class="admin_user_info_title_section">
								<p class="mb-10 text-xl font-medium text-center">유저 이메일</p>
								<p class="mb-10 text-xl font-medium text-center">유저 이름</p>
								<p class="mb-10 text-xl font-medium text-center">유저 가입날짜</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴여부</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴관리</p>
							</div>
							<div class="admin_user_info_content_section" v-for="user in userAllList" :key="user">
								<div class="user_info_section">
									<p class="text-center">{{ user.user_email }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ user.user_name }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ user.user_created_at }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ user.deleted_at  ? 'Y' : 'N'  }}</p>
								</div>
								<div class="user_button_section">
									<div class="text-center user_button_area" v-if="!user.deleted_at">
										<button class="user_withdrawal_button" type="submit" @click="userWithdrawal(user.user_email)">탈퇴</button>
									</div>
								</div>
							</div>
						</div>
						
						<!-- 페이지네이션 -->
						<div class="admin_user_bottom_container">
							<div class="admin_user_paging_section">
								<div class="admin_user_paging_area">
									<ul class="mt-5 admin_user_paging_ul">
										<li class="admin_user_paging_li" :class="[{ 'disabled': this.page === 1 }, (this.page !== 1) ? 'cursor-pointer' : '']">
											<div class="admin_user_paging_p_area">
												<p class="admin_user_paging_p" @click="userListUpdate(1)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_user_paging_li" :class="[{ 'disabled': this.page === 1 }, (this.page !== 1) ? 'cursor-pointer' : '']">
											<div class="admin_user_paging_p_area">
												<p class="admin_user_paging_p" @click="userListUpdate(prevnum)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_user_paging_li" v-for="num in numbox" :key="num" :class="[{ 'active': num === this.page }, (num !== this.page) ? 'cursor-pointer' : '']">
											<span class="mt-5 text-lg font-semibold text-center admin_user_paging_p" @click="userListUpdate(num)">{{ num }}</span>
										</li>
										<li class="admin_user_paging_li" :class="[{ 'disabled': this.page === this.lastpage }, (this.page !== this.lastpage) ? 'cursor-pointer' : '']">
											<div class="admin_user_paging_p_area">
												<p class="admin_user_paging_p" @click="userListUpdate(nextnum)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_user_paging_li" :class="[{ 'disabled': this.page === this.lastpage }, (this.page !== this.lastpage) ? 'cursor-pointer' : '']">
											<div class="admin_user_paging_p_area">
												<p class="admin_user_paging_p" @click="userListUpdate(lastpage)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
					
				
			

			<!-- Admin 권한 수정 및 탈퇴 -->
			<div v-if="showAdminAdminManagement">
				<div class="admin_index_right_container">
					<div class="admin_auth_admin_section">
						<div class="admin_admin_top_container">
							<div class="admin_admin_title_section">
								<p class="text-3xl font-semibold">어드민 관리</p>
							</div>
						</div>
						
						<div class="admin_admin_middle_container">
							<div class="admin_admin_info_title_section">
								<p class="mb-10 text-xl font-medium text-center">사원번호</p>
								<p class="mb-10 text-xl font-medium text-center">사원이름</p>
								<p class="mb-10 text-xl font-medium text-center">등록날짜</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴여부</p>
								<p class="mb-10 text-xl font-medium text-center">권한 및 탈퇴관리</p>
							</div>
							<div class="admin_admin_info_content_section" v-for="admin in adminAllList" :key="admin">
								<div class="admin_info_section">
									<p class="text-center">{{ admin.admin_number }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ admin.admin_name }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ admin.created_at }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ admin.deleted_at ? 'Y' : 'N' }}</p>
								</div>
								<div class="admin_button_section">									
									<div class="admin_auth_area">
										<div class="mr-10 text-center admin_select_area">
											<select class="text-center" name="admin_flg" id="admin_flg">
												<option v-if="admin.admin_flg === 2" value="1" selected>root</option>
												<option v-if="admin.admin_flg === 1" value="2" selected>sub</option>
											</select>
										</div>
										<div class="text-center admin_button_area" v-if="!admin.deleted_at">
											<button class="mb-1 admin_withdrawal_button" @click="adminUpdate(admin.admin_number)">변경</button>
											<button class="admin_withdrawal_button" @click="adminWithdrawal(admin.admin_number)">탈퇴</button>
										</div>
									</div>
								</div>								
							</div>							
						</div>
						<!-- 페이지네이션 -->
						<div class="admin_admin_bottom_container">
							<div class="admin_admin_paging_section">
								<div class="admin_admin_paging_area">
									<ul class="mt-5 admin_admin_paging_ul">
										<li class="admin_admin_paging_li" :class="[{ 'disabled': this.page === 1 }, (this.page !== 1) ? 'cursor-pointer' : '']">
											<div class="admin_admin_paging_p_area">
												<p class="text-center admin_admin_paging_p" @click="adminListUpdate(1)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_admin_paging_li" :class="[{ 'disabled': this.page === 1 }, (this.page !== 1) ? 'cursor-pointer' : '']">
											<div class="admin_admin_paging_p_area">
												<p class="text-center admin_admin_paging_p" @click="adminListUpdate(prevnum)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_admin_paging_li" v-for="num in numbox" :key="num" :class="[{ 'active': num === this.page }, (num !== this.page) ? 'cursor-pointer' : '']">
											<span class="mt-5 text-lg font-semibold text-center admin_admin_paging_span" @click="adminListUpdate(num)">{{ num }}</span>
										</li>
										<li class="admin_admin_paging_li" :class="[{ 'disabled': this.page === this.lastpage }, (this.page !== this.lastpage) ? 'cursor-pointer' : '']">
											<div class="admin_admin_paging_p_area">
												<p class="text-center admin_admin_paging_p" @click="adminListUpdate(nextnum)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
										<li class="admin_admin_paging_li" :class="[{ 'disabled': this.page === this.lastpage }, (this.page !== this.lastpage) ? 'cursor-pointer' : '']">
											<div class="admin_admin_paging_p_area">
												<p class="text-center admin_admin_paging_p" @click="adminListUpdate(lastpage)">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
													</svg>
												</p>
											</div>
										</li>
									</ul>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Admin 등록 -->
			<div v-if="showAdminRegistration">
				<div class="admin_index_right_container">
					<div class="admin_index_registration_section">
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_number">사원번호</label>
							<input class="text-base admin_registration_input" type="email" name="admin_number" id="admin_number" 
							autocomplete="off" placeholder="사원번호를 입력 해 주세요." maxlength="5" v-model="registerFormData.admin_number">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password">비밀번호</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password" id="admin_password" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="registerFormData.admin_password">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password_confirm">비밀번호 확인</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password_confirm" id="admin_password_confirm" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="registerFormData.admin_password_confirm" @input="valAdminPasswordConfirm">
							<div class="w-full text-xs text-red-500 error_message" v-if="errors.admin_password_confirm">{{ errors.admin_password_confirm }}</div>
						<div class="w-full text-xs text-blue-500 success_message" v-else-if="!errors.admin_password_confirm && registerFormData.admin_password_confirm">비밀번호가 일치합니다</div>
						<div class="w-full text-xs text-red-500 error_message" v-else-if="validationErrorMsg.admin_password_confirm">{{ validationErrorMsg.admin_password_confirm }}</div>
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_name">이름</label>
							<input class="text-base admin_registration_input" type="text" name="admin_name" id="admin_name" 
							autocomplete="off" placeholder="이름을 입력 해 주세요." v-model="registerFormData.admin_name">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_flg">권한</label>
							<select name="admin_flg" id="admin_flg">
								<option value="1">root</option>
								<option value="2" selected>sub</option>
							</select>
						</div>
						<p class="text-lg text-center text-red-500">{{ errorMsg }}</p>
						<div class="admin_registration_button_area">
							<button class="admin_registration_button" type="submit" @click="adminRegister">
								<div class="admin_registration_button_text_area">
								<span class="text-base font-semibold">등록하기</span>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- 만족도 조사 질문 등록 -->
			<div v-if="showAdminQuestionAdd">
				<div class="admin_index_right_container">
					<div class="admin_question_add_section">
						<div class="admin_question_add_input_area">
							<input class="text-base admin_question_add_input" type="text" name="survey_question_title" id="survey_question_title" 
							autocomplete="off" placeholder="추가할 질문을 입력해주세요" v-model="questionFormData.survey_question_title">
						</div>
						<p class="text-lg text-center text-red-500">{{ errorMsg }}</p>
						<div class="admin_question_add_button_area">
							<button class="admin_question_add_button" type="submit" @click="adminQuestionAdd">
								<div class="question_add_button_text_area">
								<span class="text-base font-semibold">등록하기</span>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
import VueApexCharts from "vue3-apexcharts";

export default {
    name: 'AdminIndexComponent',
    props: {

    },
    
    components: {
		apexchart: VueApexCharts,
    },

    data() {
        return {
            setting: '',
			userDropdown: false,
			adminDropdown: false,
			registerFormData: {
				admin_number: '',
				admin_password: '',
				admin_password_confirm: '',
				admin_name: '',
				admin_flg: '',
			},
			isAdmin: false,
			showAdminIndex: true,
			showAdminUserManagement: false,
			showAdminAdminManagement: false,
			showAdminRegistration: false,
			showAdminQuestionAdd: false,			
			userWithdrawalFormData: {
				user_email: '',
			},
			adminWithdrawalFormData: {
				admin_number: '',
			},
			loginAdminFlg: '',
			loginAdminName: '',
			errorMsg: '',
			totalRegisterUser: 0,
			totalTodayRegisterUser: 0,
			totalSurveyResponseUser: 0,
			questionFormData: {
				survey_question_title: '',
			},
			// 실시간 유효성 검사
			errorMsg: '',
			errors: {				
			},
			validationErrorMsg: {
				admin_password_confirm: '',
				admin_name: '',
			},
			surveyQuestionList: {
			},

			// 가입 유저 차트(BarChart)	
			chartOption: {
				chart: {
					id: "bar-chart"
				},
				xaxis: {
					categories: [
					],
				},
				yaxis: {
					tickAmount: 5,
					forceNiceScale: true,
					min: 0,
					max: 100,
				},
			},
			barChartData: [
				{
					name: "가입자 수",
					data: [],					
				}
			],

			// 페이징 처리
			userAllList: [],
			adminAllList: [],
			paginationData: {},
			currentPage: 1,
			lastPage: 1, // 마지막 페이지 번호
			perPage: 7, // 페이지당 항목 수
			totalPageData: 0, // 전체 항목 수
			
			// 페이지
			page:1,

			lastpage:1,

			first_num:1,

			last_num:1,

			prevnum:1,

			nextnum:2,

			numbox:[],
        }
    },

    created() {		
		this.showAdminIndex = this.$route.path === '/admin/index';
		this.showAdminUserManagement = this.$route.path === '/admin/auth/user/management';
		this.showAdminAdminManagement = this.$route.path === '/admin/auth/management';
		this.showAdminRegistration = this.$route.path === '/admin/registration';
		this.showAdminQuestionAdd = this.$route.path === '/admin/question';

		if (this.showAdminIndex) {
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
			this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
		} else if(this.showAdminUserManagement) {
			this.showAdminIndex = false;
			this.showAdminAdminManagement = false;
			this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
		} else if(this.showAdminAdminManagement) {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
		} else if (this.showAdminRegistration) {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
			this.showAdminQuestionAdd = false;
		}

		this.userListUpdate();
		this.adminListUpdate();
		this.adminTotalUser();
		this.barChartDataList();
		this.surveyList()
	},

    mounted() {
		const adminFlg = localStorage.getItem('loginAdminFlg');
		// root Admin 접속
		if (adminFlg === '1') {
        this.isAdmin = true;
		this.loginAdminFlg = 'root';
		} else if (adminFlg === '2') {
			this.isAdmin = false;
			this.loginAdminFlg = 'sub';
		}

		this.loginAdminName = localStorage.getItem('loginAdminName');	
	},

	methods: {
		toggleUserDropdown() {
			this.userDropdown = !this.userDropdown;
		},

		toggleAdminDropdown() {
			this.adminDropdown = !this.adminDropdown;
		},

		showIndex() {
            this.showAdminIndex = true;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
        },

		showUserMenuManagement() {
			this.showAdminIndex = false;
			this.showAdminUserManagement = true;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
		},

		showAdminMenuManagement() {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = true;
            this.showAdminRegistration = false;
			this.showAdminQuestionAdd = false;
		},

		showAdminMenuRegistration() {
            this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = true;
			this.showAdminQuestionAdd = false;
        },		

		showAdminindexQuestionAdd() {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
			this.showAdminRegistration = false;
            this.showAdminQuestionAdd = true;
		},

		userListUpdate(page) {
			const URL = '/admin/auth/user/management/ul?page=' + page;
			axios.get(URL)
			.then(response => {
				this.userAllList = response.data.userAllList.data;
				console.log(response.data.userAllList.data);
				this.page = response.data.userAllList.current_page;
				this.lastpage = response.data.userAllList.last_page;
				this.paging()
			})
			.catch(error => {
				alert(error.response.data.error);
			});
		},

		adminListUpdate(page) {
			const URL = '/admin/auth/management/al?page=' + page;
			axios.get(URL)
			.then(response => {
				this.adminAllList = response.data.adminAllList.data;
				console.log(this.adminAllList);
				this.page = response.data.adminAllList.current_page;
				this.lastpage = response.data.adminAllList.last_page;
				this.paging()
			})
			.catch(error => {
				alert(error.response.data.error);
			});
		},

		paging(){
			this.numbox = [];
			if(this.lastpage < 7){
				this.first_num = 1
				this.last_num = this.lastpage
			} else {
				if(this.page <= 4){
					this.first_num = 1
					this.last_num = 7
				} else if(this.page >= this.lastpage-3) {
					this.first_num = this.lastpage-6
					this.last_num = this.lastpage
				} else {
					this.first_num = this.page-3
					this.last_num = this.page+3
				}
			}	
			for(let i = this.first_num; i <= this.last_num; i++){
					this.numbox.push(i);
				}
			if(this.page === 1){
				this.prevnum = 1
				this.nextnum = 2
			}else if(this.page === this.lastpage){
				this.prevnum = this.lastpage-1
				this.nextnum = this.lastpage
			}else{  
				this.prevnum = this.page-1
				this.nextnum = this.page+1
			}
		},

		userWithdrawal(user_email) {
            const URL = '/admin/auth/user/management';            
            const formData = new FormData();
            formData.append('user_email', user_email);
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "uw00") {
						alert('계정이 탈퇴처리 되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminWithdrawal(admin_number) {
            const URL = '/admin/auth/management/withdrawal';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);	
			console.log(this.adminWithdrawalFormData);		
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "aw00") {
						alert('어드민계정이 탈퇴처리 되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminRegister() {
			if (!(this.registerFormData.admin_number && this.registerFormData.admin_password
				&& this.registerFormData.admin_password_confirm && this.registerFormData.admin_name)) {
				this.errorMsg = '필수입력사항을 입력해주세요.';
				return;
			} else if (this.registerFormData.admin_flg === 'select') {
				this.errorMsg = '권한을 선택해주세요.';
				return;
			}	

            const URL = '/admin/registration';            
            const formData = new FormData();
            formData.append('admin_number', this.admin_number);
            formData.append('admin_password', this.admin_password);
            formData.append('admin_password_confirm', this.admin_password_confirm);
            formData.append('admin_name', this.admin_name);
            formData.append('admin_flg', this.admin_flg);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "ar00") {
						alert('어드민계정이 생성되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					this.errorMsg = error.response.data.error;
				});
        },

		adminUpdate(admin_number) {
            const URL = '/admin/auth/management/update';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "au00") {
						alert('권한이 변경되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminLogout() {
			const URL = '/admin/logout';
			axios.get(URL)
			.then(response => {
				if(response.data.code === "al00") {
						localStorage.clear();
						alert('로그아웃 되었습니다.');
						this.$router.push('/admin'); 
					} else {                
						console.log("로그아웃 오류");
					}
			})
			.catch(error => {
				console.error('Unexpected error:', error);
			});
		},

		adminTotalUser() {
			const URL = '/admin/index/totalUserStat';
			axios.get(URL)
			.then(response => {
				this.totalRegisterUser = response.data.totalRegisterUser;
				this.totalTodayRegisterUser = response.data.totalTodayRegisterUser;
				this.totalSurveyResponseUser = response.data.totalSurveyResponseUser;				
			})
			.catch(error => {
				console.error(error);
			});
		},

		valAdminPasswordConfirm() {
			if(this.registerFormData.admin_password_confirm !== this.registerFormData.admin_password) {
				this.errors.admin_password_confirm = '비밀번호와 비밀번호 확인이 일치하지 않습니다';
			} else {
				this.errors.admin_password_confirm = '';
			}
		},

		barChartDataList() {			
			const URL = '/admin/index/barChart';
			axios.get(URL)
				.then(response => {
					if(response.data.code === "bd00") {			
						response.data.monthlyRegisterUserData.forEach(monthlyRegisterUserData => {
							this.chartOption.xaxis.categories.push(monthlyRegisterUserData.month+'월');						
							this.barChartData[0].data.push(monthlyRegisterUserData.user_count);
						});
					} else {
						console.error('Response data is not an array:', response.data);
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		surveyList() {
			const URL = '/admin/index/survey';
			axios.get(URL)
			.then(response => {				
				this.surveyQuestionList = response.data.data;
				console.log(this.surveyQuestionList);
			})
			.catch(error => {
				console.error('데이터 에러:', error);
			});
		},

		adminQuestionAdd() {
			if (!(this.questionFormData.survey_question_title)) {
				this.errorMsg = '등록할 질문을 입력해주세요.';
				return;
			} 

            const URL = '/admin/question';            
            const formData = new FormData();
            formData.append('survey_question_title', this.questionFormData.survey_question_title);
			console.log(this.survey_question_title);
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "qa00") {
						alert('만족도 조사 질문이 생성되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					this.errorMsg = error.response.data.error;
				});
        },
    }
}
</script>

<style lang="scss">
    @import '../../sass/Admin/admin_index.scss';
</style>