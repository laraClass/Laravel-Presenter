<?php

namespace App\Http\Controllers\Admins;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\User;
use App\Services\Notification\Constants\NotificationTypes;
use App\Services\Notification\Facade\Notification;
use App\Services\Notification\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    private $statuses;
    public function __construct()
    {
        $statuses = User::getUserStatus();
        $this->statuses = $statuses;
    }
    public function index()
    {
        /*$usersQuery = User::query();
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }
        if(!is_null(request('name'))){
            $usersQuery->where('name', 'like', "%".request('name')."%");
        }*/


        /*$num = 1;
        $str_num = (string) $num;*/
        //$users = User::where('id', 1)->get();
        //$users = User::where('id', 1)->orWhere('status', 1);
        //dd($users);
        $users = User::filter( new UserFilter() )->get();

        return view('admins.users.list', compact('users'));
    }

    public function create()
    {
        $statuses = User::getUserStatus();
        return view('admins.users.create', compact('statuses'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'email', 'min:6'],
            'status' => ['required', ],
        ]);

        //dd($request->input('name'));
        //dd(request('name'));
        //dd(request()->all());
        //dd($request->all());

        /*$user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->save();*/

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => request('status'),
        ]);

        return redirect()->route('admin.users.list');


    }

    public function storeNotification(Request $request)
    {

        /*$notification = new NotificationService();
        $notification->send(NotificationTypes::EMAIL, 'ali@alavi.com', 'salam');*/

        //Notification::send(NotificationTypes::EMAIL, 'ali@alavi.com', 'salam');


        //Notification::sendEmail('ali@alavi.com', 'salam');


        //dd($request->all());
        /*$request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'email', 'min:6'],
            'status' => ['required', ],
        ]);*/

        //dd($request->input('name'));
        //dd(request('name'));
        //dd(request()->all());
        //dd($request->all());

        /*$user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->save();*/

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => request('status'),
        ]);

        if($user instanceof User){

            Notification::send(NotificationTypes::EMAIL, [
                'user' => $user,
                'message' => 'salam'
            ]);

            return redirect()->route('admin.users.list');

        }



    }

    /*public function edit($id)
    {
        $user = User::find($id);
        return view('admins.users.edit', compact('user'));
    }*/
    public function edit(User $user)
    {
        $statuses = User::getUserStatus();
        //return view('admins.users.edit', compact('user', 'statuses'));
        return view('admins.users.edit', [
            'user' => $user,
            'statuses' => $this->statuses
        ]);
    }
    public function update(Request  $request, User $user)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['nullable', 'email', 'min:6'],
            'status' => ['required', Rule::in(User::USER_ACTIVE, User::USER_IN_ACTIVE)],
        ], [
            'name.required' => 'لطفا اسم را وارد کنید',
            'email.required' => 'لطفا ایمیل را وارد کنید',
        ]);


        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'status' => request('status'),
        ];
        if(!is_null($request->input('password'))){
            $data['password'] = Hash::make(request('password'));
        }

        $result = $user->update($data);
        /*if($result){
            return redirect()->route('admin.users.list');
        }
        return redirect()->back();*/


        return ($result)
            ? redirect()->route('admin.users.list')
            :  redirect()->back();

    }
    public function delete(User $user)
    {

    }
}
