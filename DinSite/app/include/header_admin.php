<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div onclick="location.href='<?php echo BASE_URL?>';" class="col-2 col2">
                <div class="adm-text">
                    <h4>
                    <i class="fa-regular fa-circle-left"></i></i>&nbsp;Сайт
                    </h4>
                </div>
            </div>
            <div class="col-3 block-adm">
                <?php if (!empty($_SESSION['id_users'])): ?>
                <?php
                $mesCheck = selectAll('message', ['status' => 0, 'id_user_rec' => $_SESSION['id_users']] );
                if ($_SESSION['admin'] == 2) {
                    $serCheck = selectAll('service', ['status' => 0]);
                    $serConCheck = selectAll('service_contract', ['status_contract' => 0]);
                    $prodCheck = selectAll('app_product', ['status' => 0]);
                    $prodConCheck0 = selectAll('product_contract', ['status_contract' => 0]);
                    $prodConCheck1 = selectAll('product_contract', ['status_contract' => 1]);
                    $prodConCheck2 = selectAll('product_contract', ['status_contract' => 2]);
                    $prodConCheck3 = selectAll('product_contract', ['status_contract' => 3]);
                    $newMesForUser = count($mesCheck) + count($serCheck) + count($serConCheck) + count($prodConCheck0) + count($prodConCheck1) + count($prodConCheck2) + count($prodConCheck3) + count($prodCheck);
                }
                else {
                    $mesFeedback = selectAll('message', ['id_user_rec' => 0, 'status' => 0]);
                    $newMesForUser = count($mesCheck) + count($mesFeedback);
                }
                ?>
                <div class="adm-text">
                    <?php if ($_SESSION['admin'] == 1): ?>
                    <h4><?= 'Администрирование' ?></h4>
                    <?php elseif ($_SESSION['admin'] == 2): ?>
                    <h4><?= 'Управление' ?></h4>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-7">
                <div class="user col-7">
                        <div class="exit"><i class="fa-regular fa-user">&nbsp;</i><?php echo $_SESSION['first_name']; ?>
                            <?php if ($newMesForUser > 0): ?>
                            <span class="badge bg-secondary"><?=$newMesForUser?></span>
                            <?php endif; ?>
                            <ul class="ul_exit">
                                <?php if ($_SESSION['admin'] == 1): ?>
                                    <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/admin.php'?>">Админ панель</a></li>
                                    <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/admin_message.php'?>">Уведомления&nbsp;
                                            <?php if ($newMesForUser > 0): ?>
                                                <span class="badge bg-secondary"><?=$newMesForUser?></span>
                                            <?php endif; ?></a></li>
                                <?php elseif ($_SESSION['admin'] == 2): ?>
                                    <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/office.php'?>">Управление</a></li>
                                    <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/office_message.php'?>">Уведомления&nbsp;
                                            <?php if ($newMesForUser > 0): ?>
                                                <span class="badge bg-secondary"><?=$newMesForUser?></span>
                                            <?php endif; ?></a></li>
                                <?php endif; ?>
                                <li class="li_exit"><a href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <button onclick="window.location.href = '<?php echo BASE_URL . 'log.php'?>'" type="button" class="btn btn-outline-secondary">Войти</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
