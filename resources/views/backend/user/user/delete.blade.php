@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
<form action="{{route('user.destroy', $user->id)}}" method="post" class="box" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xóa thành viên có email là: {{$user->email}}.</p>
                        <p class="text-danger">Lưu ý: không thể khôi phục thành viên sau khi xóa. Bạn có chắc chắn muốn xóa?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="email" 
                                    name="email" 
                                    id="email"
                                    value="{{ old('email', ($user->email) ?? '') }}"
                                    class="form-control"
                                    autocomplete="off"
                                    readonly>
                                </div>
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label text-left">Họ và tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="name" 
                                    id="name"
                                    value="{{ old('name', ($user->name) ?? '') }}"
                                    class="form-control"
                                    autocomplete="off"
                                    readonly>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="Send">Xóa</button>
        </div>
    </div>
</form>
