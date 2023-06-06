<?php $this->load->view('admin/header');?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home'?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/article/index'?>">Articles</a></li>
              <li class="breadcrumb-item active">Create new Article</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>

    		<div class="content">
    			<div class="container-fluid">
    				<div class="row">
    					<div class="col-lg-12">


    						<div class="card">
    							<div class="card-header">
    							<div class="card-title " >
    								Create New Article.
								 </div>
						  </div>
							<form name="categoryForm" id="categoryForm" method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/article/create'?>">

						<div class="card-body">
								<div class="form-group">
									<label>Category</label>
									<select name="category_id" class="form-control <?php echo(form_error('category_id') != "") ? 'is-invalid' : ''; ?>" id="category_id">
									<option value=""> Select a Category</option> 
									<?php 
									if(!empty($categories))
									{
										foreach($categories as $category){
											?>
										<option <?php echo  set_select('category_id', $category['id'],false); ?> value="<?php echo $category['id']; ?>"> <?php echo $category['name'];?></option>
											<?php
										}
									}
											?>								
									</select>	
									<?php
									echo form_error('category_id');
									?>							
								</div>

								<div class="form-group">
									<label>Title</label>
									<input class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : ''; ?> " type="text" name="title" id="title" value="<?php echo set_value('title'); ?>">	
									<?php
									echo form_error('title');
									?>							
								</div>

								<div class="form-group">
									<label>Description</label>	
									<textarea name="description" id="description" class="textarea" value="<?php echo set_value('description'); ?>"></textarea>						
								</div>

								<div class="form-group">
									<label>Image</label><br>
										<input type="file" name="image" id="image"  class="<?php echo(!empty($imageError)) ? 'is-invalid' : ''; ?>">	
										<?php 
										if(!empty($imageError)) echo "<p class='invalid-feedback'>". $imageError."</p>";
										?>		
								</div>

								<div class="form-group">
									<label>Author</label>	
										<input type="text" name="author" id="author"  class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : ''; ?>" value="<?php echo set_value('author'); ?>" >	
										<?php
									echo form_error('author');
									?>					
								</div>




								<div class="custom-control custom-radio float-left">
								<input type="radio" class="custom-control-input" id="statusActive" value ="1" name="status" checked="">
									<label for="statusActive" class="custom-control-label">Active</label>
								</div>	

								<div class="custom-control custom-radio float-left">
									<input type="radio" class="custom-control-input" id="statusBlock" value ="1" name="status" checked="">
									<label for="statusBlock" class="custom-control-label">Block</label>
								</div>							
							
						</div>
						<div class="card-footer">
							<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							<a href="<?php echo base_url().'admin/article/index'; ?>" class="btn btn-secondary">back</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php $this->load->view('admin/footer');?>

 