<div class="title-block">
    <div class="row">
        <div class="col-md-6">
            <h3 class="title"> Tasks
                <a href="/?create" class="btn btn-primary btn-sm rounded-s"> Add New </a>
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
                            <input <?php if (\models\UserModel::isGuest()): ?> disabled <?php elseif (!$task->isUserOwner()): ?> disabled <?php endif; ?> type="checkbox" class="checkbox" <?php if ($task->status): ?> checked="" <?php endif; ?>>
                            <span></span>
                        </label>
                    </div>
                    <div class="item-col fixed item-col-img md">
                        <a href="item-editor.html">
                            <div class="item-img rounded" style="background-image: url('/static/images/<?= $task->image ?>')"></div>
                        </a>
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
                        <div class="item-actions-dropdown">
                            <a class="item-actions-toggle-btn">
                                <span class="inactive"><i class="fa fa-cog"></i></span>
                                <span class="active"><i class="fa fa-chevron-circle-right"></i></span>
                            </a>
                            <div class="item-actions-block">
                                <ul class="item-actions-list">
                                    <li>
                                        <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash-o "></i></a>
                                    </li>
                                    <li>
                                        <a class="edit" href="item-editor.html"><i class="fa fa-pencil"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
</div>

<nav class="text-right">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href=""> Prev </a>
        </li>
        <li class="page-item active">
            <a class="page-link" href=""> 1 </a>
        </li>
        <li class="page-item">
            <a class="page-link" href=""> Next </a>
        </li>
    </ul>
</nav>