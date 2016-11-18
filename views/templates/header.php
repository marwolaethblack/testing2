<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo $title ?></title>
    <meta name="description" content="start to learn new hobby">
    <meta name="author" content="japege">

    <link rel="stylesheet" href="<?php echo base_url('assets/styles/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/main.css');?>" />

	<?php $admin_scripts = ['jquery-3.1.1.min','tablesorter','sortingTable'] ?>
<?php if($this->uri->uri_string() == 'admin') 
		  foreach ($admin_scripts as $script)
		  {
			  echo "<script src='".base_url('assets/scripts/admin/'.$script.'.js')."'></script>";
		  }?>

	<script>
    	$(document).ready(function () {
    		$("#books").tablesorter();
    	}
);
	</script>
</head>
<body>
	<div id="wrapper">
    <header class="col-xs-12">
        <p id="logo">JaPeGe</p>
    </header>
