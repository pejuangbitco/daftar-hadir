

			<div class="wrap-contact100">
				<span>
					<button onclick="location.href='<?= base_url() ?>';" class="btn btn-primary">
							Home
						</button>
				</span>
				<form class="contact100-form validate-form" action="<?= base_url('data_book/edit/' . $data->id) ?>" method="post">
					<?php if($this->session->flashdata('msg')) { ?>
					<span class="contact100-form-title" style="color: red;">
							<?= $this->session->flashdata('msg') ?>
					</span>
					<?php } ?>
					<span class="contact100-form-title">
						Edit Data Kehadiran
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input value="<?= $data->nama ?>" class="input100" type="text" name="nama" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: emailku@gmail.com">
						<input value="<?= $data->email ?>" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Phone is required">
						<input value="<?= $data->telp ?>" class="input100" type="text" name="telp" placeholder="No.HP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-contact100-form-btn">
						<button name="submit" class="contact100-form-btn">
							Simpan
						</button>
					</div>
				</form>
				
			</div>

