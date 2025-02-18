@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled mb0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
$url = ($config['method'] == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id);
@endphp
<form action="{{ $url }}" method="post" class="box" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của nhóm người dùng</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">Tên nhóm
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('email', ($userCatalogue->name) ?? '') }}"
                                    class="form-control"
                                    autocomplete="off"
                                    placeholder="">
                                </div>
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label text-left">Ghi chú
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="description" 
                                    value="{{ old('name', ($userCatalogue->name) ?? '') }}"
                                    class="form-control"
                                    autocomplete="off">
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="Send">Lưu lại</button>
        </div>
    </div>
</form>
<script>
    var province_id = '{{(isset($userCatalogue->province_id)) ? $userCatalogue->province_id : ''}}'
    var district_id = '{{(isset($userCatalogue->district_id)) ? $userCatalogue->district_id : ''}}'
    var ward_id = '{{(isset($userCatalogue->ward_id)) ? $userCatalogue->ward_id : ''}}'

</script>