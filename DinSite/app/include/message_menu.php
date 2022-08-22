<?php
$mesCheck = selectAll('message', ['status' => 0, 'id_user_rec' => $_SESSION['id_users']] );
$newMesForUser = count($mesCheck);
?>
<div class="col-3 left-message">
    <ul>
        <li><a href="<?php echo BASE_URL . 'message_new.php'?>">Написать сообщение</a></li>
        <li><a href="<?php echo BASE_URL . 'message.php' ?>">Входящие&nbsp;
                <?php if ($newMesForUser > 0): ?>
                    <span class="badge bg-secondary"><?=$newMesForUser?></span>
                <?php endif; ?></a></li></a></li>
        <li><a href="<?php echo BASE_URL ?>">Отправленные</a></li>
        <li><a href="<?php echo BASE_URL ?>">Уведомления</a></li>
        <li><a href="<?php echo BASE_URL ?>">Черновики</a></li>
    </ul>
</div>
