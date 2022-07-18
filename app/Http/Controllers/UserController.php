<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;


class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        // dd($request->all());
        // $users = User::paginate(5);


        $users = $this->model->getUsers(
            $request->search ?? ''
        );
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

    public function store(StoreUpdateUserFormRequest $request)
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


        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }
        $data['is_admin'] = $request->admin ? 1 : 0;
        $this->model->create($data);


        $this->notification('Usuário criado com sucesso!');
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $data['is_admin'] = $request->admin ? 1 : 0;
        $user->update($data);
        $this->notification('Atualizado com sucesso!');
        return redirect()->route('users.show', $user->id);
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $user->delete();
        $this->notification('Excluído com sucesso!');
        return redirect()->route('users.index');
    }

    public function admin()
    {
        return view('admin.index');
    }


    public function notification($message)
    {
        return redirect()->route('users.notification')->with('success', $message);
    }
}
