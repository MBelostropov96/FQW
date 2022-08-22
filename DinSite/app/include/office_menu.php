<?php
$mesCheck = selectAll('message', ['status' => 0, 'id_user_rec' => $_SESSION['id_users']] );
$serCheck = selectAll('service', ['status' => 0]);
$serConCheck = selectAll('service_contract', ['status_contract' => 0]);
$prodCheck = selectAll('app_product', ['status' => 0]);
$prodConCheck0 = selectAll('product_contract', ['status_contract' => 0]);
$prodConCheck1 = selectAll('product_contract', ['status_contract' => 1]);
$prodConCheck2 = selectAll('product_contract', ['status_contract' => 2]);
$prodConCheck3 = selectAll('product_contract', ['status_contract' => 3]);

$noticeSer = count($serCheck);
$noticeMes = count($mesCheck);
$noticeSerCon = count($serConCheck);
$noticeProd = count($prodCheck);
$noticeProdCon = count($prodConCheck0) + count($prodConCheck1) + count($prodConCheck2) + count($prodConCheck3);

?>
<div class="col-3 col-body-admin">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Услуги
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . 'admin/office.php'?>"><li>Заявки&nbsp;
                                <?php if ($noticeSer > 0): ?>
                                    <span class="badge bg-secondary"><?=$noticeSer?></span>
                                <?php endif; ?></li></a>
                        <a href="<?php echo BASE_URL . 'admin/office_service_contract.php'?>"><li>Договоры&nbsp;
                                <?php if ($noticeSerCon > 0): ?>
                                    <span class="badge bg-secondary"><?=$noticeSerCon?></span>
                                <?php endif; ?></li></a>
                        <a href="<?php echo BASE_URL . 'admin/service_management.php'?>"><li>Управление разделом</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Продукция
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . 'admin/office_product.php'?>"><li>Заявки&nbsp;
                                <?php if ($noticeProd > 0): ?>
                                    <span class="badge bg-secondary"><?=$noticeProd?></span>
                                <?php endif; ?></li></a>
                        <a href="<?php echo BASE_URL . 'admin/office_product_contract.php'?>"><li>Договоры&nbsp;
                                <?php if ($noticeProdCon > 0): ?>
                                    <span class="badge bg-secondary"><?=$noticeProdCon?></span>
                                <?php endif; ?></li></a>
                        <a href="<?php echo BASE_URL . 'admin/products_management.php'?>"><li>Управление разделом</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Мессенджер
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul>
                        <a href="<?php echo BASE_URL . 'admin/office_message_new.php'?>"><li>Новое сообщение</li></a>
                        <a href="<?php echo BASE_URL . 'admin/office_message.php'?>"><li>Входящие&nbsp;
                                <?php if ($noticeMes > 0): ?>
                                    <span class="badge bg-secondary"><?=$noticeMes?></span>
                                <?php endif; ?></li></a>
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
