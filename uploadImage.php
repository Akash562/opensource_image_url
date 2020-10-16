<?php 
  
// Set the current working directory 
$directory = getcwd()."/images/"; 
   
// Returns array of files 
$files1 = scandir($directory); 
// Count number of files and store them to variable 
$num_files = count($files1) - 2; 
   
 ?>

<html>
<head>
	<title>Upload Images</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="uploadimages.css">
<style type="text/css">
	
	a
	{
		text-decoration: none;
		font-size: 14px;
		color: #fff;

	}
	a:hover
	{
		color: yellow;
		font-size: 16px;
		padding: 5px;
	}
	
</style>

</head>
<body>

<div class="wrapper">
  <header>
    <center>
    	<h1>Stock Photo Url</h1>
    </center>
  </header>
  
  <div class="row">
  
  <div class="sections col-lg-6">
    <form  id="myform" action="" enctype="multipart/form-data"  method="post">
    <section class="active">
      <input type="text" placeholder="Title" name="title" id="title" required="req" />
      
      <div class="images">
        
      	<input type="file" name="file" id="file" required="req">
        <div class="pic">
           <img src="" id="img" width="50" height="50" alt="preview">
        </div>
      </div>
    </section>
    <span id="seturl" style="color:#fff;">URL : <span style="color:yellow;"></span></span>
  <footer>
      <input class="btn btn-success btn-lg btn-block send" type="button" name="button" id="submit" value="SUBMIT" />
  </footer> 
  </form>
  </div>
    <div class="sections col-lg-6" style="border:2px solid white;height:390px;overflow: scroll;">

	<center><h5 style="color:orange">Total files: <?php echo $num_files; ?></h5></center>
    
    <?php
	//scanning files in a given diretory in unsorted order 
	$myfiles = scandir($directory, SCANDIR_SORT_NONE); 
  
    ?>


<?php foreach($myfiles as $file) : ?>
<tr>
    <!-- other tds here -->
    <td><?php

    if ($file=='.' || $file=='..' ) { }
     else {

     echo "<a href=http://my images url/images/".$file." target='_blank'>http://my image url/images/".$file."</a><br>";
     }?></td>
    <!-- other tds here -->
</tr>
<?php endforeach; ?> 

  </div>

 </div>

</div>

<div class="notification"></div>
<footer>
  &copy;copyright 2020 Design By Akash
</footer>

<script type="text/javascript">
	
	$(document).ready(function(){

    $("#submit").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: 'processimage.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".pic").show(); 	// Display image element
                    var result ="https://url.com/"+response;
                    document.getElementById('seturl').getElementsByTagName('span')[0].innerHTML = result;
                    alert("url Generate Successfully");
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });
});

</script>


</body>
</html>
