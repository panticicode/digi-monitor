<div class="sidebar">
	<ul class="navigation-menu">
		<li class="nav-category-divider"><a href="{{ route('dashboard.index') }}" class="main-function">MAIN FUNCTION</a></li>
		@if(\Auth::user()->isSupperAdmin() || \Auth::user()->isAdmin())
		@if(\Auth::user()->isSupperAdmin())
		<li>
			<a href="{{ route('dashboard.admin.index') }}">
				<span class="link-title">Admin</span>
			</a>
		</li>
		@endif
		@if(\Auth::user()->isAdmin()) 
		<li>
			<a href="{{ route('dashboard.invite.index') }}">
				<span class="link-title">Invite Member</span>
			</a>
		</li>
		<li>
			<a href="{{ route('dashboard.members.index') }}">
				<span class="link-title">Members</span>
			</a>
		</li>
		<li>
			<a href="{{ route('dashboard.groups.index') }}">
				<span class="link-title">Groups</span>
			</a>
		</li>
		<a href="#" class="AllOrCustom" data-toggle="collapse" data-target="#AllOrCustom">
			<span class="link-title">Sending</span>
		</a>
		<div id="AllOrCustom" class="collapse">
			<li>
				<a href="{{ route('dashboard.send.showTemplate') }}">
					<span class="link-title">Send To Group Member</span>
				</a>
			</li>
			<li>
				<a href="{{ route('dashboard.send.show_all') }}">
					<span class="link-title">Send To All Member</span>
				</a>
			</li>
		</div>
		<li>
			<a href="{{ route('dashboard.templates.index') }}">
				<span class="link-title">Templates</span>
			</a>
		</li>
		<li>
			<a href="{{ route('dashboard.campaigns.index') }}">
				<span class="link-title">Campaigns</span>
			</a>
		</li>
		@endif
		<li>
			<a href="{{ route('dashboard.hr.index') }}">
			<span class="link-title">HR</span>
			</a>
		</li>
		<li>
			<a href="{{ route('dashboard.suppliers.index') }}">
				<span class="link-title">Suppliers</span>
			</a>
		</li>
		@endif
	</ul>
	<div class="sidebar_footer">
		<div class="user-account">
		<a class="user-profile-item" href="#"><i class="mdi mdi-account"></i> Profile</a>
		<a class="user-profile-item" href="#"><i class="mdi mdi-settings"></i> Account Settings</a>
		<form action="{{ route('logout') }}" method="post">
			@csrf
			<button class="btn btn-primary btn-logout">Logout</button>
		</form>
		</div>
		<div class="btn-group admin-access-level">
		<div class="avatar">
				<img class="profile-img" src="https://placehold.it/50x50" alt="">
		</div>
		<div class="user-type-wrapper">
			<p class="user_name">{{ \Auth::user()->name }}</p>
			<div class="d-flex align-items-center">
			<div class="status-indicator small rounded-indicator bg-success"></div>
			<small class="user_access_level">{{ \Auth::user()->name }}</small>
			</div>
		</div>
		<i class="arrow mdi mdi-chevron-right"></i>
		</div>
	</div>
</div>