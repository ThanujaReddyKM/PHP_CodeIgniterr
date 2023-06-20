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


		<div class="col-md-9 pl-0" id="comment-box">
				<?php 
				if(validation_errors() != ""){
					?>
					<div class="alert alert-danger">
						<h4 class="alert-heading">Please fix the following errors !</h4>
						<?php echo validation_errors(); ?>
					</div>
					<?php 
						}
					?>

					<?php 
					if(!empty($this->session->flashdata('message'))){
						?>
						<div class="alert alert-success">							
							<?php echo $this->session->flashdata('message'); ?>
						</div>
						<?php 
							}
						?>

			<div class="card mt-4">
				<div class="card-body">
					<form class="mt-4" name="commentForm" id="commentForm" action="<?php echo base_url('blog/detail/'.$article['id']); ?>#comment-box" method="post" >
					
						<div id="comment-box mb-3">
								<p>Comments</p>
							<div class="form-group">
								<textarea placeholder="Comment Here" name="comment" id="comment" class="form-control"><?php 
										echo set_value('comment') ?></textarea>
							</div>

							<div class="form-group mt-3">
								<div class="row">
									<div class="col-md-6">
										<label>Your Name</label>
										<input placeholder="Name" type="text" name="name" value="<?php 
										echo set_value('name') ?>" id="name" class="form-control mt-2">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-4" name="Submit">Submit</button>
							
						</div>
					</form>
				
						<?php 
						if(!empty($comments)){
							foreach($comments as $comment){
								?>
								<div class="user-comments mt-3">
									<p class="text-muted"><strong><?php echo $comment['name'] ?></strong></p>
									<p class="font-italic"><?php echo $comment['comment'] ?></p>
							<small class="user-comments"><?php echo date('d/m/Y', strtotime($comment['created_at'])) ?></small>
								</div>

							<?php
							}					
						}
						?>
						<hr>
				</div>
			</div>
		</div>

						

		</div>			
		</div>
	</div>
</div>
<?php $this->load->view('front/footer') ?>