<?php
        // Email obsfucatior or however you spell it

        $_email = $_POST["email"];
	$_subject = $_POST["subject"];

        $return="";
        if ( isset($_email) ) {
                $return[0] = getEmail($_email);
                $return[1] = getOrdString($_email);
        }

	if ( isset($_subject) && isset($_email) ) {
                $return[0] = getEmailWithSubject($_email, $_subject);
                $return[1] = getCodeEmailWithSubject($_email, $_subject);
	}

        function getEmail($name) {
                $email = getOrdString('mailto:'.$name);
                $label = getOrdString($name);
                return "<a href='{$email}'>{$label}</a>";
        }

        function getEmailWithSubject($name, $subject) {
                $email = getOrdString('mailto:'.$name . '?subject=' . $subject);
                $label = getOrdString($name);
                return "<a href='{$email}'>{$label}</a>";
        }
        function getCodeEmailWithSubject($name, $subject) {
                $email = getOrdString('mailto:'.$name . '?subject=' . $subject);
                $label = getOrdString($name);
                return "&#60;a href='{$email}'&#62;{$label}&#60;/a&#62;";
        }

        function getOrdString($string) {
                for($i=0;$i<strlen($string);$i++) {
                        $bit = $string[$i];
                        $output .= '&#'.ord($bit).';';
                }
                return $output;
        }
?>

<html>
<head></head>
<body>

<form action="email.php" method="post">
<table>        
<tr>
	<td><p>Email Address:</p></td>
	<td><input type="text" name="email" value=""></td>
</tr>
<tr>
	<td><p>Subject (optional):</p></td>
	<td><input type="text" name="subject" value=""></td>
</tr>
<tr>
	<td>&nbsp;</td>
        <td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</form>
<p><?php   echo $return[0]; ?></p>

<blockquote>
<?php   echo $return[1]; ?>
</blockquote>
<p>View the source to get the obsfucated address...</p>
</body>
</html>

