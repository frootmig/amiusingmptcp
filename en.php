<?php
	// MPTCP detection functions
	require_once "inc/mptcp.inc.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Am I using MPTCP (Multipath TCP)?  Find out if your operating system is capable of using MPTCP!" />
		<meta name="keywords" content="mptcp, tcp, multipath" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<title>Am I using MPTCP?</title>
		</style>
	</head>
	<body>
<span class="small">Diese Seite <a href="index.php">auf Deutsch</a></span>
		<h1>Am I using <a href="http://multipath-tcp.org" title="Multipath TCP">MPTCP</a>?</h1>
		<?php
		// Detect active MPTCP connection on page load
		if (is_mptcp())
		{
			echo "<h2 class=\"big green\">YES!</h2>\n";
			echo "<p>You're all set to use MPTCP on this device!  See <a href=\"http://multipath-tcp.org\">multipath-tcp.org</a> for more information!</p>\n";
		}

		echo "<p class=\"big red\">NO!</p>\n";
		echo "\t\t<h2>Can I use MPTCP?</h2>\n";
		echo "\t\t";

		// Detect operating system
		switch (get_platform())
		{
			case OS_WINDOWS:
				echo "<p><span class=\"bold red\">NO</span>, sorry, but MPTCP is currently unavailable on Windows!  Check again at another time!</p>\n";
				break;
			case OS_MAC:
				echo "<p><span class=\"bold green\">YES</span>, via a <a href=\"https://github.com/multipath-tcp/mptcp-virtual\">MPTCP-capable virtual machine</a>!</p>\n";
				break;
			case OS_LINUX:
				echo "<p><span class=\"bold green\">YES</span>, via <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.DoItYourself\">compiling a MPTCP-capable kernel</a>, or via the <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.AptRepository\">MPTCP apt-repository</a>!</p>\n";
				break;
			case OS_BSD:
				echo "<p><span class=\"bold green\">YES</span>, via a <a href=\"http://caia.swin.edu.au/urp/newtcp/mptcp/tools.html\">FreeBSD kernel patch</a>!</p>\n";
				break;
			case OS_ANDROID:
				echo "<p><span class=\"bold orange\">MAYBE</span>, via a patch for <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.Android\">select Android devices</a>!</p>\n";
				break;
			case OS_IPHONE:
				echo "<p><span class=\"bold green\">YES</span>, by upgrading to iOS 7!  See <a href=\"http://perso.uclouvain.be/olivier.bonaventure/blog/html/2013/09/18/mptcp.html\">this article</a> for more information!</p>\n";
				break;
			default:
				echo "<p><span class=\"bold orange\">MAYBE</span>, you are using an unknown platform, so check <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.HowToInstallMPTCP\">How to Install MPTCP</a> for further information!</p>\n";
				break;
		}
		?>
		<br />
		<hr />
		<span class="small"><a href="http://www.voja.org/" title="Volker Janzen">Volker Janzen</a>, 2014 | <a href="https://github.com/frootmig/amiusingmptcp" title="Am I using MPTCP? on GitHub">GitHub</a></span>
		<br />
		<br />
		<span class="small">Imprint: Volker Janzen, Lappersdorfer Str. 41, 93059 Regensburg. eMail: <a href="mailto:webmaster@voja.de">webmaster (at) voja.de</a></small>
	</body>
</html>
