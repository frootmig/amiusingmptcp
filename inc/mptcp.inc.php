<?php
	// mptcp.inc.php - Matt Layher - helper functions for MPTCP detection
	// MPTCP detection functions courtesy of Christoph Paasch, of http://multipath-tcp.org/

	// Pad a string with zeros
	function zeropad($num, $lim)
	{
		return (strlen($num) >= $lim) ? $num : zeropad('0' . $num, $lim);
	}

	// Convert characters to hex
	function char2hex($c)
	{
		return zeropad(dechex(ord($c)), 2);
	}

	// Detect a MPTCP connection using /proc/net/mptcp
	function is_mptcp()
	{
		// Convert IP to packed in_addr form
		$ip = inet_pton($_SERVER['REMOTE_ADDR']);

		// Convert port to hex
		$port_hex = strtoupper(dechex($_SERVER['REMOTE_PORT']));

		// Split IP into array
		$ip_hex = '';
		$ip_array = str_split($ip);

		// IPv4 conversion to hex
		if (count($ip_array) === 4)
		{
			// Iterate all characters, convert to hex
			foreach ($ip_array as $c)
			{
				$ip_hex = sprintf("%s%s", char2hex($c), $ip_hex);
			}
		}
		// IPv6 conversion to hex
		else
		{
			// Iterate all characters, convert to hex
			for ($i = 1; $i <= 4; $i++)
			{
				for ($j = (4 * $i) - 1; $j >= ($i - 1) * 4; $j--)
				{
					$ip_hex = sprintf("%s%s", $ip_hex, char2hex($ip_array[$j]));
				}
			}
		}
		
		// Convert to uppercase
		$ip_hex = strtoupper($ip_hex);

		// Return if you're connected via MPTCP!
		return strpos(shell_exec("cat /proc/net/mptcp"), $ip_hex . ':' . $port_hex) ? true : false;
	}

	// OS 'enumerations'
	define("OS_WINDOWS", 0);
	define("OS_MAC", 1);
	define("OS_LINUX", 2);
	define("OS_BSD", 3);
	define("OS_ANDROID", 4);
	define("OS_IPHONE", 5);
	define("OS_UNKNOWN", 99);

	// Detect user's platform from user agent
	function get_platform()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];

		// Windows
		if (strpos($agent, "Windows") || strpos($agent, "Win"))
		{
			return OS_WINDOWS;
		}
		// Mac OS X
		else if (strpos($agent, "Mac") || strpos($agent, "OS X"))
		{
			return OS_MAC;
		}
		// Android (must be checked before Linux)
		else if (strpos($agent, "Android"))
		{
			return OS_ANDROID;
		}
		// Linux
		else if (strpos($agent, "Linux"))
		{
			return OS_LINUX;
		}
		// BSD
		else if (strpos($agent, "BSD"))
		{
			return OS_BSD;
		}
		// iPhone
		else if (strpos($agent, "iPhone"))
		{
			return OS_IPHONE;
		}

		// Any other, unknown platform
		return OS_UNKNOWN;
	}
