<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="display: flex">
            <div class="col-6 col-md-2">
                <a href="" class="btn btn-primary">Tạo nhân viên</a>
            </div>
            <div class="col col-md-9" style="margin:0 auto"></div>
            <div class="col my-auto">
                <a class="card btn btn-default my-auto" data-toggle="collapse" href="#collapseSearch" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
        <div class="collapse" id="collapseSearch">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control"
                            name="name"
                            placeholder="Tên nhân viên" />
                        </div>
                        <div class="form-group">
                            <select class="form-control">Team
                                <option style="display: none">Team</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control"
                            name="email"
                            placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <select class="form-control" >Team
                                <option style="display: none">Hình thức</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-flex mt-4 justify-content-center align-self-center">
                        <button type="submit" class="btn btn-default" style="width: 100px;">
                            Đặt lại
                        </button>
                        <button type="submit" class="btn btn-success ml-3" style="width: 100px;">
                            Tìm kiếm
                        </button>
                </div>
            </div>
        </div>
    </div>
</div>