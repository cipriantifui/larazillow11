<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class RealtorListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
        ];
        $listings = \Auth::user()->listings()
            ->latest()->filter($filters)->get();

        return inertia('Realtor/Index', [
            'listings' => $listings,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted.');
    }
}
