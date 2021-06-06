<div class="card">
    <div class="card-header">
        List
    </div>
    <form method="post" action="./index.php?page=blog&action=delete">
        <div class="card-header">
            <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
        </div>
        </table>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">STT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Teaser</th>
                    <th scope="col">Content</th>
                    <th scope="col">Create Date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogs as $key => $blog): ?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $blog->getId() ?>"
                                   value="<?php echo $blog->getId() ?>"></td>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $blog->title ?></td>
                        <td><?php echo $blog->teaser ?></td>
                        <td><?php echo $blog->content ?></td>
                        <td><?php echo $blog->dateCreat ?></td>
                        <td><a type="submit" href="./index.php?page=blog&action=update&id=<?php echo $blog->getId()?>" class="btn btn-primary"=>Update</a></td>
                        <td><a type="submit" href="./index.php?page=blog&action=detail&id=<?php echo $blog->getId()?>" class="btn btn-primary"=>Detail</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
