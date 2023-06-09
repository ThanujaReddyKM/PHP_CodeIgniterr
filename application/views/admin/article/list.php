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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    		<div class="content">
    			<div class="container-fluid">
    				<div class="row">
    					<div class="col-lg-12">    						
    						<?php if($this->session->flashdata('success') != "") { ?>
    						<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    							<?php } ?>

    							<?php if($this->session->flashdata('error') != "") { ?>
    						<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
    							<?php } ?>
    						<div class="card">
    							<div class="card-header">
    							<div class="card-title">
    								<form id="searchFrm" name="searchFrm" method="get" accept="">
						            <div class="input-group mb-0">
						              <input class="form-control" type="text" placeholder="Search" value="<?php echo $q; ?>" name="q">
						              <div class="input-group-append">
						                <button class="input-group-text" id="basic-addon1 ">
						                  <i class="fas fa-search"></i>
						                </button> 
						              </div>
						            </div>
						          </form>
												      </div>
						      <div class="card-tools">
						      	<a href="<?php echo base_url().'admin/article/create/' ?>" class="btn btn-primary"><i class="fas fa-plus"></i>Create</a>
						      </div>
						  </div>
						<div class="card-body">
						<table class="table">
							<tr>
								<th width="50">#</th>
								<th width="100">Image</th>
								<th>Title</th>
								<th width="120">Author</th>
								<th width="100"> Created</th>
								<th width="50">Status</th>
								<th width="160" class="text-center">Action</th>
							</tr>			
							<?php if(!empty($articles)) {
								foreach($articles as  $article){
							 ?>
							 <tr>
							 	<td><?php echo $article['id'] ?></td>
							 	<td>
							 		<?php 
							 		$path = './public/uploads/articles/thumb_admin/'.$article['image'];

							 		if($article['image'] != "" && file_exists($path)) {
							 			?> 
							 			<img class="w-100" src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$article['image']) ?>" alt="" >
							 			<?php }
							 			else
							 			{
							 				?>
							 			<img class="w-100" src="<?php echo base_url('public/uploads/articles/thumb_admin/no-image.png'); ?>" alt="" >
							 			<?php
							 			}
							 			?>
							 	</td>
							 	<td><?php echo $article['title'] ?></td>
							 	<td><?php echo $article['author'] ?> </td>
							 		<td><?php echo date('Y-m-d',strtotime($article['created_at'])) ?></td>
							 	<td>
							 		<?php if($article['status']==1) { ?>
							 			<p class="badge badge-success">Active</p>
							 		<?php } else { ?>
							 			<p class="badge badge-danger">Block</p>
							 		<?php } ?>

							 	</td>
							 
							 	<td class="text-center">
							 		<a href="<?php echo base_url().'admin/article/edit/'.$article['id']; ?>" class="btn btn-sm btn-primary">
							 			<i class="far fa-edit"></i>
							 		</a>
							 		<a href="" class="btn btn-sm btn-danger">
							 			<i class="far fa-trash-alt"></i>
							 		</a>
							 	</td>

							 </tr>


							<?php } 
										} else {
							?>
							<tr>
								<td colspan="7">Records not found</td>
							</tr>
							<?php }

							 ?>	        
				</table>
				<div>
					<?php echo $pagination_links ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
			     </div></div></div></div>

</div>

<?php $this->load->view('admin/footer');?>

<script type="text/javascript">
	function deleteCategory(id){
		//alert(id);
		if(confirm("Are you sure you want to delete category"))
		{
			window.location.href = '<?php echo base_url().'admin/category/delete/'; ?>'+id;
		}
	}
</script>

 