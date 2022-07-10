<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory;

class EmployeeController extends Controller
{
    private User $userS;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(): Factory|View|Application{
        $data['employees'] = Employee::paginate(5);
        return view('components.employee.index', $data);
    }
    public function create(): \Illuminate\Contracts\View\Factory|View|Application{
        return view('components.employee.create');
    }

    public function store(Request $request): Redirector|Application|RedirectResponse{
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();
        $employee = new Employee([
            'name'=>$request->get('name'),
            'lastName'=>$request->get('lastName'),
            'documentType'=>$request->get('documentType'),
            'documentNumber'=>$request->get('documentNumber'),
            'phoneNumber'=>$request->get('phoneNumber'),
            'address'=>$request->get('address'),
            'hiringDate'=>$request->get('hiringDate'),
            'salary'=>$request->get('salary'),
            'idUser'=>$user->getAttribute('id')
        ]);
        $employee->save();
        return redirect('employee/management')->with('message', 'Empleado agregado correctamente');
    }

    public function edit(Employee $employee): \Illuminate\Contracts\View\Factory|View|Application{
        return view('components.employee.edit', compact('employee'));
    }

    public function update(Employee $employee, Request $request): Redirector|Application|RedirectResponse{
        $employee->update($request->all());
        $employee->save();
        return redirect('employee/management')->with('message', 'Empleado actualizado correctamente');
    }

    public function destroy(Employee $employee): Redirector|Application|RedirectResponse{
        User::where('id',$employee->getAttribute('idUser'))->delete();
        $employee->delete();
        return redirect('employee/management')->with('message', 'Empleado eliminado correctamente');
    }
}
