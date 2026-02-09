<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Get all vendors with their category and services
     */
    public function index()
    {
        $vendors = Vendor::with(['category', 'services'])->get();

        return response()->json([
            'success' => true,
            'data' => $vendors,
            'message' => 'Vendors retrieved successfully'
        ]);
    }

    /**
     * Get a specific vendor by ID
     */
    public function show($id)
    {
        $vendor = Vendor::with(['category', 'services'])->find($id);

        if (!$vendor) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $vendor
        ]);
    }

    /**
     * Get vendors by city
     */
    public function getByCity($city)
    {
        $vendors = Vendor::where('city', 'like', "%$city%")
            ->with(['category', 'services'])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $vendors,
            'city' => $city
        ]);
    }

    /**
     * Get vendors by category
     */
    public function getByCategory($categoryId)
    {
        $vendors = Vendor::where('category_id', $categoryId)
            ->with(['category', 'services'])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $vendors
        ]);
    }

    /**
     * Get featured vendors (verified and top-rated)
     */
    public function featured()
    {
        $vendors = Vendor::where('is_verified', true)
            ->with(['category', 'services'])
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $vendors
        ]);
    }

    /**
     * Search vendors by name or description
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json([
                'success' => false,
                'message' => 'Search query is required'
            ], 400);
        }

        $vendors = Vendor::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->with(['category', 'services'])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $vendors,
            'query' => $query
        ]);
    }

    /**
     * Create a new vendor (Admin only)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required|string',
            'image' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
            'is_verified' => 'boolean',
            'city' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $vendor = Vendor::create($validated);

        return response()->json([
            'success' => true,
            'data' => $vendor,
            'message' => 'Vendor created successfully'
        ], 201);
    }

    /**
     * Update a vendor
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        $vendor->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $vendor,
            'message' => 'Vendor updated successfully'
        ]);
    }

    /**
     * Delete a vendor
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        $vendor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vendor deleted successfully'
        ]);
    }
}
