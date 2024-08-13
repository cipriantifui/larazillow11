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
            ... $request->only(['by', 'order']),
        ];
        $listings = \Auth::user()->listings()->filter($filters)->get();

        return inertia('Realtor/Index', [
            'filters' => $filters,
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
