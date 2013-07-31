<?php require_once('Connections/connq.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE mariaSummer SET bingoHead=%s, bingoBody=%s, bingoLink=%s, bingoLinkText=%s, bingoTermsLink=%s, bingoTermsText=%s, casinoHead=%s, casinoBody=%s, casinoLink=%s, casinoLinkText=%s, casinoTermsLink=%s, casinoTermsText=%s WHERE id=%s",
                       GetSQLValueString($_POST['bingoHead'], "text"),
                       GetSQLValueString($_POST['bingoBody'], "text"),
                       GetSQLValueString($_POST['bingoLink'], "text"),
                       GetSQLValueString($_POST['bingoLinkText'], "text"),
                       GetSQLValueString($_POST['bingoTermsLink'], "text"),
                       GetSQLValueString($_POST['bingoTermsText'], "text"),
                       GetSQLValueString($_POST['casinoHead'], "text"),
                       GetSQLValueString($_POST['casinoBody'], "text"),
                       GetSQLValueString($_POST['casinoLink'], "text"),
                       GetSQLValueString($_POST['casinoLinkText'], "text"),
                       GetSQLValueString($_POST['casinoTermsLink'], "text"),
                       GetSQLValueString($_POST['casinoTermsText'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connq, $connq);
  $Result1 = mysql_query($updateSQL, $connq) or die(mysql_error());
}

$colname_rs1 = "1";
if (isset($_GET['week'])) {
  $colname_rs1 = $_GET['week'];
}
$colname2_rs1 = "no";
if (isset($_GET['thelang'])) {
  $colname2_rs1 = $_GET['thelang'];
}
mysql_select_db($database_connq, $connq);
$query_rs1 = sprintf("SELECT * FROM mariaSummer WHERE week = %s AND lang = %s", GetSQLValueString($colname_rs1, "int"),GetSQLValueString($colname2_rs1, "text"));
//echo ($query_rs1);
$rs1 = mysql_query($query_rs1, $connq) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Maria Summer Campaign</title>

<script>

function jumplink()
{
	window.location.href = "?thelang=" + document.getElementById('thelang').value + "&week=" + document.getElementById('week').value
}

</script>

<style>

input, textarea {
	padding: 5px;
	min-width: 520px;
}

.cke_skin_kama {
	width: 510px;
}
	

.button {
	text-align:center;
	min-width:50px;
}

textarea {
	min-height: 150px;
}

html, body, input, td {
	font-family:Arial, Helvetica, sans-serif;
	font-size: 11px;
	text-align:left;
}

</style>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body>
<h2>Maria Summer Campaign - editing week <em><?php echo htmlentities($row_rs1['week'], ENT_COMPAT, 'UTF-8'); ?></em> for language <em><?php echo htmlentities($row_rs1['lang'], ENT_COMPAT, 'UTF-8'); ?></em></h2>
<form id="form2" name="form2" method="post" action="">
  Lang:
  <select name="thelang" id="thelang">
    <option value="at" <?php if (!(strcmp("at", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>at</option>
    <option value="be-fr-be" <?php if (!(strcmp("be-fr-be", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>be-fr-be</option>
    <option value="be-fr-com" <?php if (!(strcmp("be-fr-com", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>be-fr-com</option>
    <option value="be-nl-be" <?php if (!(strcmp("be-nl-be", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>be-nl-be</option>
    <option value="be-nl-com" <?php if (!(strcmp("be-nl-com", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>be-nl-com</option>
    <option value="bg" <?php if (!(strcmp("bg", $_GET['lang']))) {echo "selected=\"selected\"";} ?>>bg</option>
    <option value="ch-de" <?php if (!(strcmp("ch-de", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>ch-de</option>
    <option value="cz" <?php if (!(strcmp("cz", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>cz</option>
    <option value="de" <?php if (!(strcmp("de", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>de</option>
    <option value="dk" <?php if (!(strcmp("dk", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>dk</option>
    <option value="ee" <?php if (!(strcmp("ee", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>ee</option>
    <option value="en" <?php if (!(strcmp("en", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>en</option>
    <option value="es" <?php if (!(strcmp("es", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>es</option>
    <option value="en-uk" <?php if (!(strcmp("en-uk", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>en-uk</option>
    <option value="fi" <?php if (!(strcmp("fi", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>fi</option>
    <option value="gr" <?php if (!(strcmp("gr", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>gr</option>
    <option value="hu" <?php if (!(strcmp("hu", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>hu</option>
    <option value="it" <?php if (!(strcmp("it", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>it</option>
    <option value="lt" <?php if (!(strcmp("lt", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>lt</option>
    <option value="lv" <?php if (!(strcmp("lv", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>lv</option>
<option value="nl" <?php if (!(strcmp("nl", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>nl</option>
    <option value="no" <?php if (!(strcmp("no", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>no</option>
    <option value="pl" <?php if (!(strcmp("pl", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>pl</option>
    <option value="pt" <?php if (!(strcmp("pt", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>pt</option>
<option value="ro" <?php if (!(strcmp("ro", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>ro</option>
    <option value="ru" <?php if (!(strcmp("ru", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>ru</option>
    <option value="se" <?php if (!(strcmp("se", $_GET['thelang']))) {echo "selected=\"selected\"";} ?>>se</option>
  </select>
Week:
<select name="week" id="week" onchange="javascript:jumplink();">
  <option value="1" <?php if (!(strcmp(1, $_GET['week']))) {echo "selected=\"selected\"";} ?>>1</option>
  <option value="2" <?php if (!(strcmp(2, $_GET['week']))) {echo "selected=\"selected\"";} ?>>2</option>
  <option value="3" <?php if (!(strcmp(3, $_GET['week']))) {echo "selected=\"selected\"";} ?>>3</option>
  <option value="4" <?php if (!(strcmp(4, $_GET['week']))) {echo "selected=\"selected\"";} ?>>4</option>
  <option value="5" <?php if (!(strcmp(5, $_GET['week']))) {echo "selected=\"selected\"";} ?>>5</option>
  <option value="6" <?php if (!(strcmp(6, $_GET['week']))) {echo "selected=\"selected\"";} ?>>6</option>
  <option value="7" <?php if (!(strcmp(7, $_GET['week']))) {echo "selected=\"selected\"";} ?>>7</option>
  <option value="8" <?php if (!(strcmp(8, $_GET['week']))) {echo "selected=\"selected\"";} ?>>8</option>
  <option value="9" <?php if (!(strcmp(9, $_GET['week']))) {echo "selected=\"selected\"";} ?>>9</option>
  <!--<option value="10" <?php if (!(strcmp(10, $_GET['day']))) {echo "selected=\"selected\"";} ?>>10</option>
  <option value="11" <?php if (!(strcmp(11, $_GET['day']))) {echo "selected=\"selected\"";} ?>>11</option>
  <option value="12" <?php if (!(strcmp(12, $_GET['day']))) {echo "selected=\"selected\"";} ?>>12</option>
  <option value="13" <?php if (!(strcmp(13, $_GET['day']))) {echo "selected=\"selected\"";} ?>>13</option>
  <option value="14" <?php if (!(strcmp(14, $_GET['day']))) {echo "selected=\"selected\"";} ?>>14</option>
  <option value="15" <?php if (!(strcmp(15, $_GET['day']))) {echo "selected=\"selected\"";} ?>>15</option>
  <option value="16" <?php if (!(strcmp(16, $_GET['day']))) {echo "selected=\"selected\"";} ?>>16</option>
  <option value="17" <?php if (!(strcmp(17, $_GET['day']))) {echo "selected=\"selected\"";} ?>>17</option>
  <option value="18" <?php if (!(strcmp(18, $_GET['day']))) {echo "selected=\"selected\"";} ?>>18</option>
  <option value="19" <?php if (!(strcmp(19, $_GET['day']))) {echo "selected=\"selected\"";} ?>>19</option>
  <option value="20" <?php if (!(strcmp(20, $_GET['day']))) {echo "selected=\"selected\"";} ?>>20</option>
  <option value="21" <?php if (!(strcmp(21, $_GET['day']))) {echo "selected=\"selected\"";} ?>>21</option>
  <option value="22" <?php if (!(strcmp(22, $_GET['day']))) {echo "selected=\"selected\"";} ?>>22</option>
  <option value="23" <?php if (!(strcmp(23, $_GET['day']))) {echo "selected=\"selected\"";} ?>>23</option>
  <option value="24" <?php if (!(strcmp(24, $_GET['day']))) {echo "selected=\"selected\"";} ?>>24</option>-->
</select>
<input type="button" name="button" id="button" value="Go!" class="button" onClick="javascript:jumplink();" />
</form>
<p>&nbsp;</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="75%" align="left" cellpadding="5">
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Head:</strong></td>
      <td><input type="text" name="bingoHead" value="<?php echo htmlentities($row_rs1['bingoHead'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Body:</strong></td>
      <td><textarea name="bingoBody"><?php echo htmlentities($row_rs1['bingoBody'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      
      <script type="text/javascript">
		
		CKEDITOR.replace( 'bingoBody',
		{
	    toolbar : 'MyToolbar',
	    entities : 'false',
	    
	});;
	</script>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Link:</strong></td>
      <td><input type="text" name="bingoLink" value="<?php echo htmlentities($row_rs1['bingoLink'], ENT_COMPAT, 'UTF-8'); ?>" size="32">
      <p>The <strong>full</strong> link the user should end up on when the click the button including http:// or https://</p></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Link Text:</strong></td>
      <td><input type="text" name="bingoLinkText" value="<?php echo htmlentities($row_rs1['bingoLinkText'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Terms Link:</strong></td>
      <td><input type="text" name="bingoTermsLink" value="<?php echo htmlentities($row_rs1['bingoTermsLink'], ENT_COMPAT, 'UTF-8'); ?>" size="32">
      <p>Text for the expand/collapse link to view terms and conditions</p>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Bingo Terms Text:</strong></td>
      <td><textarea name="bingoTermsText" value="" size="32"><?php echo htmlentities($row_rs1['bingoTermsText'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      
      <script type="text/javascript">
		
		CKEDITOR.replace( 'bingoTermsText',
		{
	    toolbar : 'MyToolbar',
	    entities : 'false',
	    
	});;
	</script>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Head:</strong></td>
      <td><input type="text" name="casinoHead" value="<?php echo htmlentities($row_rs1['casinoHead'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Body:</strong></td>
      <td><textarea name="casinoBody"><?php echo htmlentities($row_rs1['casinoBody'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      
      <script type="text/javascript">
		
		CKEDITOR.replace( 'casinoBody',
		{
	    toolbar : 'MyToolbar',
	    entities : 'false',
	    
	});;
	</script>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Link:</strong></td>
      <td><input type="text" name="casinoLink" value="<?php echo htmlentities($row_rs1['casinoLink'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Link Text:</strong></td>
      <td><input type="text" name="casinoLinkText" value="<?php echo htmlentities($row_rs1['casinoLinkText'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Terms Link:</strong></td>
      <td><input type="text" name="casinoTermsLink" value="<?php echo htmlentities($row_rs1['casinoTermsLink'], ENT_COMPAT, 'UTF-8'); ?>" size="32">
      <p>Text for the expand/collapse link to view terms and conditions</p>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td width="125" align="right" valign="top" nowrap><strong>Casino Terms Text:</strong></td>
      <td><textarea name="casinoTermsText"><?php echo htmlentities($row_rs1['casinoTermsText'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      
      <script type="text/javascript">
		
		CKEDITOR.replace( 'casinoTermsText',
		{
	    toolbar : 'MyToolbar',
	    entities : 'false',
	    
	});;
	</script>
      
      </td>
    </tr>

    <tr valign="baseline">
      <td width="125" align="right" nowrap>&nbsp;</td>
      <td><input type="submit" value="Update Text" class="button"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_rs1['id']; ?>">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs1);
?>
