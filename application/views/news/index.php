<?php foreach ($news as $news_item): ?>
    <h3>[<?=$news_item['id']?>] <?=$news_item['title']?></h3>
    <div class="main">
        <?=$news_item['text']?>
    </div>
    <p><a href="<?=site_url('news/'.$news_item['slug'])?>">详细查看</a>
        <a href="">修改</a>
        <a name="<?=$news_item['id']?>" href="<?=site_url('news/delete/'.$news_item['id'])?>">删除</a>
    </p>
    <hr />
<?php endforeach; ?>
<p><a href="<?=site_url('news/create')?>"><button>新增新闻</button></a></p>