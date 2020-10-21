@extends('layouts.master')
@section('css')
    body {
    font-family: 'Lato';
    }

    .fa-btn {
    margin-right: 1px;
    }
    .task-table tbody tr td:nth-child(2){
    width: 120px;
    }
    .task-table tbody tr td:nth-child(3){
    width: 100px;
    }
@endsection
@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

                <!-- New Task Form -->
                <form action="{{ route('task.store')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('tasks') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Mô tả công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="content" id="task-name" class="form-control" value="{{ old('tasks') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Deadline</label>

                        <div class="col-sm-6">
                            <input class="form-control" name="deadline" type="datetime-local" id="example-datetime-local-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Mức độ ưu tiên</label>

                        <div class="col-sm-6">
                            <select name="priority" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Bình thường</option>
                                <option value="1">Quan trọng</option>
                                <option value="2">Khẩn cấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>Tên công việc</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>
                                    @if($task->status == -1)
                                        <strike>{{ $task->name }}</strike>
                                    @else
                                        {{ $task->name }}
                                    @endif
                                </div>
                            </td>
                            <td class="table-text">
                                <div>
                                    @if($task->priority == 0)
                                        Bình thường
                                    @elseif($task->priority == 1)
                                        Quan trọng
                                    @elseif($task->priority == 2)
                                        Khẩn cấp
                                    @endif
                                </div>
                            </td>
                            <!-- Task Complete Button -->
                            <td>
                                @if($task->status == 1)
                                    <form action="{{ route('task.complete', $task->id)  }}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-btn fa-check"></i>Đang làm
                                        </button>
                                    </form>
                                @endif
                                @if($task->status == 2)
                                    <form action="{{ route('task.reComplete', $task->id)  }}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-check"></i>Hoàn thành
                                        </button>
                                    </form>
                                @endif
                                @if($task->status == -1)
                                    <form action="{{ route('task.complete', $task->id)  }}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-btn fa-check"></i>Làm lại
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <!-- Task Delete Button -->
                            <td>
                                <form action="{{ route('task.delete', $task['id']) }}" method="POST" onsubmit="return confirm('Có chắc chắn bạn muốn xóa?')">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Xoá
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
{{--                    <tr>--}}
{{--                        <td class="table-text"><div>Làm bài tập Laravel </div></td>--}}
{{--                        <!-- Task Complete Button -->--}}
{{--                        <td>--}}
{{--                            <a href="{{ url('frontend/task/complete/1') }}" type="submit" class="btn btn-success">--}}
{{--                                <i class="fa fa-btn fa-check"></i>Hoàn thành--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <!-- Task Delete Button -->--}}
{{--                        <td>--}}
{{--                            <form action="{{ url('frontend/task/1') }}" method="POST" onsubmit="return confirm('Có chắc chắn bạn muốn xóa?')">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('DELETE') }}--}}

{{--                                <button type="submit" class="btn btn-danger">--}}
{{--                                    <i class="fa fa-btn fa-trash"></i>Xoá--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td class="table-text"><div>Làm bài tập PHP  </div></td>--}}
{{--                        <!-- Task Complete Button -->--}}
{{--                        <td>--}}
{{--                            <a href="{{ url('frontend/task/complete/2') }}" type="submit" class="btn btn-success">--}}
{{--                                <i class="fa fa-btn fa-check"></i>Hoàn thành--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <!-- Task Delete Button -->--}}
{{--                        <td>--}}
{{--                            <form action="{{ url('frontend/task/2') }}" method="POST" onsubmit="return confirm('Có chắc chắn bạn muốn xóa?')">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('DELETE') }}--}}

{{--                                <button type="submit" class="btn btn-danger">--}}
{{--                                    <i class="fa fa-btn fa-trash"></i>Xoá--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td class="table-text"><div><strike>Làm project Laravel </strike></div></td>--}}
{{--                        <!-- Task Complete Button -->--}}
{{--                        <td>--}}
{{--                            <a href="{{url('frontend/task/recomplete/1')}}" type="submit" class="btn btn-success">--}}
{{--                                <i class="fa fa-btn fa-refresh"></i>Làm lại--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <!-- Task Delete Button -->--}}
{{--                        <td>--}}
{{--                            <form action="{{url('frontend/task/3')}}" method="POST" onsubmit="return confirm('Có chắc chắn bạn muốn xóa?')">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('DELETE') }}--}}

{{--                                <button type="submit" class="btn btn-danger">--}}
{{--                                    <i class="fa fa-btn fa-trash"></i>Xoá--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scrip')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

