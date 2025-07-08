<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.parts.index');
    }
    public function data()
    {
        return DataTables::of(Part::with('customer')->get())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = \App\Models\Customer::all();
        return view('admin.parts.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'cd_customer' => 'required|',
                'part_number' => 'required|unique:parts',
            ]);
                Part::create($request->all());
                Alert::success('Sukses', 'Part berhasil ditambahkan');
                return redirect()->route('parts.index');
            }  catch (\Exception $e) {
                Alert::error('Gagal', 'Gagal menambahkan Part: ' . $e->getMessage());
                return redirect()->route('parts.index');
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
    public function edit(Part $part)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        try {
            $part->delete();
            Alert::success('Sukses', 'Part berhasil dihapus');
            return response()->json([
                'success' => true,
                'message' => 'Part berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal menghapus part: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus part: ' . $e->getMessage()
            ], 500);
        }
    }
}
