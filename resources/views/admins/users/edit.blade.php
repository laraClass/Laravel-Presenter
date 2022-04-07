@extends('layouts.admin')

@section('content')

    @include('admins.partials.page-title', ['title' => 'User edit'])

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">

        <a href="{{route('admin.users.list')}}"
           class="btn btn-sm btn-primary">فهرست کاربران </a>

    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="post">


        @if($errors->any())


            <div class="bg-danger">
                <ul>
                    @foreach($errors->all() as $error)

                        <li>{{$error}}</li>


                    @endforeach
                </ul>
            </div>



        @endif

        @csrf

        <div class="mb-3">

            @include('admins.__components.label', ['value' => 'نام'])
            @include('admins.__components.input-text', ['name' => 'name', 'value' => $user->name])

        </div>

        <div class="mb-3">
            <label class="form-label">email</label>
            @include('admins.__components.input-text', [
                            'name' => 'email',
                            'value' => $user->email,
                            'type' => 'email',
                            ])

        </div>


        <div class="mb-3">
            <label class="form-label">password</label>
            @include('admins.__components.input-text', [
                            'name' => 'password',
                            'type' => 'password',
                            ])
        </div>


        <div class="mb-3">
            <label class="form-label">status</label>
            <select name="status" class="form-select"  >
                @foreach($statuses as $key => $value)
                    <option value="{{ $key }}" {{ ($user->status == $key) ? 'selected' : '' }} >{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">submit</button>
        </div>

    </form>




@endsection
