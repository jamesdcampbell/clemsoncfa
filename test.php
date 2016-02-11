<?php
	
	include 'template/template.php';

	$sideBar = 	'<h3>
					Pharetra sodales egestas
				</h3>
				<p>
					Enim amet sociis ullamcorper lorem ligula. Viverra odio massa sapien et augue lacus pretium. 
					Sociis magna faucibus dictum curabitur auctor et molestie proin sed aliquam.
				</p>
				<h3>
					Venenatis elementum porttitor
				</h3>
				<ul class="linkedList">
					<li class="first">
						<a href="#">Varius nulla fusce suscipit</a>
					</li>
					<li>
						<a href="#">Rutrum orci amet et lorem</a>
					</li>
					<li>
						<a href="#">Convallis sodales malesuada</a>
					</li>
					<li>
						<a href="#">Faucibus imperdiet adipiscing</a>
					</li>
					<li>
						<a href="#">Diam porta at sed tortor</a>
					</li>
					<li>
						<a href="#">Rutrum orci amet et lorem</a>
					</li>
					<li>
						<a href="#">Convallis sodales malesuada</a>
					</li>
					<li>
						<a href="#">Faucibus imperdiet adipiscing</a>
					</li>
					<li class="last">
						<a href="#">Dictum in amet phasellus</a>
					</li>
				</ul>';

		$mainContent = '<div id="box1">
						<h2>
							Team Member Information
						</h2>
						<div id="grid">								
							<script>
				                $(document).ready(function () {
				                    
				                });
					 		</script>
						</div>
						</div>
						';

	displayPage($sideBar,$mainContent);
?>