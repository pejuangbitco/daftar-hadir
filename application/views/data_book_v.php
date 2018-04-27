

			<div class="wrap-contact100">
				<a href="<?= base_url('data_book/view_list') ?>">
					<div class="contact100-pic js-tilt" data-tilt>
						<h3>View List</h3>
						<img src="<?= base_url() ?>assets/images/img-01.png" alt="IMG">
					</div>	
				</a>


				<form class="contact100-form validate-form" action="<?= base_url('data_book/daftar') ?>" method="post">
					<?php if($this->session->flashdata('msg')) { ?>
					<span class="contact100-form-title" style="color: red;">
							<?= $this->session->flashdata('msg') ?>
					</span>
					<?php } ?>
					<span class="contact100-form-title">
						Daftar Kehadiran
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="nama" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Phone is required">
						<input class="input100" type="text" name="telp" placeholder="No.HP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div style="text-indent: 50px; padding-bottom: 10px;">
						Captcha: 
							<?php echo $cap['image']; ?>	
						
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Captcha is required">
						<input id="capt" class="input100" type="text" name="captcha" placeholder="Tulis captca disini">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-copyright" aria-hidden="true"></i>
						</span>
					</div>

					




					<div class="container-contact100-form-btn">
						<button onclick="cekCaptca()" class="contact100-form-btn">
							Simpan
						</button>
					</div>
				</form>
			</div>

			<script type="text/javascript">
				
				function cekCaptca() {
					var input = document.getElementById("capt").value;
					var capt = <?php echo $cap['word'] ?>
					if (input!=capt) {
						alert("Captcha Salah!");
					}
				}
			</script>

			

		
		
