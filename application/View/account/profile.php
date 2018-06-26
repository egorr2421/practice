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
<div class="i-m">
    <img class="avatar" src="/application/View/account/avatar.png">
    <div class="about-me">
        <h2>I`m: <small style="font-weight: normal;"><?php echo $_SESSION['account']['login']; ?></small></h2>
        <h2>My Email: <small style="font-weight: normal;"><?php echo $_SESSION['account']['Email']; ?></small></h2>

    </div>
    <div class="bt-exit">
        <a href="/account/exit">Exit</a>
        <br>
        <a href="#" class="addpost">Add Post</a>
    </div>


</div>
    <h2 style="text-align:center;margin-top: 10px">My posts</h2>
    <hr>
    <?php foreach ($news as $new){?>
        <div class="news" id="<?php echo $new['id'];?>">

            <h2 class="tatle"><a name="<?php echo $new['id'];?>" class="post" href="#"><?php echo $new['Title'];?></a>
                <a name="<?php echo $new['id'];?>" class="del-post" style="float: right;margin-right: 50px;">Delete</a>
                <a name="<?php echo $new['id'];?>" class="edit-post" style="float: right;margin-right: 50px;">Edit</a></h2>
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