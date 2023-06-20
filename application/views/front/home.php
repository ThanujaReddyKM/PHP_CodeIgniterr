
<?php $this->load->view('front/header') ?>

	<!-- Carosel -->
	<div id="carouselExampleFade" class="carousel slide carousel-fade">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="
						<?php echo base_url('public/images/slide1.jpg')?>" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item ">
		      <img src="
							<?php echo base_url('public/images/slide2.jpg')?>" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="<?php echo base_url('public/images/slide3.jpg')?>" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
	</div>
		<div class="container pt-4 pb-4">
				<h3 class="pb-3">About Company</h3>
				<p class="text-muted"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

		</div>

		<div class="bg-light pb-4">
			<div class="container pb-3 pt-4">
			<h3>OUR SERVICES</h3>
			<div class="row">
				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box1.jpg') ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Website Development</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box2.jpg') ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Digital Marketing</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box3.jpg')?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Mobile App Development</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box4.jpg') ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">It Consulting Services</h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

			</div>
		</div>
		</div>


<?php if(!empty($articles)) {?>



	<div class="pb-4 pt-4">
		<div class="container">
			<h3 class="pt-4 pb-3" >LATEST BLOGS</h3>

			<div class="row">
				<?php foreach($articles as $article) { ?>
				<div class="col-md-3">
					<div class="card h-100">
						<a href="<?php echo base_url('blog/detail/'.$article['id'])?>">
						<?php if(file_exists('./public/uploads/articles/thumb_admin/'.$article['image'])) { ?>

					  <img src="<?php echo base_url('./public/uploads/articles/thumb_admin/'.$article['image']); ?>" class="card-img-top" alt="...">

						<?php } ?>
					  <div class="card-body">
					    <p class="card-text"><?php echo $article['title']; ?></p>

						<a class="btn btn-primary btn-sm" href="<?php echo base_url('blog/detail/'.$article['id'])?>">Read More </a>

					  </div>
					</div>
				</div>
			<?php } ?>
 
<!-- 				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box2.jpg') ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box3.jpg')?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card h-100">
					  <img src="<?php echo base_url('public/images/box4.jpg') ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div> -->

			</div>

		</div>
	</div>

<?php } ?>

	<?php $this->load->view('front/footer') ?>

	