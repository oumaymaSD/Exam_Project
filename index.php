<html>
<head>
<meta charset="utf-8" />
            <title>take notes </title>
			
<style type="text/css"></style>
        
		<style>
		
		* {
		    padding:0;
			margin: 0;
			box-sizing: border-box;
		}
		
		 #header{
			   background-color: #333;
			   color: white;
			   height : 100px;
			   text-align: center;
			   line-height: 100px;
			   font-size: 3em;
			}
			
		 body{
			     font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
			}
			
		 #footer{
			position: fixed;
			bottom: 0;
			background-color: #333;
			color: white;
			height : 100px;
			text-align: center;
			line-height: 100px;
			font-size: 3em;
			width:100%;

		}
		
		
		td 
		{
			border: 1px solid black;
		}
		table
		{
			border-collapse: collapse;
			
		}

		</style>

</head>

<body>
       <header id="header">Take your notes</header>
	   
       <section>

<form id="form1" name="form1" method="post" action="code.php">
  <table width="420" border="0">
				   
					  <tr>
					  <td width="169" bgcolor="#CCFF00"><label>
						<input name="rechercher" type="submit" id="rechercher" value="Search" />
					  </label></td>
					  <td width="369" bgcolor="#CCFF00"><label>
						<input name="t_rechercher" type="text" id="t_rechercher" />
						<span class="Style4">    Search by Title    </span> </label></td>
					</tr> 
							 
    <tr>
      <td>  Title  </td>
      <td><label>
        <input name="t_title" type="text" id="t_title" />
      </label></td>
    </tr>
    <tr>
      <td>  Content  </td>
      <td><label>
        <input name="t_content" type="text" id="t_content" />
      </label></td>
    </tr>
                        
    <tr>
      <td colspan="2"><label>
						
        <input type= "button" name="ajouter" type="submit" id="ajouter" style="color: blue;" value="Add" />
        <input type= "button" name="modidier" type="submit" id="modidier" style="color: green;" value="Edit" />
        <input type= "button" name="supprimer" type="submit" id="supprimer" style="color: red;" value="Delete" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>
<? $cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);  
$req="select * from  t_user";
mysql_query($req);
$res=mysql_query($req,$cn);  
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152"> Title </td>
<td width="66"> Content </td>

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

<?
$var=0; 
 }
 }
?>
</table>
       </section>
	   
	   
	   <footer id="footer"> welcome </footer>
	   
</body>
</html>