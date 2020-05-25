<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
<!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="{{ url('/')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('users')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Users
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Manage </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('merits') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Merit
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ route('demerits') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Demerit
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ route('cases') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Cases
								</a>

								<b class="arrow"></b>
							</li>

							

							
						</ul>
					</li>

					
					
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>