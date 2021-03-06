<?php $this->title = 'Edit Existing Post' ; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">

    <div class="container">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="post_title" id="title" value="<?=htmlspecialchars($this->post['title'])?>" />
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea rows="10" class="form-control" name="post_content" id="content"><?=htmlspecialchars($this->post['content'])?></textarea>
        </div>

        <div class="form-group">
            <label for="content">Date (yyyy-MM-dd hh:mm:ss):</label>
            <input type="text" class="form-control" name="post_date" id="pwd" value="<?=htmlspecialchars($this->post['date'])?>" />
        </div>

        <div class="form-group">
            <label for="fullname">Author UserName:</label>
            <input type="text" class="form-control" name="full_name" id="fullname" value="<?=htmlspecialchars($this->post['full_name'])?>" />
        </div>

        <div><button type="submit" class="btn btn-primary">Edit</button>
            <a href="<?=APP_ROOT?>/posts">[Cancel]</a>
        </div>

    </div>





</form>