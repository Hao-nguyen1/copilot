<form action="{{ route('user.index') }}" method="get">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                @php
                    $perPage = request('perpage') ?: old('perpage');
                @endphp
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <select class="form-control input-sm perpage filter mr10" name="perpage">
                        @for($i = 20; $i <= 100; $i += 20)
                            <option {{ ($perPage == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }} Bản ghi</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    @php
                        $publishArray = ['Không hoạt động', 'Hoạt động'];
                        $publish = request('publish') ?: old('publish');

                    @endphp
                    <select name="publish" class="form-control ml10 setupSelect2">
                        <option value="-1" selected="selected">Chọn trạng thái</option>
                        @foreach ($publishArray as $key => $val)
                            <option {{ ($publish == $key) ? 'selected' : '' }} value="{{$key}}">{{$val}}</option>

                        @endforeach

                    </select>
                    <select name="user_catalogue_id" class="form-control ml10 setupSelect2">
                        <option value="0" selected="selected">Chọn nhóm thành viên</option>
                        <option value="1">Quản lý</option>
                    </select>
                    <div class="uk-search uk-flex uk-flex-middle mr10">
                        <div class="input-group ">
                            <input 
                                type="text" 
                                name="keyword" 
                                class="form-control" 
                                value="{{ request('keyword') ?: old('keyword') }}" 
                                placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-primary" type="submit" name="search" value="search">
                                    <i class="fa fa-search mr5"></i>Tìm kiếm
                                </button>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('user.create') }}" class="btn btn-danger">
                        <i class="fa fa-plus mr5"></i>Thêm mới thành viên
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>