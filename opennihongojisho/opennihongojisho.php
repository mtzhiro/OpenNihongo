<?php
// License: GNU General Public License v2 or later
// License URI: http://www.gnu.org/licenses/gpl-2.0.html
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
                <link rel="SHORTCUT ICON" href="/img//ncclogomasan.png" />
                <link rel="apple-touch-icon" href="/img//ncclogomasan.png" />
<title>open nihongo jisho (form)</title>
<!-- ビューポートの設定 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
 <body onLoad="document.getElementById('kikiinf').focus()">
 <h1> OpenNihongoジショ</h1>
URL:<a href="https://home.nihongochat.com/opennihongojisho">https://home.nihongochat.com/opennihongojisho</a><br />
<br />
　　<a href="https://github.com/mtzhiro/OpenNihongo/opennihongojisho">https://github.com/mtzhiro/OpenNihongo/opennihongojisho</a><br />

<div style="width: 100vw;">
<div style="float: left; width: 80vw; ">
<form method="get" action="/opennihongojisho/opennihongojisho.php" name="rcksf2">
  01.見出(よみ)　<input type="text" name="ondmidashi" id="iondmidashi" value="" /><br />
  02.品詞　<input type="text" name="ondhinshi" id="iondhinshi" value="" /><br />
  03.発音記号　<input type="text" name="ondhatsuon" id="iondhatsuon" value="" /><br />
  04.訳語(漢字)　<input type="text" name="ondyakugo" id="iondyakugo" value="" /><br />
  05.用例　<input type="text" name="ondyourei" id="iondyourei" value="" /><br />
  06.暗記マーク　<input type="text" name="ondanki" id="iondanki" value="" /><br />
  07.単語レベル　<input type="text" name="ondlevel" id="iondlevel" value="" /><br />
  08.修正マーク　<input type="text" name="ondsmark" id="iondsmark" value="" /><br />
  09.ファイルリンク　<input type="text" name="ondfilelink" id="iondfilelink" value="" /><br />
  10.OLEデータ　<input type="text" name="ondole" id="iondole" value="" /><br />
  <input type="submit" name="kikisub" id="kikisubf" value="add" />
</form>
</div>
<div style="float: left; width: 20vw; ">
 <a href="/opennihongojisho/opennihongojisho.php">reload</a>
 <a href="/opennihongojisho/datarcks.txt">data</a>
</div>
</div>
<div style="clear: both; "></div>

<?php
   $cwd = getcwd();
   $dpaa = array();
   $dpaa = explode('/', $cwd);
   $dir = $dpaa[count($dpaa)-1];
//   $file = 'file' . $dir . '.txt';
   $file = 'datarcks.txt';
?>
<?php
   $strl = '';
   if (isset($_REQUEST['ondmidashi']) ) {
     $fpa = fopen($file, 'a');
     fwrite($fpa, $_REQUEST['ondmidashi'] . ',');
     fwrite($fpa, $_REQUEST['ondhinshi'] . ',');
     fwrite($fpa, $_REQUEST['ondhatsuon'] . ',');
     fwrite($fpa, $_REQUEST['ondyakugo'] . ',');
     fwrite($fpa, $_REQUEST['ondyourei'] . ',');
     fwrite($fpa, $_REQUEST['ondanki'] . ',');
     fwrite($fpa, $_REQUEST['ondlevel'] . ',');
     fwrite($fpa, $_REQUEST['ondsmark'] . ',');
     fwrite($fpa, $_REQUEST['ondfilelink'] . ',');
     fwrite($fpa, $_REQUEST['ondole'] . ',');
     fwrite($fpa, "\n");
     fclose($fpa);

   }
   if (isset($_REQUEST['tshortname']) ) {
/*     $fpa2 = fopen($file, 'a');
     fwrite($fpa2, $_REQUEST['tshortname'] . ',' . $_REQUEST['turl'] . "\n");
     fclose($fpa2);
*/
   }
   if (isset($_REQUEST['kikiedendsub']) && $_REQUEST['kikiedendsub'] == 'endedit') {

     $fpw = fopen($file, 'w');
     fwrite($fpw, $_REQUEST['ondmidashitf']);
     fclose($fp2);

   }
   if (isset($_REQUEST['kikiedsub']) ) {

     $fped = fopen($file, 'r');
     while( ! feof( $fped ) ){
       $l = fgets( $fped, 9182);
       $l = str_replace(array("\r\n", "\r", "\n", ), '', $l);
       if ($l != '') {
	         $strl .= $l . "\n";
       }
     }
     print('' . "\n");
     print('<form method="post" action="/opennihongojisho/opennihongojisho.php" >' . "\n");
     print('  <textarea name="ondmidashitf" id="iondmidashitf" rows="10" cols="40">');
     print($strl);
     print('</textarea><br />' . "\n");
     print('  <input type="submit" name="kikiedendsub" id="kikiedendsubf" value="endedit" />' . "\n");
     print('</form>' . "\n");
     print("\n");
     fclose($fped);

   } else {

     $fp1 = fopen($file, 'r');
     while( ! feof( $fp1 ) ){
       $l = fgets( $fp1, 9182);
       if ($l != '') {
       $l = str_replace(array("\r","\n","\r\n"), '', $l);
//       $ta = explode(',', $l);
//       $tal = $tal . "<a href=\"http://brasiljapan.com/swk/";
//       $tal = $tal . $ta[0];
//       $tal = $tal . "\">";
//       $tal = $tal . 'http://brasiljapan.com/swk/' . $ta[0];
//       $tal = $tal . "</a>,";
//       $tal = $tal . "<a href=\"";
//       $tal = $tal . $ta[1];
//       $tal = $tal .  "\">";
//       $tal = $tal .  $ta[1];
       $tal = $tal . $l . "\n";
       }
     }
     fclose($fp1);

   }
?>
<div>
<textarea rows="8" cols="80" >
<?php 
echo $tal; 
?>
</textarea>
<div>



</div>

<div style="width: 100vw;">
<div style="float: left; width: 20vw; ">
<?php
  if (!isset($_REQUEST['kikiedsub']) ) {
     print('<div>' . "\n");
     print('<form method="post" action="/opennihongojisho/opennihongojisho.php" >' . "\n");
     print('  <input type="submit" name="kikiedsub" id="kikiedsubf" value="edit" />' . "\n");
     print('<form>' . "\n");
     print('</div>' . "\n");
  }
?>
</div>
</div>

<br />
<br />
<br />
<br />
<br />
</body>
</html>
