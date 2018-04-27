
			<h2 style="font-style: bold; color: red; background-color: white;">
					<?php echo $this->session->flashdata('msg'); ?>
				</h2>
			<div class="wrap-contact100">
				
				<?php foreach ($data as $key) {  ?>
					<div class="contact100-form validate-form">
					<span class="contact100-form-title">
						Data Kehadiran <?= $key->email  ?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input value="<?= $key->nama ?>" class="input100" type="text" name="nama" placeholder="Name" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input value="<?= $key->email ?>" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Phone is required">
						<input value="<?= $key->telp ?>" class="input100" type="text" name="telp" placeholder="No.HP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-contact100-form-btn">
						<a href="<?= base_url('data_book/edit/'. $key->id) ?>" class="contact100-form-btn">
							Edit
						</a>
					</div>

					<div class="container-contact100-form-btn" >
						<a href="<?= base_url('data_book/delete/'. $key->id) ?>" class="contact100-form-btn" style="background-color: red;">
							Delete
						</a>
					</div>	
				</div>

				<?php } ?>
				
				
				
			</div>
			
			
