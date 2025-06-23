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
        $request->validate([
            'cd_customer' => 'required|unique:customers,cd_customer',
            'nm_customer' => 'required',
            'address' => 'required'
        ]);

        try {
            Customer::create($request->all());
            Alert::success('Sukses', 'Customer berhasil ditambahkan');
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal menambahkan customer: ' . $e->getMessage());
            return back();
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

            // Return view edit dengan data customer
            return view('admin.customers.edit', compact('customers'));

        } catch (\Exception $e) {
            // Tangani error jika customer tidak ditemukan menggunakan SweetAlert
            Alert::error('Error', 'Customer tidak ditemukan: ' . $e->getMessage());
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
                'cd_customer' => 'required|unique:customers,cd_customer,' . $customer->id,
                'nm_customer' => 'required',
                'address' => 'required'
            ]);

            $customer->update($request->all());
            Alert::success('Sukses', 'Customer berhasil diubah');
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal mengupdate customer: ' . $e->getMessage());
            return back();
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
        
        // Menggunakan SweetAlert untuk notifikasi sukses
        Alert::success('Sukses', 'Customer berhasil dihapus');
        
        // Return response JSON untuk AJAX
        return response()->json([
            'success' => true,
            'message' => 'Customer berhasil dihapus'
        ]);
        
    } catch (\Exception $e) {
        // Menggunakan SweetAlert untuk notifikasi error
        Alert::error('Gagal', 'Gagal menghapus customer: ' . $e->getMessage());
        
        // Return response error jika terjadi kesalahan
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus customer: ' . $e->getMessage()
        ], 500);
    }
    }
}
