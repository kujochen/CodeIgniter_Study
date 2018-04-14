<?php foreach ($news as $news_item): ?>
    <h3>[<?=$news_item['id']?>] <?=$news_item['title']?></h3>
    <div class="main">
        <?=$news_item['text']?>
    </div>
    <p><a href="<?=site_url('news/'.$news_item['id'])?>">详细查看</a>
        <a href="<?=site_url('news/fix/'.$news_item['id'])?>">修改</a>
        <a href="<?=site_url('news/delete/'.$news_item['id'])?>">删除</a>
    </p>
    <hr />
<?php endforeach; ?>
<p><a href="<?=site_url('news/create')?>"><button>新增新闻</button></a></p>