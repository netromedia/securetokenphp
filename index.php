<html><head> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<!-- A minimal Flowplayer setup to get you started --> 
 
	<!-- 
		include flowplayer JavaScript file that does  
		Flash embedding and provides the Flowplayer API.
	--> 
	<script type="text/javascript" src="flowplayer-3.2.6.min.js"></script> 
	
	<!-- some minimal styling, can be removed --> 
	<link rel="stylesheet" type="text/css" href="style.css"> 
	
	<!-- page title --> 
	<title>Flowplayer Secure</title> 
	<?php
	$secret_code = 'qjkhwgd102943781SEwkjhgcd@$%#^';
	$streampath = 'mpegts.stream'; //This is where you enter the stream name; i.e. rtmp://SERVER/APP/STREAM
	$timestamp = time();
	$signature = md5($streampath . $timestamp . $secret_code);
	?>
	
</head><body> 
 
	<div id="page"> 
		
		<!-- Basic Flowplayer config to show use with NetroMedia TokenAuth. --> 
		<div id="player" style="display:block;width:580px;height:400px;"></div>
		<script> 
			$f("player", "flowplayer.commercial-3.2.7.swf", {
				key : "<redacted>",
				clip: {
					// configure clip to use netromedia as our provider, it uses our rtmp plugin
					provider: 'netromedia',
					url: escape('<?php echo $streampath . '?t=' . $timestamp . '&s=' . $signature; ?>'),
					autoPlay: false
				},

				// streaming plugins are configured under the plugins node
				plugins: {

					// here is our rtpm plugin configuration
					netromedia: {
						url: 'flowplayer.rtmp-3.2.3.swf',

						// netConnectionUrl defines where the streams are found
						netConnectionUrl: 'rtmp://xxx.obj.netromedia.net/channel'
					}
				}
			});
		</script> 
	</div> 
	
	
</body></html>