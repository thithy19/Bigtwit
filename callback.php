<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

	<body>

	<div id="conteneur">
		<div id="entête" style="opacity: 1; display: inline";>
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">BIGTWIT</div>
					<div class="pull-right">
						<?php
						session_start();
						require('twitteroauth.php');
						$connection = new TwitterOAuth('4JPhVqb8l96ViuOlQaDKQK85h', 'E7chGojc5ZwNfAEHeI5BQDtk5xCKHL7N7GAl4QBM6Anfa6mIYR', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
						$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

						$_SESSION['def_oauth_token'] = $access_token['oauth_token'];
						$_SESSION['def_oauth_token_secret'] = $access_token['oauth_token_secret'];
						$_SESSION['screen_name'] = $access_token['screen_name'];

						print 'Compte: '.$access_token['screen_name'].',désormais connecté à l\'application';
						?>

						<a href="index.php" class="btn btn-primary" role="button">Se déconnecter</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
			
			
			<div class="row">
				<div class="col-md-8">
					<div class="pull-right">
						<span>
							<div class="panel panel-default">							
							<div class="panel-heading">Ecrire un bigtweet</div>		
							<?php
							print '<form action="post.php" method="post">
									 <textarea name="tweet" cols=53 rows=8></textarea><br/>
									 <input type="submit" value="Poster mon Bigtweet sur Twitter"/>
								   </form>';
						   ?>
							</div>
							</span>
					</div>
				</div>
			</div>
           

		  <div class="row">
				<div class="col-md-8">
					<div class="pull-right">
						<span>
							<div class="panel panel-default">
								<div class="panel-heading">Mes bigtweets</div>
								<?php	
								$statuses = $connection->get('statuses/user_timeline');
								print '<ul>';
								foreach($statuses as $status){
								print '<li>'.$status->text.' - '.$status->created_at.'</li>';
								}
								print '</ul>';
								print '<br/><a href="index.php">Retourner à la page d\'accueil</a>';
								?>
							</div>
						</span>
					</div>
				</div>
			</div>

<style>
body {
	font-size: 2em; background-color;
	font-family: 'Cabin', Helvetica, Arial, sans-serif;
	font-weight: 500;
	color: #7f7f7f;
	height: 100%;
	margin-right: auto;
	margin-left: auto;
	margin-top: auto;
	margin-bottom: auto;
	width: 900px;
	min-height: 100%;
}
.panel { /*float: rigth;*/
	width: 400px;
	font-size: 80%;
	position: relative;
	top: -10px;
	border-radius: 8px;
	padding-bottom: 5px;
}
.panel panel-info {
	border-radius: 8px;
	padding-bottom: 5px;
	margin-left: 200px;
	margin-right: 200px;
}
.pull-left {
	position: relative;
	float: left;
}
.panel panel-primary {
	position: relative;
	float: right;
}
img {
	width: 80px;
	height: 80px;
}
</style>

	</body>
</html>
