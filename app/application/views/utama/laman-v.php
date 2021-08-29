<div class="container">
	<div class="mt-4">
		<h2><?php echo $detail->judul_laman; ?></h2>
		<?php if ($detail->img_laman !== 'default.jpg'): ?>
			<div style="text-align: center;">
				<img src="<?php echo base_url('assets/img/laman/'.$detail->img_laman) ?>" alt="#" width="50%" class="rounded mx-auto d-block">
			</div>
		<?php endif ?>
		<p><?php echo $detail->isi_laman; ?></p>
	</div>
</div>