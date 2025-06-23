<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $request->validate([
            'cd_customer' => 'required|unique:customers,cd_customer',
            'nm_customer' => 'required',
            'address' => 'required'
        ]);

        try {
            Customer::create($request->all());
            return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan customer: ' . $e->getMessage());
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
            // Ambil data customer berdasarkan ID
            $customers = Customer::findOrFail($id);

            // Return view edit dengan data costumer
            return view('admin.customers.edit', compact('customers'));

        } catch (\Exception $e) {
            // Tangani error jika user tidak ditemukan
            return redirect()->route('customers.index')
                ->with('error', 'Customer tidak ditemukan. Error: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $request->validate([
                'cd_customer' => 'required|unique:customers,cd_customer,' . $customer->id,
                'nm_customer' => 'required',
            ]);

            $customer->update($request->all());
            return redirect()->route('customers.index')->with('success', 'Customer berhasil diubah');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
    try {
        // Hapus data customer dari database
        $customer->delete();
        
        // Return response JSON untuk AJAX
        return response()->json([
            'success' => true,
            'message' => 'Customer berhasil dihapus'
        ]);
        
    } catch (\Exception $e) {
        // Return response error jika terjadi kesalahan
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus customer: ' . $e->getMessage()
        ], 500);
    }
    }
}
