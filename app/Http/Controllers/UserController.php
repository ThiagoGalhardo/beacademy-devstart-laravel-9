<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
   {
        $users = User::all();
       return view('users.index', compact('users'));
   }

   public function show($id)
   {
        if (!$user = User::find($id))
        return redirect()->route('users.index');
//    $user = User::where('id', $id)->first();
    return view('users.show', compact('user'));
   }

    public function create()
    {
       return view('users.create');
    }

    public function store(Request $request)
    {
        // Forma alternativa de persistir o dados
//        $user = New User;
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->save();
//        dd($request->all());

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success','Salvo com sucesso!');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $user->delete();
        $this->notification('Sucesso!');
        return redirect()->route('users.index');
    }

    public function notification()
    {
        return redirect()->route('users.notification')->with('success', 'Sucesso demais!!');
    }

}
