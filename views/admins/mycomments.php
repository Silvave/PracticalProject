

<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Content</th>
                <th>Title</th>
                <th>Username</th>
                <th>Date</th>
<!--                <th>EDIT</th>-->
                <th>DELETE</th>
            </tr>

            <?php foreach ($this->comments as $comment) : ?>
                <tr>
                    <td><?=cutLongText($comment['text']) ?></td>
                    <td><?=cutLongText($comment['title']) ?></td>
                    <td><?=cutLongText($comment['username']) ?></td>
                    <td><?=htmlspecialchars($comment['date']) ?></td>

                    <td><a href="<?=APP_ROOT?>/admins/deleteAdminComment/<?= htmlspecialchars($comment['id'])?>">[DELETE]</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <span style="color:RED; text-align: center; float: left; margin-left: 50px"><a href="<?=APP_ROOT?>/"><button>Back</button></a></span>
</main>