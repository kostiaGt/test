<?php if (isset($_SESSION['authFalseTime'])): ?>

<table border="1" align="center" style="margin-top: 20%; width: 500px; " >
    <tr>
        <td height="45" align="center">
            <h3>Попробуйте еще раз через <?php echo 300 - ( time() - $_SESSION['authFalseTime']); ?> сек.</h3>
        </td>
    </tr>
</table>
<?php endif; ?>
