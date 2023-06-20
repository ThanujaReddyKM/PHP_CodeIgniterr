<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter Web Application.</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">

  </head>
  <body>
  	  	<header class="bg-light">
  	  <div class="container">
  	    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-3 pb-3">
  	      <a class="navbar-brand" href="<?php echo base_url('public/admin/home')?>">CodeIgniter Web Application</a>
  	      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	        <span class="navbar-toggler-icon"></span>
  	      </button>
  	      <!--    <div class="collapse navbar-collapse right-align" id="navbarSupportedContent"><ul class="navbar-nav ml-auto"> -->
  	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	        <ul class="navbar-nav">
  	          <li class="nav-item active">
  	            <a class="nav-link" href="<?php echo base_url();?>">Home</a>
  	          </li>
  	          <li class="nav-item">
  	            <a class="nav-link" href="<?php echo base_url('page/about') ?>">About Us</a>
  	          </li>
  	          <li class="nav-item">
  	            <a class="nav-link" href="<?php echo base_url('page/services') ?>">Services</a>
  	          </li>
  	          <li class="nav-item">
  	            <a class="nav-link" href="<?php echo base_url('blog/index') ?>">Blog</a>
  	          </li>
  	          <li class="nav-item">
  	            <a class="nav-link" href="<?php echo base_url('blog/categories') ?>">Categories</a>
  	          </li>
  	          <li class="nav-item">
  	            <a class="nav-link" href="<?php echo base_url('page/contact') ?>">Contact Us</a>
  	          </li>
  	        </ul>
  	      </div>
  	    </nav>
  	  </div>
  	</header>