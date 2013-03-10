<!DOCTYPE html>
<html>
<head>
	<title>How are ya?</title>
	<script src="global/js/jquery-1.9.1.js"></script>
	<script src="global/js/bootstrap.js"></script>
	<link href="global/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="global/css/bootstrap-responsive.css" rel="stylesheet" media="screen" />
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
     	<div class="navbar-inner">
        	<div class="container">
          		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a class="brand" href="mood">MoodFlip</a>
          		<div class="nav-collapse collapse">
            		<ul class="nav">
              			<li class="active"><a href="mood">Home</a></li>
            			<li><a href="about">About</a></li>
              			<li><a href="#contact">Contact</a></li>
          		</div><!--/.nav-collapse -->
        	</div>
      	</div>
    </div>
    <div class="container">
      <style>
        .hero-unit {
          color: white;
          background: url(global/img/cover1.png);
        }
        .hero-unit span {
          color:black;
        }
      </style>

      <div class="hero-unit">
        <h1>Mood<span>Flip</span></h1>
        <p>
			<form method="post" action="mood">
				<?php if( is_array($data['emotions']) ): ?>
					My current mood is 
					<select name="currentMood" style="width:120px; margin-left:5px; margin-right:5px;">
						<?php foreach($data['emotions'] as $k1=>$v1): ?>
							<option value="<?php echo $k1; ?>"><?php echo $v1['value']; ?></option>
						<?php endforeach; ?>
					</select>
					and I'd like to change it into
					<select name="futureMood" style="width:120px; margin-left:5px; margin-right:5px;">
						<?php foreach($data['emotions'] as $k1=>$v1): ?>
							<option value="<?php echo $k1; ?>"><?php echo $v1['value']; ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
				<?php if( is_array($data['times']) ): ?>
					in
					<select name="minutes" style="width:50px; margin-left:5px; margin-right:5px;">
						<?php foreach($data['times'] as $k1=>$v1): ?>
							<option value="<?php echo $v1; ?>"><?php echo $v1; ?></option>
						<?php endforeach; ?>
					</select>
					minutes.
				<?php endif; ?>
				<div>
					<button type="submit" class="btn-primary btn-large right">Change mood</button>
				</div>
			</form>
		</p>
      </div>

      <hr>
      <footer>
        <p>&copy; MoodChanger 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="global/js/bootstrap-transition.js"></script>
    <script src="global/js/bootstrap-alert.js"></script>
    <script src="global/js/bootstrap-modal.js"></script>
    <script src="global/js/bootstrap-dropdown.js"></script>
    <script src="global/js/bootstrap-scrollspy.js"></script>
    <script src="global/js/bootstrap-tab.js"></script>
    <script src="global/js/bootstrap-tooltip.js"></script>
    <script src="global/js/bootstrap-popover.js"></script>
    <script src="global/js/bootstrap-button.js"></script>
    <script src="global/js/bootstrap-collapse.js"></script>
    <script src="global/js/bootstrap-carousel.js"></script>
    <script src="global/js/bootstrap-typeahead.js"></script>

  </body>
</html>