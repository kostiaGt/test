<form action="" method="post">

<table border="0" align="center" style="margin-top: 20%; width: 500px; " >
 
    <tr>
        <td  height="50">
            <strong>Авторизация</strong>
        </td>
        <td align="right">
            <i><?php echo $errorMessage;?></i>
        </td>
    </tr>
    <tr>
        <td >Имя:</td><td align="right"><input type="text" name="name" size="30" value="<?php echo $name;?>"></td>        
   </tr>
   <tr>
       <td>Пароль:</td><td align="right"><input type="password" size="30" name="password"></td>
   </tr> 
   <tr>
       <td colspan="2" height="45" align="right" >
           
           <hr>
       </td>
   </tr>
   
    <tr>
        <td></td><td align="right"><input type="submit" value="Вход"></td>
   </tr> 
</table>
    
</form>