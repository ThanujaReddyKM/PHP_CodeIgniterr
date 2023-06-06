<?php $this->load->view('admin/header');?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home'?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/category/index'?>">Categories</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
    								Edit Category "<?php echo $category['name']?>"
								 </div>
						  </div>
							<form name="categoryForm" id="categoryForm" method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/category/edit/'.$category['id'];  ?>">

						<div class="card-body">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" id="name" value="<?php echo set_value('name',$category['name']);?>" class="form-control <?php echo(form_error('name') != "") ? 'is-invalid' : ''?>" >
									<?php echo form_error('name')?>
								</div>

								<div class="form-group">
									<label>Image</label><br>
										<input type="file" name="image" id="image"  class="form-control <?php echo(!empty($errorImageUpload) != "") ? 'is-invalid' : ''?>">			
										<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
										<br>

										<?php if($category['image'] != "" && file_exists('./public/uploads/category/thumb/'.$category['image'])) { ?>
								<img class="mt-3" width="200px" src="<?php echo base_url().'public/uploads/category/'.$category['image'] ?>">
										<?php } else {?>
											<img width="200px" src="<?php echo base_url().'public/uploads/category/no-image.png'; ?> ">
										<?php } ?>
								</div>

								<div class="custom-control custom-radio float-left">
								<input type="radio" class="custom-control-input" id="statusActive" value ="1" name="status" <?php echo ($category['status'] == 1) ? 'checked' : ''; ?> >
									<label for="statusActive" class="custom-control-label">Active</label>
								</div>	

								<div class="custom-control custom-radio float-left">
									<input type="radio" class="custom-control-input" id="statusBlock" value ="0" name="status" <?php echo ($category['status'] == 0) ? 'checked' : ''; ?> >
									<label for="statusBlock" class="custom-control-label">Block</label>
								</div>							
							
						</div>
						<div class="card-footer">
							<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							<a href="<?php echo base_url().'admin/category/index'; ?>" class="btn btn-secondary">back</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer');?>

 