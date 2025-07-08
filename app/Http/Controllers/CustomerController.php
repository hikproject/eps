<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customers.index');
    }

    public function data()
    {
        return DataTables::of(Customer::get())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'cd_customer' => 'required|unique:customers,cd_customer',
                'name' => 'required',
                'address_office' => 'required',
                'address_storage' => 'required'
            ]);
            
            Customer::create($request->all());
            Alert::success('Sukses', 'Customer berhasil ditambahkan');
            return redirect()->route('customers.index');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($e->validator->errors()->has('cd_customer')) {
                Alert::error('Gagal', 'Kode Customer sudah digunakan');
            } else {
                Alert::error('Gagal', $e->getMessage());
            }
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->route('customers.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $customers = Customer::findOrFail($id);
            return view('admin.customers.edit', compact('customers'));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->route('customers.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $request->validate([
                'cd_customer' => 'required|unique:customers,cd_customer,'.$customer->id,
                'name' => 'required',
                'address_office' => 'required',
                'address_storage' => 'required'
            ]);

            $customer->update($request->all());
            Alert::success('Sukses', 'Customer berhasil diupdate');
            return redirect()->route('customers.index');
            
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            Alert::success('Sukses', 'Customer berhasil dihapus');
            return response()->json([
                'success' => true,
                'message' => 'Customer berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
