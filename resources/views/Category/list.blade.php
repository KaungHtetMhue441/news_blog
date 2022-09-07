<table class="table table-hover table-bordered">
    <thead>
    <th>ID</th>
    <th>Title</th>
    <th>Owner</th>
    <th>Action</th>
    <th>Created_at</th>
    </thead>
    <tbody>

    @foreach(\App\Category::with('user')->get() as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>

            <td>{{$category->user->name}}) </td>
            <td>
                <a href="{{route('category.edit',$category->id)}}"><small class="text-info mr-3">
                        <i class="feather-edit"></i>
                        <span>edit</span>
                    </small>
                </a>
                <form action="{{route("category.destroy",$category->id)}}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return comfirm('Are u sure to delete!?')">
                        <i class="feather feather-delete"></i>
                        <span>delete</span>
                    </button>
                </form>
            </td>
            <td>{{$category->created_at->format('d-m-y')}}</td>
        </tr>

    @endforeach
    </tbody>
</table>
