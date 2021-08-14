<!DOCTYPE html>
<html>
<head>
	<title>CYS Insert Update Delete Data using Codeigniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>
	<div class="container-fluid" style="width: 100%; text-align: center;">
		<h1>Welcome CYS Admin Dashboard</h1>
		<label><a href="'.base_url().'cyshome/logout">CYS Admin Session Logout</a></label>
	</div>

	<div class="container-fluid" style="width: 74%; text-align: left;">
		<div class="row">

			<h1 align="center">CYS Insert Update Delete Data using Codeigniter</h1><br />
			<form method="post" action="<?php echo base_url()?>cysapanel/form_validation">
			<?php
			if($this->uri->segment(2) == "inserted")
			{    
				echo '<p class="text-success">Data Inserted</p>';
			}
			if($this->uri->segment(2) == "updated")
			{    
				echo '<p class="text-success">Data Updated</p>';
			}
			?>


          	<?php  
           	if(isset($user_data))  
           	{  
                foreach($user_data->result() as $row)  
            {  
           	?> 

        	<div class="form-group">  
            	<label>Enter Item Name</label>  
            	<input type="text" name="itemname" value="<?php echo $row->itemname; ?>" class="form-control" />  
            	<span class="text-danger"><?php echo form_error("itemname"); ?></span>  
           	</div>  
           	<div class="form-group">  
                <label>Enter Price</label>  
                <input type="text" name="price" value="<?php echo $row->price; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("price"); ?></span>  
           	</div> 

           	<div class="form-group">  
                <label>Select Product Image</label>

                <?php echo '<img src="'.base_url().'images/'.$row->image.'" class="img-thumnail" width="50" height="50"/>'; ?>
                
                <input type="file" name="product_image" id="product_image"> 
                <input type="hidden" name="product_old_image" id="product_old_image" value="<?php echo $row->image; ?>">    

           	</div>   
           	<div class="form-group">  
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
                <input type="submit" name="update" value="Update" class="btn btn-info" />  
           	</div>       
          	<?php       
            }  
           	}  
           	else  
           	{  
           	?> 

			<div class="form-group">
				<label>Enter Item Name</label>
				<input type="text" name="itemname" class="form-control" />
				<span class="text-danger"><?php echo form_error("itemname"); ?></span>
			</div>
			<div class="form-group">
				<label>Enter Price</label>
				<input type="text" name="price" class="form-control" />
				<span class="text-danger"><?php echo form_error("price"); ?></span>
			</div>
			<div class="form-group">
				<label>Upload Product Image</label>
				<input type="file" name="product_image" id="product_image">
				<span id="product_uploaded_image"></span>
			</div>
			<div class="form-group">
				<input type="submit" name="insert" value="Insert" class="btn btn-warning" />
			</div>

			<?php
			}
			?>

			</form>

		</div>
	</div>
</table>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-2 col-sm-12">
			<h1>Slidebar</h1>
			<div class="w3-sidebar w3-light-grey w3-bar-block" style="margin-right:25%">
  			<h3 class="w3-bar-item">Menu</h3>
  			<a href="#" class="w3-bar-item w3-button">Home</a>
  			<a href="#" class="w3-bar-item w3-button">Items</a>
  			<a href="#" class="w3-bar-item w3-button">User</a>
		</div>

		</div>

		<div class="col-md-10 col-sm-12">
			<h3>Fetch Data from Table using Codeigniter</h3><br />
			<div class="table-responsive">
			<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>Item Name</th>
				<th>Price</th>
				<th>Image</th>
				<th>Delete</th>
				<th>Update</th>
			</tr>
<?php
	if($fetch_data->num_rows() > 0)
		{    
			foreach($fetch_data->result() as $row)
			{
?>

		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->itemname; ?></td>
			<td><?php echo $row->price; ?></td>
			<td><?php echo '<img src="'.base_url().'images/'.$row->image.'" class="img-thumnail" width="50" height="50"/>'; ?>
			</td>
			<td><a href="#" class="delete_data" id="<?php echo $row->id; ?>" >Delete</a></td>
			<td><a href="<?php echo base_url(); ?>cysapanel/update_data/<?php echo $row->id; ?>">Edit</a></td>
		</tr><?php
			}
		}
	else
{
?> 
	<tr>
		<td colspan="5">No Data Found</td>
	</tr><?php
}
?>
			
		</div>
		
	</div>
	
</div>

<script>
	$(document).ready(function(){
	$('.delete_data').click(function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this item?"))
		{
			window.location="<?php echo base_url(); ?>cysapanel/delete_data/"+id;
		}
		else
		{    
			return false;
		}
});
});

</script>


</body>
</html>