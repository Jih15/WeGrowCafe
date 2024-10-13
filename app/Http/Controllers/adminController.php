<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar semua admin.
     */
    public function index()
    {
        $admins = Admin::with('cafe')->get();
        return response()->json($admins, 200);
    }

    /**
     * Menambahkan admin baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cafe_id' => 'nullable|exists:cafes,cafe_id',
            'role' => 'required|in:Master Admin,Cafe Admin',
            'name' => 'required|max:55',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|max:30',
            'phone' => 'required|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'authentication_id' => 'required|exists:authentications,authentication_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Handle file upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validatedData['profile_photo'] = $path; // Menyimpan path gambar
        }

        // Mass assignment dengan fillable
        $admin = Admin::create($validatedData);

        // Menambahkan URL lengkap untuk file profil
        if ($admin->profile_photo) {
            $admin->profile_photo = url('storage/' . $admin->profile_photo);
        }

        return response()->json($admin, 201);
    }

    /**
     * Menampilkan detail admin berdasarkan ID.
     */
    public function show($id)
    {
        $admin = Admin::with('cafe')->find($id);

        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        // Menambahkan URL lengkap untuk file profil
        if ($admin->profile_photo) {
            $admin->profile_photo = url('storage/' . $admin->profile_photo);
        }

        return response()->json($admin, 200);
    }

    /**
     * Memperbarui admin berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cafe_id' => 'nullable|exists:cafes,cafe_id',
            'role' => 'required|in:Master Admin,Cafe Admin',
            'name' => 'required|max:55',
            'email' => 'required|email|unique:admins,email,' . $id . ',admin_id', // Menggunakan admin_id untuk validasi unique
            'password' => 'nullable|min:8|max:30',
            'phone' => 'required|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'authentication_id' => 'required|exists:authentications,authentication_id',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Hash password jika diisi
        $validatedData = $validator->validated();
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        // Handle file upload jika ada
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validatedData['profile_photo'] = $path; // Menyimpan path gambar
        }

        // Cari admin berdasarkan admin_id dan lakukan update
        $admin = Admin::findOrFail($id);
        $admin->update($validatedData);

        // Menambahkan URL lengkap untuk file profil
        if ($admin->profile_photo) {
            $admin->profile_photo = url('storage/' . $admin->profile_photo);
        }

        return response()->json($admin, 200);
    }

    /**
     * Menghapus admin berdasarkan ID.
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        // Hapus foto profil dari storage jika ada
        if ($admin->profile_photo) {
            Storage::disk('public')->delete($admin->profile_photo);
        }

        $admin->delete(); // Menghapus admin
        return response()->json(['message' => 'Admin deleted successfully'], 200);
    }
}
