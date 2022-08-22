<?php
$mesCheck = selectAll('message', ['status' => 0, 'id_user_rec' => $_SESSION['id_users']] );
$mesFeedback = selectAll('message', ['id_user_rec' => 0, 'status' => 0]);
$mNew = count($mesCheck);
$mFeedback = count($mesFeedback);
?>
<div class="col-3 col-body-admin">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Управление разделами
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . "admin/admin_news_list.php"?>"><li>Новости</li></a>
                        <a href="<?php echo BASE_URL?>"><li>Вакансии</li></a>
                        <a href="<?php echo BASE_URL . 'admin/admin_contacts_list.php'?>"><li>Контакты</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Пользователи
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . 'admin/admin_users_list.php'?>"><li>Список пользователей</li></a>
                        <a href="<?php echo BASE_URL . 'admin/admin_empl_list.php'?>"><li>Список сотрудников</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Сообщения
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . 'admin/admin_message_new.php'?>"><li>Новое сообщение</li></a>
                        <a href="<?php echo BASE_URL . 'admin/admin_message.php'?>"><li>Входящие&nbsp;
                                <?php if ($mNew > 0): ?>
                                    <span class="badge bg-secondary"><?=$mNew?></span>
                                <?php endif; ?>
                            </li></a>
                        <a href="<?php echo BASE_URL . 'admin/admin_message_feedback.php'?>"><li>Обратная связь&nbsp;
                                <?php if ($mFeedback > 0): ?>
                                    <span class="badge bg-secondary"><?=$mFeedback?></span>
                                <?php endif; ?>
                            </li></a>
                        <a href="<?php echo BASE_URL . '#'?>"><li>Отправленные</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    FAQ
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                </div>
            </div>
        </div>
    </div>
</div>
