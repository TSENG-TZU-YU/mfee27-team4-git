<?php if ($rowArticle["valid"] == 1) : ?>
                      <?= '<a class="btn btn-grey" href="article-doPublish.php?id=' . $id ?>
                      <?= '"><img class="mb-1" src="../icon/article-icon.svg" width="16" height="16"></img>
                        發佈文章
                      </a>' ?>
                    <?php endif; ?>
                    <?php if ($rowArticle["valid"] == 2) : ?>
                      <?= '<a class="btn btn-red" href="article-noPublish.php?id=' . $id ?>
                      <?= '"><img class="mb-1" src="../icon/article-icon.svg" width="16" height="16"></img>
                        取消發佈
                      </a>' ?>
                    <?php endif; ?>