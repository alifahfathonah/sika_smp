<ul class="nav nav-list">
	<li class="active">
		<a href="<?php echo base_url(); ?>index.php/home">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Home </span>
						</a>

		<b class="arrow"></b>
	</li>

	<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "3"){ ?>
	<li class="">
		<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Master
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<?php if ($this->session->userdata('level') == "1"){ ?>
			<li class="">
				<a href="<?php echo base_url(); ?>index.php/siswa">
								<i class="menu-icon fa fa-caret-right"></i>
								Siswa
							</a>
							<b class="arrow"></b>
						</li>
							<?php } ?>


						<?php if ($this->session->userdata('level') == "3" or $this->session->userdata('level') == "1"){ ?>
						<li class="">
							<a href="<?php echo base_url(); ?>index.php/pelajaran">
											<i class="menu-icon fa fa-caret-right"></i>
											Mata Pelajaran
										</a>

							<b class="arrow"></b>
						</li>
						<?php } ?>

				<?php if ($this->session->userdata('level') == "1"){ ?>
				<li class="">
								<a href="<?php echo base_url(); ?>index.php/kelas">
													<i class="menu-icon fa fa-caret-right"></i>
													Kelas
												</a>

					<b class="arrow"></b>
				</li>


				<li class="">
					<a href="<?php echo base_url(); ?>index.php/guru">
									<i class="menu-icon fa fa-caret-right"></i>
									Guru
								</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>


		</ul>
		<?php } ?>

		<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "2" or $this->session->userdata('level') == "3"){ ?>
		<li class="">
			<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Transaksi </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "3"){ ?>
				<li class="">
					<a href="<?php echo base_url(); ?>index.php/jadwal">
									<i class="menu-icon fa fa-caret-right"></i>
									Jadwal Pelajaran
								</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "2"){ ?>
				<li class="">
					<a href="<?php echo base_url(); ?>index.php/nilai">

									<i class="menu-icon fa fa-caret-right"></i>
									Nilai
								</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>

		<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "2" or $this->session->userdata('level') == "3"){ ?>
		<li class="">
			<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">Laporan</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<?php if ($this->session->userdata('level') == "1" or $this->session->userdata('level') == "2"){ ?>
				<li class="">
					<a href="<?php echo base_url(); ?>index.php/lap_nilai">
									<i class="menu-icon fa fa-caret-right"></i>
									Laporan Nilai Siswa
								</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>

			<?php if ($this->session->userdata('level') == "1"){ ?>
			<li class="">
				<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-envelope"></i>
							<span class="menu-text"> SMS Manager </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url(); ?>phonebook">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku Telepon
								</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url(); ?>group">
									<i class="menu-icon fa fa-caret-right"></i>
									Group Telepon
								</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url(); ?>phonebook/group">
									<i class="menu-icon fa fa-caret-right"></i>
									Kirim Ke Group
								</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url(); ?>api">
									<i class="menu-icon fa fa-caret-right"></i>
									Api Setting
								</a>
						<b class="arrow"></b>
					</li>

				</ul>
			</li>
			<?php } ?>

			<?php if ($this->session->userdata('level') == "3"){ ?>
			<li class="">
				<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart-o"></i>
							<span class="menu-text">Transkip Nilai</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url(); ?>index.php/transkip_nilai">
									<i class="menu-icon fa fa-caret-right"></i>
									Transkip Nilai
								</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			<?php } ?>


			<?php if ($this->session->userdata('level') == "1"){ ?>
			<li class="">
				<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-user"></i>
							<span class="menu-text"> User</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url(); ?>index.php/user">
									<i class="menu-icon fa fa-caret-right"></i>
									User Setting
								</a>

						<b class="arrow"></b>
					</li>

				</ul>
			</li>
			<?php } ?>


		</li>
		<?php } ?>
</ul>
<!-- /.nav-list -->
