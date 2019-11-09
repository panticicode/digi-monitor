<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\Suppliers\CreateSuppliersRequest;
use App\Http\Requests\Suppliers\UpdateSuppliersRequest;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('name', 'DESC')->paginate(5);

        return view('dashboard.suppliers.index', [
            'suppliers' => $suppliers
        ]);
    }

    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    public function store(CreateSuppliersRequest $request, Supplier $supplier)
    {
        $supplier->fill($request->all());

        $supplier->save();

        session()->flash('success', 'You have been created suppliers');

        return redirect(route('dashboard.suppliers.index'));
    }

    public function edit(Supplier $supplier)
    {
        return view('dashboard.suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    public function update(UpdateSuppliersRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        session()->flash('success', 'You have been updated Suppliers');

        return redirect(route('dashboard.suppliers.index'));
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        session()->flash('success', 'You have been deleted Suppliers');

        return redirect(route('dashboard.suppliers.index'));
    }
}