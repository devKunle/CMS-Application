<x-admin-master>

    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control
                            @error('name')
                                is-invalid
                            @enderror
                            ">
                        <div>
                            @error('name')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning mx-1"><i class="fas fa-edit"></i></a>
                                            <form method="post" action="{{route('roles.destroy', $role)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-admin-master>
