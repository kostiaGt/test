<form action="" method="post">

<table border="0" align="center" style="margin-top: 20%; width: 500px; " >
 
   
    <tr>
        <td  height="50">
            <strong>Новый пароль</strong>
        </td>
        <td align="right">
            <i><?php echo $message;?></i>
        </td>
    </tr>
    
     <tr>
       <td colspan="2" height="45" >
           <p><i>* - Для пароля используйте большие и маленькие буквы.</i></p>
           <p><i>** - Пароль должен содержать не меньше 8 символов.</i></p>
       </td>
   </tr>
    
    <tr>
        <td>Пароль:</td><td align="right"><input type="password" size="30" name="password"></td>        
   </tr>
   <tr>
       <td>Повторите пароль:</td><td align="right"><input type="password" size="30" name="password_confirm"></td>
   </tr> 
   <tr>
       <td colspan="2" height="45" align="right" >
           
           <hr>
       </td>
   </tr>
   
    <tr>
        <td><a href="/?c_=user&a_=profile">Моя страница</a></td><td align="right"><input type="submit" value="Сохранить"></td>
   </tr> 
</table>
    
</form>


