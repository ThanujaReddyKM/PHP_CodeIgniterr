<?php $this->load->view('front/header') ?>
<div class="container">
	<h3 class="pt-4 pb-4">Blog</h3>
	<div class="row">
		<div class="col-md-12">
			<h3>
				<?php echo $article['title']; ?>
			</h3>
			<div class="d-flex justify-content-between">
				<p class="text-muted">Posted By<strong><?php echo $article['author'] ?></strong> on <strong><?php echo date('d M Y',strtotime($article['created_at']))  ?></strong></p>

				<p class="bg-light pt-2 pb-2 pl-3">
						<a href="#" class="text-muted text-uppercase"><?php echo $article['category_name']; ?></a>
					</p>
			</div>
			<?php
				if($article['image'] != '' &&  file_exists('./public/uploads/articles/thumb_front/'.$article['image'])){
					?>
					<div class="mt-4">
					<img class="w-500" src="<?php echo base_url('public/uploads/articles/thumb_front/'.$article['image']); ?>" alt="">
					</div>
				
			<?php } 
			?>
					
					<br>

			<?php echo word_limiter(strip_tags($article['description']),50); ?>				
			<!-- <?php echo $article['description']; ?>	 -->
						

		</div>			
		</div>
	</div>
</div>
<?php $this->load->view('front/footer') ?>