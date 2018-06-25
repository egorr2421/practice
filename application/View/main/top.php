<div class="head">
</div>
<div class="menu">
    <ul>
        <li>
            <a href="/account/login">Личный кабинет</a>
            <a href="/category">Категории</a>
            <a href="/top">Топ</a>
            <a href="/">Новости</a>
        </li>
    </ul>
</div>

<div class="content">
    <?php foreach ($news as $new){?>
        <div class="news">

            <h2 class="tatle"><a name="<?php echo $new['id'];?>" class="post" href="#"><?php echo $new['Title'];?></a></h2>
            <div class="text">
                <p><?php echo $new['description'];?></p></div>
            <div class="view">

                <p>Добавлено:<?php echo $new['Date_cr'];?> View:<?php echo $new['veiw'];?></p>
            </div>
        </div>

    <?php } ?>

</div>
<div class="footer">
</div>