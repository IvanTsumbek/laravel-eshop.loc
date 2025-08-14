<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary">Add Category</a>
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 70%">Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {!! \App\Helpers\Category\Category::getMenu('incs.menu-table-tpl') !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
