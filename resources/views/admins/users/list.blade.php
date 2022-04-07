@extends('layouts.admin')

@section('content')

    @include('admins.partials.page-title', ['title' => 'Users List'])


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">

        <a href="{{route('admin.users.create')}}"
        class="btn btn-sm btn-success">ثبت کاربر جدید</a>

    </div>

    <div class="row">
        <form action="" method="get">

            <div class="row">
                <div class="col-4">
                    @include('admins.__components.input-text', [
                               'name' => 'name',
                               'placeholder' => 'name',
                               ])
                </div>
                <div class="col-4">
                    @include('admins.__components.input-text', [
                               'name' => 'email',
                                'placeholder' => 'email',
                               ])
                </div>

                <div class="col-4">
                    <input type="submit" class="btn btn-primary" value="search">
                    <a href="{{ route('admin.users.list') }}" >reset search</a>

                </div>

            </div>


        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

            {{--@foreach($users as $key => $user)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        --}}{{--{{ $user->present()->status }}--}}{{--
                       --}}{{-- {{ ($user->status = 1) ? 'فعال' : 'غیر فعال' }}--}}{{--
                        @if($user->status == 2)
                             <span class="btn btn-sm btn-success">فعال</span>
                        @else
                            <span class="btn btn-sm btn-warning">غیر فعال</span>
                        @endif

                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">edit</a>
                        <a href="" class="btn btn-sm btn-danger">delete</a>
                    </td>
                </tr>
            @endforeach--}}

        @each('admins.users.list-item', $users, 'user')

        </tbody>
    </table>

@endsection
