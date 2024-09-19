<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load('images');
        return inertia('Realtor/ListingImage/Create', ['listing' => $listing]);
    }

    public function store(Request $request, Listing $listing)
    {
        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,jpeg,png|max:5000',
            ],
            [
                'images.*.mimes' => 'Only jpeg, jpg and png images are allowed',
                'images.*.max' => 'Sorry! Maximum allowed size for an image is 5MB'
            ]);

            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                $listing->images()->create([
                    'filename' => $path
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully');
    }

    public function destroy($listingId, ListingImage $image)
    {
        \Storage::disk('public')->delete($image->filename);
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
