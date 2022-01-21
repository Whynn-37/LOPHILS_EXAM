@extends('templates.template')


@section('custom-css')

@endsection

@section('custom-js')

@endsection


@section('content_body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sample Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row  mb-2">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TASK</th>
                                        <th>STATUS</th>
                                        <th>CREATED</th>
                                        <th>UPDATED</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $datas)
                                        <tr>
                                            <form action="{{ route('task.destroy', $datas->id) }}" method="POST">
                                                @method('delete')
                                      
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $datas->task }}</td>
                                                <td>{{ $datas->status }}</td>
                                                <td>{{ $datas->created_at }}</td>
                                                <td>{{ $datas->updated_at }}</td>
                                                <td><button type="submit"
                                                    class="btn btn-lg btn-danger"><i class="fa fa-trash"></i>
                                                    {{ $datas->id }}</button>
                                                </td>
                                            </form>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('task.store') }}" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Task</label>
                                    <input type="text" name="task" id="inputName" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control custom-select" name="status">
                                        <option selected="" disabled="">Select one</option>
                                        <option>1</option>
                                        <option>0</option>

                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
