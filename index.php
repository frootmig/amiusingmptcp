<?php
	// MPTCP detection functions
	require_once "inc/mptcp.inc.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Benutze ich MPTCP (Multipath TCP)? Finden Sie heraus ob Ihr Betriebssystem MPTCP unterstütz!" />
		<meta name="keywords" content="mptcp, tcp, multipath" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<title>Benutze ich MPTCP?</title>
		</style>
	</head>
	<body>
<span class="small">This page <a href="en.php">in English</a></span>
		<h1>Benutze ich <a href="http://multipath-tcp.org" title="Multipath TCP">MPTCP</a>?</h1>
		<?php
		// Detect active MPTCP connection on page load
		if (is_mptcp())
		{
			echo "<h2 class=\"big green\">JA!</h2>\n";
			echo "<p>Dieses Ger&auml;t verwendet MPTCP! <a href=\"http://multipath-tcp.org\">multipath-tcp.org</a> enth&auml;lt weitere Informationen.</p>\n";
		}

		echo "<p class=\"big red\">NEIN!</p>\n";
		echo "\t\t<h2>Kann ich MPTCP verwenden?</h2>\n";
		echo "\t\t";

		// Detect operating system
		switch (get_platform())
		{
			case OS_WINDOWS:
				echo "<p><span class=\"bold red\">NEIN</span>, leider ist MPTCP unter Windows nicht verf&uuml;gbar. Bitte pr&uuml;fen Sie die Verf&uuml;gbarkeit zu einem sp&auml;teren Zeitpunkt erneut.</p>\n";
				break;
			case OS_MAC:
				echo "<p><span class=\"bold green\">JA</span>, mit einer <a href=\"https://github.com/multipath-tcp/mptcp-virtual\">MPTCP-f&auml;higen virtuellen Maschine</a>.</p>\n";
				break;
			case OS_LINUX:
				echo "<p><span class=\"bold green\">JA</span>, wenn Sie einen <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.DoItYourself\">MPTCP-f&auml;higen Kernel compilieren</a>, oder einen &uuml;ber das <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.AptRepository\">MPTCP apt-repository</a> installieren.</p>\n";
				break;
			case OS_BSD:
				echo "<p><span class=\"bold green\">JA</span>, &uuml;ber einen <a href=\"http://caia.swin.edu.au/urp/newtcp/mptcp/tools.html\">FreeBSD Kernel Patch</a>.</p>\n";
				break;
			case OS_ANDROID:
				echo "<p><span class=\"bold orange\">VIELLEICHT</span>, &uuml;ber einen Patch f&uuml;r ihr <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.Android\">Android Ger&auml;t</a>.</p>\n";
				break;
			case OS_IPHONE:
				echo "<p><span class=\"bold green\">JA</span>, durch ein Upgrade auf iOS 7. Bitte lesen Sie <a href=\"http://perso.uclouvain.be/olivier.bonaventure/blog/html/2013/09/18/mptcp.html\">diesen Artikel</a> f&uuml;r weitere Informationen.</p>\n";
				break;
			default:
				echo "<p><span class=\"bold orange\">VIELLLEICHT</span>, bitte pr&uuml;fen Sie den Artikel <a href=\"http://multipath-tcp.org/pmwiki.php?n=Users.HowToInstallMPTCP\">How to Install MPTCP</a> um herauszufinden ob ihre Plattform unterst&uuml;tzt wird.</p>\n";
				break;
		}
		?>
		<br />
		<hr />
		<span class="small"><a href="http://www.voja.de/" title="Volker Janzen">Volker Janzen</a>, 2014 | <a href="https://github.com/frootmig/amiusingmptcp" title="Verwende ich MPTCP? auf GitHub">GitHub</a></span>
		<br />
		<br />
		<span class="small">Impressum: Volker Janzen, Lappersdorfer Str. 41, 93059 Regensburg. eMail: <a href="mailto:webmaster@voja.de">webmaster (at) voja.de</a></small>
	</body>
</html>
