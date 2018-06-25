
<div class="head">
</div>
<div class="menu">
    <ul>
        <li>
            <a href="<?php if(isset($_SESSION['account'])){
                echo "/account/profile";
            }else{
                echo "/account/login";
            }?>">Личный кабинет</a>
            <a href="/category">Категории</a>
            <a href="/top">Топ</a>
            <a href="/">Новости</a>
        </li>
    </ul>
</div>

<div class="content">

    <?php foreach ($cats as $cat){?>
            <h2 class="tatle"><a href="#" name="<?php echo $cat['id'];?>" class="cat" url="/category" value="asd"><?php echo $cat['name'];?>  - (<?php echo $cat['amount'];?>)</a></h2>



    <?php } ?>

</div>
<div class="footer">
</div>