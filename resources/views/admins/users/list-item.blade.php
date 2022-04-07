<tr>
    <th scope="row">{{++$key}}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        {!!  $user->present()->status !!}
        {{--{{ $product->present()->status }}--}}
        {{-- {{ ($user->status = 1) ? 'فعال' : 'غیر فعال' }}--}}
        {{--@if($user->status == 2)
            <span class="btn btn-sm btn-success">فعال</span>
        @else
            <span class="btn btn-sm btn-warning">غیر فعال</span>
        @endif--}}
    </td>
    <td>
        <a href="{{ route('admin.users.edit', ['user'=> $user]) }}" class="btn btn-sm btn-primary">edit</a>
        <a href="" class="btn btn-sm btn-danger">delete</a>
    </td>
</tr>
