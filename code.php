<?
$rech=$_POST['t_rechercher'];
$nom=$_POST['t_title'];
$prenom=$_POST['t_content'];

$cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);
 if (isset($_POST['rechercher']))
{
$req="select * from  t_user where t_title='$rech'";
 
mysql_query($req);
$res=mysql_query($req,$cn);
$enrg=mysql_fetch_row($res);
 
 if ($enrg[0] == $rech)
{
 
   echo "<form id='form1' name='form1' method='post' action='code.php'>
    <table width='420' border='0'>
   <tr>
     <td width='169' bgcolor='#CCFF00'><label>
    <input name='rechercher' type='submit' id='rechercher' value='Search' />
     </label></td>
     <td width='369' bgcolor='#CCFF00'><label>
    <input name='t_rechercher' type='text' id='t_rechercher' value='$enrg[0]' />
     </label>    Search by Title    </td>
   </tr>
   <tr>
     <td>  Title  </td>
     <td><label>
    <input name='t_title' type='text' id='t_title'  value='$enrg[0]'/>
     </label></td>
   </tr>
   <tr>
     <td>  Content  </td>
     <td><label>
    <input name='t_content' type='text' id='t_content' value='$enrg[1]' />
     </label></td>
   </tr>
   
     <td colspan='2'><label>
    
		<input type= 'button' name='ajouter' type='submit' id='ajouter' style='color: blue;' value='Add' />
		<input type= 'button' name='modidier' type='submit' id='modidier' style='color: green;' value='Edit' />
		<input type= 'button' name='supprimer' type='submit' id='supprimer' style='color: red;' value='Delete' />
	
     </label></td>
   </tr>
    </table>
    <p> </p>
  </form>";
}
  else
   {
  echo '<body onLoad="alert('Note doesn t exist...')">';
  echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  }
} 
 
 else
  {
  
                 
      
         if (isset($_POST['ajouter']))
                              
           if($t_title=='')
          {
         echo '<body onLoad="alert('Title is required')">';
                               echo '<meta http-equiv="refresh" content="0;URL=index.php">';
           
          }
          elseif ($t_content=='')
          {
          echo '<body onLoad="alert('Content is required')">';
                               echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
         
         else
         {
          $rqt="insert t_user values('$t_title','$t_content')";
           
          mysql_query($rqt);
           
            echo '<body onLoad="alert('You have been successfully added the note')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          mysql_close();
               }
       if (isset($_POST['modifier']))
        
                                    if($t_title=='' || $t_content==''  )
          {
          
          echo '<body onLoad="alert(' search before modifying oor check the required fields ...')">';
                                   echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
          else
          {
           $rqt="update t_user set t_title='$t_title', t_content='$t_content'";
        mysql_query($rqt);
          echo '<body onLoad="alert('Modification successfully completed')">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        mysql_close();
         }
       elseif(isset($_POST['supprimer']))       
         {
         
         $rqt="delete  FROM t_user  where t_title ='$rech'";
         
        mysql_query($rqt);
         echo '<body onLoad="alert('Deletion completed')">';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        mysql_close();
         }
      
  
  }

?>
<? $cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);  
$req="select * from  t_user";
mysql_query($req);
$res=mysql_query($req,$cn);  
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Title</td>
<td width="66">Content</td>

</tr>
<?
$var=0;
while($row=mysql_fetch_array($res))
{
 
if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
</tr>
<?
$var=1; 
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
</tr>
<?
$var=0; 
 }
 }
?>
</table>