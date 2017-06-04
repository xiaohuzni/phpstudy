<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
$login=false;
session_start();
if ((!empty($_SESSION['user']))&&($_SESSION['user']=='admin')) 
	$login=true;
   
   $file_array=array();//日时间文件名
   $folder_array=array();//年月文件夹名

   $dir="contents";
   $dh=opendir($dir);

   if ($dh) {
   	 $filename=readdir($dh);
   	 while ($filename) {
   	 	if ($filename!='.'&& $filename!='..') {//去掉..和.
   	 		$folder_name=$filename;
   	 		array_push($folder_array, $filename);
   	 	}
   	 	$filename=readdir($dh);
   	 }
   }
   rsort($folder_array);//目录排序

   $post_data=array();
   foreach ($folder_array as $folder) {
   		$dh=opendir($dir.'/'.$folder);
   		//$filename=readdir($dh);
   		while (($filename=@readdir($dh))!==false) {
   			if (is_file($dir.'/'.$folder.'/'.$filename)) {
   					$file=$filename;
   					$file_name=$dir.'/'.$folder.'/'.$file;
   					if (file_exists($file_name) ) {
   						$fb=@fopen($file_name, 'r');
   						if ($fb) {
   							flock($fb, LOCK_SH);
   							$result=fread($fb, filesize($file_name));
   						}
   						flock($fb,LOCK_UN);
   						fclose($fb);
   					}
   					$temp_data=array();
   					$content_array=explode('|', $result);

   					$temp_data['SUBJECT']=$content_array[0];//文档标题
   					$temp_data['DATE']=date('Y-m-d H:i:s',$content_array[1]);//时间
   					$temp_data['CONTENT']=$content_array[2];//内容
 					$file=substr($file, 0,9);//日志文件名
 					$temp_data['FILENAME']=$folder.'-'.$file;
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
      	<div id="addt">
      		<?php
      			if ($login) {
      				echo '<a href="add.php">发布文章</a>';
      			}
      		?>
      		
      	</div>
      	
      	<div id="title">
      	------I have a dream---------
      	</div>
        <div id="left">
          <?php foreach ($post_data as $key=>$value) { ?>
      		<div id="blog_entry">
      			<div id="blog_title"><?php echo $value['SUBJECT'];?></div>
      		 	<div id="blog_body">
      				<div id="blog_date"><?php echo $value['DATE'];?></div>
      				<?php echo $value['CONTENT']; ?>
      		 	</div>
      		 	<div>
      		 		<?php
      		 			if ($login) {
      		 				echo '<a href="edit.php?entry='.$value['FILENAME'].'">编辑</a> &nbsp
      		 				<a href="delete.php?entry='.$value['FILENAME'].'">删除</a>';
      		 			}

      		 		?>
      		 	</div>
      		</div>
      	<?php } ?>
      	</div>
      	<div id="right">
      		<div id="sidebar">
      			<div id="menu_title">关于我</div>
      			<div id="menu_body">我是个php爱好者
      			<br><br>
      			<?php if ($login) {
      					echo '<a href="logout.php">退出</a>';
      			} 		else{
      					echo '<a href="login.php">登陆</a>';
      			}

      			?>
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