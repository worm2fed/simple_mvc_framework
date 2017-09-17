<div class="title-block">
    <div class="row">
        <div class="col-md-6">
            <h3 class="title"> Tasks
                <a href="/?create" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                <div class="action dropdown">
                    <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?= $active_sort ?> </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="/<?php if (isset($_REQUEST['page'])): ?>&page=<?= $_REQUEST['page'] ?><?php endif; ?>&order_by=email">Email</a>
                        <a class="dropdown-item" href="/<?php if (isset($_REQUEST['page'])): ?>&page=<?= $_REQUEST['page'] ?><?php endif; ?>&order_by=username">Name</a>
                        <a class="dropdown-item" href="/<?php if (isset($_REQUEST['page'])): ?>&page=<?= $_REQUEST['page'] ?><?php endif; ?>&order_by=status">Status</a>
                    </div>
                </div>
            </h3>
            <p class="title-description"> List of tasks... </p>
        </div>
    </div>
</div>

<div class="card items">
    <ul class="item-list striped">
        <li class="item item-list-header">
            <div class="item-row">
                <div class="item-col fixed item-col-check">
                    <label class="item-check"><span></span></label>
                </div>
                <div class="item-col item-col-header fixed item-col-img md">
                    <div><span>Image</span></div>
                </div>
                <div class="item-col item-col-header item-col-title">
                    <div class="no-overflow"><span>Text</span></div>
                </div>
                <div class="item-col item-col-header item-col-author">
                    <div><span>Name</span></div>
                </div>
                <div class="item-col item-col-header item-col-category">
                    <div><span>Email</span></div>
                </div>
                <div class="item-col item-col-header item-col-date">
                    <div><span>Published</span></div>
                </div>
                <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
            </div>
        </li>

        <?php foreach ($tasks as $task): ?>
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                        <label class="item-check" id="select-all-items">
                            <input <?php if (\models\UserModel::isGuest()): ?> disabled <?php elseif (!$task->isUserOwnerOrAdmin()): ?> disabled <?php endif; ?> type="checkbox" class="checkbox" <?php if ($task->status): ?> checked="" <?php endif; ?>>
                            <span></span>
                        </label>
                    </div>
                    <div class="item-col fixed item-col-img md">
                        <div class="item-img rounded" style="background-image: url('/static/images/<?= $task->image ?>')"></div>
                    </div>
                    <div class="item-col fixed pull-left item-col-title">
                        <div class="no-overflow"> <?= $task->text ?> </div>
                    </div>
                    <div class="item-col item-col-author">
                        <div> <?= $task->username ?> </div>
                    </div>
                    <div class="item-col item-col-category">
                        <div> <?= $task->email ?> </div>
                    </div>
                    <div class="item-col item-col-date">
                        <div class="no-overflow"> <?= $task->published ?> </div>
                    </div>
                    <div class="item-col fixed item-col-actions-dropdown">
                        <?php if (!\models\UserModel::isGuest() and $task->isUserOwnerOrAdmin()): ?>
                            <a class="edit" href="#" data-toggle="modal" data-target="#edit-modal" onclick='update("<?= $task->task_id ?>", "<?= \core\SystemTools::escape($task->text) ?>")'><i class="fa fa-pencil"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
</div>

<nav class="text-right">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="<?= $prev_page ?>"> Prev </a>
        </li>
        <?php for ($i = 1; $i <= $pages_num; $i++): ?>
        <li class="page-item <?php if ($i == $active_page): ?> active <?php endif; ?>">
            <a class="page-link" href="/&page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link" href="<?= $next_page ?>"> Next </a>
        </li>
    </ul>
</nav>

<!-- Start edit modal -->
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/update"">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Text: </label>
                        <div class="col-sm-10">
                            <textarea class="form-control wyswyg" name="text" id="text" style="resize: none;" required=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="task_id" id="task_id" value="">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End edit modal -->

<script>
    function update(task_id, text) {
        $('#task_id').val(task_id);
        $('#text').val(text);
    }
</script>