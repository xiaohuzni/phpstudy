<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
$ok=false;
if (empty($_GET['ym'])||!isset($_GET['ym'])) {
		$ok=true;
		$msg='参数请求错误！<a href="index.php">返回首页</a>';
}
else
{
	$folder_array=array();
	$dir='contents';
	$folder=$_GET['ym'];
	if (!is_dir($dir.'/'.$folder)) {
		$ok=true;
		$msg='参数请求错误！<a href="index.php">返回首页</a>';
	}
	else
	{
		$dh=opendir($dir);
		if ($dh) {
			$filename=readdir($dh);
			while ($filename) {
				if ($filename!='.'&&$filename!='..') {
					$file_name=$filename;
					array_push($folder_array, $file_name);
				}
				
				$filename=readdir($dh);
			}

		}
	}
	rsort($folder_array);

	$post_data=array();
	$dh=opendir($dir.'/'.$folder);

	while (($filename=readdir($dh))!==false) 
	{
		if (is_file($dir.'/'.$folder.'/'.$filename)) 
		{
			
		
		  $file=$filename;
		  $file_name=$dir.'/'.$folder.'/'.$file;

		  if (file_exists($file_name)) {
		  	$fb=@fopen($file_name, 'r');
		  	if ($fb) {
		  		flock($fb, LOCK_SH);
		  		$result=fread($fb, filesize($file_name));
		  		
		  	}
		  	flock($fb, LOCK_UN);
		  	fclose($fb);
		  }
		  $temp_data=array();
		  $cotent_array=explode('|', $result);
		  $temp_data['SUBJECT']=$cotent_array[0];
		  $temp_data['DATE']=date('Y-m-d H:i:s',$cotent_array[1]);
		  $temp_data['CONTENT']=$cotent_array[2];
		  array_push($post_data, $temp_data);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<Link rel="stylesheet" type="text/css"  href="style.css" charset="utf-8">
	<title>BLOG</title>
</head>
<body>
	<div id="container">
      	<div id="header">
      	BLOG名称
      	</div>
      	<div id="title">
      	------I have a dream---------
      	</div>
        <div id="left">
        <?php if ($ok==false) 
        {
        	
         ?>
          <?php foreach ($post_data as $key=>$value) 
         	 { ?>
      		<div id="blog_entry">
      			<div id="blog_title"><?php echo $value['SUBJECT'];?></div>
      		 	<div id="blog_body">
      				<div id="blog_date"><?php echo $value['DATE'];?></div>
      				<?php echo $value['CONTENT']; ?>
      		 	</div>
      		</div>
      	<?php } 
      	}
      	else
      	echo $msg;
      	?>
      	

      	</div>
      	<div id="right">
      		<div id="sidebar">
      			<div id="menu_title">关于我</div>
      			<div id="menu_body">我是个php爱好者
      			</div>
      		</div>
      		<div id="sidebar">
      			<div id="menu_title">日志归档</div>
      			<?php
      				foreach ($folder_array as $ym) {
      					$entry=$ym;
      					$ym=substr($ym, 0,4).'-'.substr($ym, 4,2);
      					echo '<div id="menu_body"><a href="archives.php?ym='.$entry.'">'.$ym.'</a></div>';
      				}
      			?>
      		</div>
      	</div>
      	<div id="footer">
      	CopyRight 2017
      	</div>
	</div>
</body>
</html>
<?php closedir($dh) ?>