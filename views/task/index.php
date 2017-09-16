<div class="title-block">
    <div class="row">
        <div class="col-md-6">
            <h3 class="title"> Tasks
                <a href="item-editor.html" class="btn btn-primary btn-sm rounded-s"> Add New </a>
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
                    <label class="item-check">
                        <span></span>
                    </label>
                </div>
                <div class="item-col item-col-header fixed item-col-img md">
                    <div>
                        <span>Media</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-title">
                    <div>
                        <span>Name</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-sales">
                    <div>
                        <span>Sales</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-stats">
                    <div class="no-overflow">
                        <span>Stats</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-category">
                    <div class="no-overflow">
                        <span>Category</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-author">
                    <div class="no-overflow">
                        <span>Author</span>
                    </div>
                </div>
                <div class="item-col item-col-header item-col-date">
                    <div>
                        <span>Published</span>
                    </div>
                </div>
                <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
            </div>
        </li>
        <li class="item">
            <div class="item-row">
                <div class="item-col fixed item-col-check">
                    <label class="item-check" id="select-all-items">
                        <input type="checkbox" class="checkbox">
                        <span></span>
                    </label>
                </div>
                <div class="item-col fixed item-col-img md">
                    <a href="item-editor.html">
                        <div class="item-img rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg)"></div>
                    </a>
                </div>
                <div class="item-col fixed pull-left item-col-title">
                    <div class="item-heading">Name</div>
                    <div>
                        <a href="item-editor.html" class="">
                            <h4 class="item-title"> 12 Myths Uncovered About IT &amp; Software </h4>
                        </a>
                    </div>
                </div>
                <div class="item-col item-col-sales">
                    <div class="item-heading">Sales</div>
                    <div> 46323 </div>
                </div>
                <div class="item-col item-col-stats no-overflow">
                    <div class="item-heading">Stats</div>
                    <div class="no-overflow">
                        <div class="item-stats sparkline" data-type="bar"></div>
                    </div>
                </div>
                <div class="item-col item-col-category no-overflow">
                    <div class="item-heading">Category</div>
                    <div class="no-overflow">
                        <a href="">Software</a>
                    </div>
                </div>
                <div class="item-col item-col-author">
                    <div class="item-heading">Author</div>
                    <div class="no-overflow">
                        <a href="">Meadow Katheryne</a>
                    </div>
                </div>
                <div class="item-col item-col-date">
                    <div class="item-heading">Published</div>
                    <div class="no-overflow"> 21 SEP 10:45 </div>
                </div>
                <div class="item-col fixed item-col-actions-dropdown">
                    <div class="item-actions-dropdown">
                        <a class="item-actions-toggle-btn">
                                                <span class="inactive">
                                                    <i class="fa fa-cog"></i>
                                                </span>
                            <span class="active">
                                                    <i class="fa fa-chevron-circle-right"></i>
                                                </span>
                        </a>
                        <div class="item-actions-block">
                            <ul class="item-actions-list">
                                <li>
                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal">
                                        <i class="fa fa-trash-o "></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="edit" href="item-editor.html">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </li>
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