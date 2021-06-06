<h2>Create new post</h2>
<form method="post">
    <?php foreach ($blogs as $blog):?>
    <input type="hidden" name="id" value="<?php echo $blog->getId()?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $blog->title ?>"/>
        <?php if (isset($error["title"])): ?>
            <p style="color: red"><?php echo $error["title"] ?></p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Teaser</label>
        <textarea name="teaser" class="form-control"><?php echo $blog->teaser ?></textarea>
        <?php if (isset($error["teaser"])): ?>
            <p style="color: red"><?php echo $error["teaser"] ?></p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" value=""><?php echo $blog->content ?></textarea>
        <?php if (isset($error["content"])): ?>
            <p style="color: red"><?php echo $error["content"] ?></p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Date Created</label>
        <input type="date" name="dateCreate" class="form-control" value="<?php echo $blog->dateCreat ?>"/>
        <?php if (isset($error["dateCreate"])): ?>
            <p style="color: red"><?php echo $error["dateCreate"] ?></p>
        <?php endif; ?>
    </div>
    <?php endforeach;?>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>
