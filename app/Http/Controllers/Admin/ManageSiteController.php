<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\HowItWorks;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageSiteController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        $brand = Brand::first();
        return view('dashboard.admin.ManageSite.index', compact('banner', 'brand'));
    }


    public function updateBanner(Request $request)
    {
        $request->validate([
            'main_text' => 'required',
            'special_text' => 'required'
        ]);

        $banner = Banner::firstOrNew();
        $banner->main_text = $request->main_text;
        $banner->special_text = $request->special_text;
        $banner->save();

        return back()->with('success', 'Banner updated successfully');
    }
    public function updateBrand(Request $request)
    {
        $request->validate([
            'main_text' => 'required',
            'special_text' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $brand = Brand::firstOrNew();
        $brand->main_text = $request->main_text;
        $brand->special_text = $request->special_text;

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('brand', 'public');
                $images[] = $path;
            }
            $brand->images = $images;
        }

        $brand->save();
        return back()->with('success', 'Brand section updated successfully');
    }
    public function replaceImage(Request $request)
    {
        $request->validate([
            'new_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'index' => 'required|numeric'
        ]);

        $brand = Brand::first();
        $images = $brand->images;

        // Delete old image
        if (isset($images[$request->index])) {
            Storage::disk('public')->delete($images[$request->index]);
        }

        // Store new image
        $path = $request->file('new_image')->store('brand', 'public');
        $images[$request->index] = $path;

        $brand->images = $images;
        $brand->save();

        return back()->with('success', 'Image replaced successfully');
    }
    public function removeImage(Request $request)
    {
        $request->validate([
            'index' => 'required|numeric'
        ]);

        $brand = Brand::first();
        $images = $brand->images;

        // Delete image
        if (isset($images[$request->index])) {
            Storage::disk('public')->delete($images[$request->index]);
            unset($images[$request->index]);
            $images = array_values($images); // Reindex array
        }

        $brand->images = $images;
        $brand->save();

        return back()->with('success', 'Image removed successfully');
    }

    public function updateHowItWorks(Request $request)
    {
        $request->validate([
            'main_title' => 'required',
            'highlight_text' => 'required',
            'video_url' => 'required|url'
        ]);

        $howItWorks = HowItWorks::firstOrNew();
        $howItWorks->main_title = $request->main_title;
        $howItWorks->highlight_text = $request->highlight_text;
        $howItWorks->video_url = $request->video_url;
        $howItWorks->save();

        return back()->with('success', 'How It Works section updated successfully');
    }
    public function faqs()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('dashboard.admin.ManageSite.faqs', compact('faqs'));
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order,
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'FAQ added successfully');
    }

    public function updateFaq(Request $request)
    {
        $request->validate([
            'faq_id' => 'required|exists:faqs,id',
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = Faq::findOrFail($request->faq_id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order,
            'is_active' => $request->has('is_active')
        ]);

        return back()->with('success', 'FAQ updated successfully');
    }

    public function destroyFaq(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'FAQ deleted successfully');
    }

    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('dashboard.admin.ManageSite.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'designation' => 'required',
            'testimonial' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Testimonial::create($data);

        return back()->with('success', 'Testimonial added successfully');
    }

    public function updateTestimonial(Request $request)
    {
        $request->validate([
            'testimonial_id' => 'required|exists:testimonials,id',
            'client_name' => 'required',
            'designation' => 'required',
            'testimonial' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $testimonial = Testimonial::findOrFail($request->testimonial_id);
        $data = $request->except(['image', 'testimonial_id']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($testimonial->image);
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return back()->with('success', 'Testimonial updated successfully');
    }

    public function destroyTestimonial(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully');
    }

    public function features()
    {
        $feature = Feature::first();
        $boxes = $feature ? $feature->boxes : [];
        return view('dashboard.admin.ManageSite.features', compact('feature', 'boxes'));
    }

    public function updateFeatureTitle(Request $request)
    {
        $request->validate([
            'main_title' => 'required',
            'highlight_text' => 'required'
        ]);

        $feature = Feature::firstOrNew();
        $feature->main_title = $request->main_title;
        $feature->highlight_text = $request->highlight_text;
        $feature->boxes = $feature->boxes ?? []; // Set empty array if boxes is null
        $feature->save();

        return back()->with('success', 'Feature title updated successfully');
    }
    public function storeFeature(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png|dimensions:max_width=48,max_height=48',
            'order' => 'required|integer|min:0'
        ]);

        $feature = Feature::firstOrNew();
        $boxes = $feature->boxes ?? [];

        $imagePath = $request->file('image')->store('icons', 'public');

        $boxes[] = [
            'id' => count($boxes) + 1,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'order' => $request->order
        ];

        $feature->boxes = collect($boxes)->sortBy('order')->values()->all();
        $feature->save();

        return back()->with('success', 'Feature box added successfully');
    }

    public function destroyFeature($id)
    {
        $feature = Feature::first();
        $boxes = collect($feature->boxes)->reject(function ($box) use ($id) {
            return $box['id'] == $id;
        })->values()->all();

        $feature->boxes = $boxes;
        $feature->save();

        return back()->with('success', 'Feature box deleted successfully');
    }
    public function updateFeature(Request $request)
    {
        $request->validate([
            'box_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png|dimensions:max_width=48,max_height=48',
            'order' => 'required|integer|min:0'
        ]);

        $feature = Feature::first();
        $boxes = collect($feature->boxes);

        $boxIndex = $boxes->search(function ($box) use ($request) {
            return $box['id'] == $request->box_id;
        });

        if ($boxIndex !== false) {
            $box = $boxes[$boxIndex];
            $box['title'] = $request->title;
            $box['description'] = $request->description;
            $box['order'] = $request->order;

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($box['image']);
                $box['image'] = $request->file('image')->store('icons', 'public');
            }

            $boxes[$boxIndex] = $box;
            $feature->boxes = $boxes->sortBy('order')->values()->all();
            $feature->save();
        }

        return back()->with('success', 'Feature box updated successfully');
    }
}
