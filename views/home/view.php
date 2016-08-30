<?php $this->title = $this->post['title']; ?>

<main>

    <div class="container">

        <table class="table table-condensed">
            <tr>
                <h1><?=htmlspecialchars($this->post['title'])?></h1>

                <p>
                    <u>
                        <i>Posted on</i>
                        <?=htmlspecialchars($this->post['date'])?>
                        <i>by</i>
                        <?=htmlspecialchars($this->post['username'])?>
                    </u>
                </p>

                <p><?=$this->post['content']?></p>
            </tr>
        </table>

        <?php if($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
            <span style="color:RED; text-align: center; float: right"><a href="<?=APP_ROOT?>/posts/createAdminComment/<?=$this->post['id']?>"><button>Add Comment</button></a></div></span>
             <?php  } else if($this->isLoggedIn && !$_SESSION['isAdmin']) { ?>
             <span style="color:RED; text-align: center; float: right"><a href="<?=APP_ROOT?>/posts/createUserComment/<?=$this->post['id']?>"><button>Add Comment</button></a></div></span>
             <?php  } { ?>

             <?php }  ?>

    </div>

</main>