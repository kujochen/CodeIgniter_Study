
<!--用于显示表单验证的错误信息 -->
<!-- <?=validation_errors()?> -->

<!--由表单辅助函数提供的，用于生成 form 元素，并添加一些额外的功能 -->
<?php echo form_open('news/create'); ?>

<div class="col-md-4 col-md-offset-4">
    <label for="title">标题</label>
    <input type="input" name="title" class="form-control" /><br />
    <?=form_error('title', '<div class="error">', '</div><br />')?>

    <label for="text">文本</label>
    <textarea name="text" class="form-control" rows="3"></textarea><br />
    <?=form_error('text', '<div class="error">', '</div><br />')?>

    <input type="submit" name="submit" value="创建新闻" class="btn btn-default" />
</form>
    &nbsp;&nbsp;<a href="<?php echo site_url('news/'); ?>">返回首页</a>
</div>