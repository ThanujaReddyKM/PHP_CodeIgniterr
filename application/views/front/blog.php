<?php $this->load->view('front/header') ?>
<div class="pb-4 pt-4">
		<div class="container">
			<h3 class="pt-4 pb-3" >Blog</h3>

			<?php 
			 if(!empty($articles)){
			 		foreach ($articles as $article) {
			 	// code...
			 
			 
			  ?>

			<div class="row mb-4">
				<div class="col-md-4">
					<?php
					if(!empty($article['image'])){						
					 ?>
					 <img class="w-100 rounded" src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$article['image']); ?>">
					 <?php
					}
					?>
				</div>
				<div class="col-md-8">
					<p class="bg-light pt-2 pb-2 pl-3">
						<a href="#" class="text-muted text-uppercase"><?php echo $article['category_name']; ?></a>
					</p>
					<h3><a href="#"> <?php echo $article['title'] ?></a>
					</h3>
					<p><?php echo word_limiter(strip_tags($article['description']),50); ?> </p>

					<p class="text-muted">Posted By<strong><?php echo $article['author'] ?></strong> on <strong><?php echo date('d M Y',strtotime($article['created_at']))  ?></strong></p>
				</div>
			</div>
		<?php }
		}
	 ?>
		</div>
	</div>

			
<?php $this->load->view('front/footer') ?>

























