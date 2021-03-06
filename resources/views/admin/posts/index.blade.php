<x-admin-master>
    @section('content')
        <h1>All Posts</h1>

        @if(Session::has('message'))

{{--            <div class="alert alert-success text-center">{{Session::get('message')}}</div>--}}
{{--                        OR--}}
            <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        @if(auth()->user()->has('posts'))
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->user->name }}</td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <img height="40px" src="{{$post->post_image}}" alt="">
                                    </td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>{{$post->updated_at->diffForHumans()}}</td>
                                    <td class="d-flex justify-content-around">
    {{--                                    @can('view', $post)--}}
                                        <a href="{{route('post.edit', $post->id)}}" class="btn small btn-warning"><i class="fas fa-edit small"></i></a>
                                        <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="small btn btn-danger"><i class="fas fa-trash-alt small"></i></button>
                                        </form>
    {{--                                    @endcan--}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex">
            <div class="mx-auto">
                {{$posts->links()}}
            </div>
        </div>
        @else
            <h3>No Posts Yet</h3>
        @endif
    @endsection
    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
{{--        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
    @endsection
</x-admin-master>
