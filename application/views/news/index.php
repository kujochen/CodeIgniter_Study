
<p><h2><a href="<?php echo site_url('news/create'); ?>">新增新闻</a></h2></p>

<?php foreach ($news as $news_item): ?>

    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">详细查看</a></p>

<?php endforeach; ?>