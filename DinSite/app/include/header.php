<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="logo col-3">
                <a href="<?php echo BASE_URL ?>"><img src="assets/images/blc.png" class="d-block w-100" alt="logo_bcl"></a>
                <h1>АО "БАЛАКОВО-ЦЕНТРОЛИТ"</h1>
            </div>
            <div class="container-tabs col-9">
                <div class="contact row">
                    <div class="con1 col-3">
                        <span><i class="fas fa-phone"></i> &nbsp; +7 (8453) 36-00-77</span>
                    </div>
                    <div class="con2 col-2">
                        <span><i class="fas fa-envelope"></i> &nbsp; balcl@mail.ru</span>
                    </div>
                    <div class="con3 col-5">
                        <span><i class="fa-solid fa-house"></i> &nbsp;г. Балаково, ул. Саратовское шоссе 10</span>
                    </div>
                    <div class="user col-2">
                        <?php if (isset($_SESSION['id_users'])): ?>
                            <?php
                            $mesCheck = selectAll('message', ['status' => 0, 'id_user_rec' => $_SESSION['id_users']] );
                            $newMesForUser = count($mesCheck);
                            ?>
                            <div class="exit"><i class="fa-regular fa-user">&nbsp;</i><?php echo $_SESSION['first_name']; ?>
                                <?php if ($newMesForUser > 0): ?>
                                    <span class="badge bg-secondary"><?=$newMesForUser?></span>
                                <?php endif; ?>
                                <ul class="ul_exit">
                                    <?php if ($_SESSION['admin'] == 1): ?>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/admin.php'?>">Админ панель</a></li>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/admin_message.php'?>">Уведомления</a></li>
                                    <?php elseif ($_SESSION['admin'] == 2):
                                        ?>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/office.php'?>">Управление</a></li>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'admin/office_message.php'?>">Уведомления&nbsp;
                                                <?php if ($newMesForUser > 0): ?>
                                                    <span class="badge bg-secondary"><?=$newMesForUser?></span>
                                                <?php endif; ?></a></li>
                                    <?php elseif ($_SESSION['admin'] == 0): ?>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'message.php'?>">Уведомления&nbsp;
                                                <?php if ($newMesForUser > 0): ?>
                                                    <span class="badge bg-secondary"><?=$newMesForUser?></span>
                                                <?php endif; ?></a></li>
                                    <?php endif; ?>
                                        <li class="li_exit"><a href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <button onclick="location.href = '<?php echo BASE_URL . 'log.php'?>'" type="button" class="btn btn-outline-secondary">Войти</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contact row">
                    <nav class="tabs">
                        <ul class="ul_bot">
                            <li class="li_bot"><a href="<?php echo BASE_URL ?>">Главная</a></li>
                            <li class="li_bot"><a href="<?php echo BASE_URL . '102.php'?>">Продукция</a></li>
                            <li class="li_bot"><a href="<?php echo BASE_URL . '103.php'?>">Услуги</a></li>
                            <li class="li_bot"><a href="<?php echo BASE_URL . '104.php'?>">Документация</a></li>
                            <li class="li_bot"><a href="<?php echo BASE_URL . '105.php'?>">Вакансии</a></li>
                            <li class="li_bot"><a href="<?php echo BASE_URL . '106.php'?>">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
