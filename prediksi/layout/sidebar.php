<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Administrator</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
<!-- 		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li <?php if($hal == "dashboard"){ ?> class="active"<?php } ?>><a <?php if($hal == "dashboard"){ ?> href="" <?php } else { ?> href="../" <?php } ?>><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li <?php if($hal == "training"){ ?> class="active"<?php } ?>><a <?php if($hal == "dashboard"){ ?> href="training" <?php } else { ?> href="../training" <?php } ?>><em class="fa fa-users">&nbsp;</em> Training Data</a></li>
			<li <?php if($hal == "pendidikan"){ ?> class="active"<?php } ?>><a <?php if($hal == "dashboard"){ ?> href="pendidikan" <?php } else { ?> href="../pendidikan" <?php } ?>><em class="fa fa-graduation-cap">&nbsp;</em> Testing Data</a></li>
			<li <?php if($hal == "jabfungsional"){ ?> class="active"<?php } ?>><a <?php if($hal == "dashboard"){ ?> href="jab-fungsional" <?php } else { ?> href="../jab-fungsional" <?php } ?>"><em class="fa fa-drivers-license">&nbsp;</em> Validasi</a></li>
			<li <?php if($hal == "jabakademik"){ ?> class="active"<?php } ?>><a <?php if($hal == "dashboard"){ ?> href="jab-akademik" <?php } else { ?> href="../jab-akademik" <?php } ?>"><em class="fa fa-drivers-license-o">&nbsp;</em>Logout</a></li>
			
			<!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li> -->
			<!-- <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li> -->
		</ul>
	</div><!--/.sidebar-->