<?php $this->title = 'Delete Comment'; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div class="container">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="post_title" id="title" disabled value="<?=htmlspecialchars($this->comments['title'])?>"/>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea rows="10" class="form-control" name="post_content" id="content" disabled><?=htmlspecialchars($this->comments['text'])?></textarea>
        </div>

        <div class="form-group">
            <label for="content">Date (yyyy-MM-dd hh:mm:ss):</label>
            <input type="text" class="form-control" name="post_date" id="pwd" disabled value="<?=htmlspecialchars($this->comments['date'])?>" />
        </div>

        <div><button type="submit" class="btn btn-primary">Delete</button>
            <a href="<?=APP_ROOT?>/users/mycomments/">[Cancel]</a>
        </div>

        <br />
</form>