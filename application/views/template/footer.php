<footer>
	<?php if($content == "data_book_list") { ?>
		
		<div style="align-self: center; align-items: center;">
			<?= $pagination ?>
		</div>
			
		
		<a href="<?= base_url() ?>" class="btn btn-primary">
			Home
		</a>	

		
	<?php } ?>
	Created By: M. Irsyad Masyhudin [NIM: 09021181621030]
</footer>
</div>
	</div>




<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>assets/js/main.js"></script>


</body>
</html>