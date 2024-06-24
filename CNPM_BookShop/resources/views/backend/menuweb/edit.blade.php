@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="nav-icon fas fa fa-home"></i> Trang
                            chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menuweb.index') }}">Menu</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('menuweb.update',$menuWeb->menu_id)}}">
                @csrf
        @method('PATCH')
                <div class="form-group">
                    <label for="menu_name" class="col-form-label">Tên danh mục <span class="text-danger">*</span></label>
                    <input id="menu_name" type="text" value="{{ $menuWeb->menu_name }}" name="menu_name" placeholder="Nhập tên danh mục"
                        value="{{ old('menu_name') }}" class="form-control">
                    @error('menu_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="controller_name" class="col-form-label">Tên controller</label>
                    <input id="controller_name" type="text" value="{{ $menuWeb->controller_name }}" name="controller_name" placeholder="Controller name"
                        value="{{ old('controller_name') }}" class="form-control">
                    @error('controller_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="action_name" class="col-form-label">Tên action</label>
                    <input id="action_name" type="text" value="{{ $menuWeb->action_name }}" name="action_name" placeholder="Action name"
                        value="{{ old('action_name') }}" class="form-control">
                    @error('action_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level" class="col-form-label">Cấp bậc</label>
                    <select name="level" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="parent_id" class="col-form-label">Menu cha</label>
                    <input id="parent_id" type="text" value="{{ $menuWeb->parent_id }}" name="parent_id" placeholder="Menu cha"
                        value="{{ old('parent_id') }}" class="form-control">
                    @error('parent_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="menu_order" class="col-form-label">Sắp xếp</label>
                    <input id="menu_order" type="text" value="{{ $menuWeb->menu_order }}" name="menu_order" placeholder="Thứ tự sắp xếp"
                        value="{{ old('menu_order') }}" class="form-control">
                    @error('menu_order')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="position" class="col-form-label">Vị trí hiển thị</label>
                    <select name="position" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="link" class="col-form-label">Đường dẫn <span class="text-danger">*</span></label>
                    <input id="link" type="text" name="link" value="{{ $menuWeb->link }}" placeholder="Nhập tên đường dẫn"
                        value="{{ old('link') }}" class="form-control">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="create_by">Tạo bởi</label>
                    <select name="create_by" class="form-control">
                        @foreach ($users as $user)
                            <option value='{{ $user->name }}'{{ $menuWeb->create_by == $user->name ? 'selected' : '' }}>{{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="update_by">Người sửa</label>
                    <select name="update_by" class="form-control">
                        @foreach ($users as $user)
                            <option value='{{ $user->name }}'{{ $menuWeb->update_by == $user->name ? 'selected' : '' }}>{{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $menuWeb->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $menuWeb->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả thêm</label>
                    <input id="description" type="text" value="{{ $menuWeb->description }}" name="description" placeholder="Thêm mô tả"
                        value="{{ old('description') }}" class="form-control">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                 </div>
            </form>
        </div>
    </div>
@endsection
