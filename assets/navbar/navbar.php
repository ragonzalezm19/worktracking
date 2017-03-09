		<div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<a id='navbar-name' href="" class="navbar-brand">
						WorkTracking
					</a>
				</div>
				<div class="navbar-tools">
					<ul class="nav navbar-right">
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<img src="<?php echo $Path ?>assets/images/user-1-small.jpg" class="circle-img" alt="">
								<span class="username"><?php echo $Name.' '.$Lastname ?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#informacion-usuario" data-toggle="modal">
										<i class="clip-user-2"></i>
										&nbsp;Mi Perfil
									</a>
								</li>
								<!-- <li>
									<a href="pages_calendar.html">
										<i class="clip-calendar"></i>
										&nbsp;My Calendar
									</a>
								</li> -->
								<!-- <li>
									<a href="pages_messages.html">
										<i class="clip-bubble-4"></i>
										&nbsp;My Messages (3)
									</a>
								</li> -->
								<li class="divider"></li>
								<!-- <li>
									<a href="utility_lock_screen.html"><i class="clip-locked"></i>
										&nbsp;Lock Screen </a>
								</li> -->
								<li>
									<a id="logout">
										<i class="clip-exit"></i>
										&nbsp;Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>