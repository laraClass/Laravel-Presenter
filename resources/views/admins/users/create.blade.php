@extends('layouts.admin')

@section('content')

    @include('admins.partials.page-title', ['title' => 'User Create'])

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">

        <a href="{{route('admin.users.list')}}"
           class="btn btn-sm btn-primary">فهرست کاربران </a>

    </div>

    {{--<form action="{{ route('admin.users.store') }}" method="post">--}}
    <form action="{{ route('admin.users.store.notification') }}" method="post">


        @csrf

        <div class="mb-3">
            <label class="form-label">name</label>
            <input  name="name"  type="text" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <input  name="email"  type="email" class="form-control" placeholder="email">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">status</label>
            <select name="status" class="form-select"  >
                @foreach($statuses as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">submit</button>
        </div>

    </form>




@endsection
