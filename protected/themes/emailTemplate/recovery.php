<?php
/**
 * author: Mikhail Matveev
 * Date: 19.01.15
 */
echo 'Уважаемый(ая) ' . $username . ', Вы запросили восстановление пароля в системе "'.$site_name.'".<br/>';
echo 'Для ввода нового пароля перейдите по ссылке: ';
echo CHtml::link($url, $url, array('target' => '_blank'))."<br/>";
?>

<br/><br/>
С уважением,<br/>
администрация <?php echo $site_name; ?><br/>

Письмо было сгенерировано автоматически, не отвечайте на него.<br/>
Если Вы не делали запрос на восстановление пароля, то проигнорируйте это письмо.