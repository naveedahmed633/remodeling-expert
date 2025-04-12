<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsPagesController extends Controller
{

    public function settingCreate()
    {
        $data = CmsPage::where('name', 'Setting')->first();
        if ($data) {
            $content = json_decode($data->content);
        }
        return view('admin.pages.setting', compact('data', 'content'));
    }
    public function update(Request $request)
    {
        $data = CmsPage::where('name', 'Setting')->first();
        if ($data) {
            $content = json_decode($data->content, true);
            $content['site_title'] = $request->site_title;
            $content['copy_right_content'] = $request->copy_right_content;
            $content['email'] = $request->email;
            $content['address'] = $request->address;
            $content['phone_num'] = $request->phone_num;
            $content['subscribe_btn_text'] = $request->subscribe_btn_text;
            $content['news_letter_heading_red'] = $request->news_letter_heading_red;
            $content['news_letter_heading'] = $request->news_letter_heading;
            $content['working_hours'] = $request->working_hours;
            $content['footer_description'] = $request->footer_description;
            $content['youtube'] = $request->youtube;
            $content['linkid'] = $request->linkedin;
            $content['twitter'] = $request->twitter;
            $content['instagram'] = $request->instagram;
            $content['facebook'] = $request->facebook;
        }
        if ($request->hasFile('logo')) {
            $data->clearMediaCollection('logo');
            $data->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        if ($request->hasFile('footer_logo')) {
            $data->clearMediaCollection('footer_logo');
            $data->addMediaFromRequest('footer_logo')->toMediaCollection('footer_logo');
        }
        if ($request->hasFile('favicon')) {
            $data->clearMediaCollection('favicon');
            $data->addMediaFromRequest('favicon')->toMediaCollection('favicon');
        }


        $data->content = json_encode($content);
        $data->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }
    
   /**
     * Retrieve a CMS page by slug and decode its content.
     */
    public function getPageBySlug($slug)
    {
        $page = CmsPage::PageBySlug($slug)->first();

        if ($page) {
            $page->content = json_decode($page->content, true);
        }

        return $page;
    }

    /**
     * Return the appropriate view based on the page slug.
     */
    public function viewReturn($slug, $content, $page)
    {
        $views = [
            'home'              => 'admin.pages.home',
            'about'             => 'admin.pages.about',
            'contact'           => 'admin.pages.contact',
            'program'           => 'admin.pages.program',
            'league'            => 'admin.pages.leagues',
            'personal_training' => 'admin.pages.personal_training',
            'events'            => 'admin.pages.events',
            'get_in_touch'      => 'admin.pages.get-in-touch',
        ];

        return isset($views[$slug]) ? view($views[$slug], compact('content', 'page', 'slug')) : abort(404);
    }

    /**
     * Show the edit page for a given slug.
     */
    public function edit($slug)
    {
        try {
            $page = $this->getPageBySlug($slug);
            return $this->viewReturn($slug, $page->content, $page);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update a CMS page by slug, including media updates.
     */
    public function updatePageBySlugWithMedia(Request $request)
    {
        $slug = $request->input('slug');
        $mediaCollections = $request->input('media_collections', []);

        $page = CmsPage::PageBySlug($slug)->firstOrFail();

        // Exclude Laravel’s internal fields and remove empty values
        $content = array_filter($request->except(['_token', '_method']));

        // Update content in JSON format
        $page->update(['content' => json_encode($content)]);

        // Handle media collections
        foreach ($mediaCollections as $collectionName) {
            $this->addOrUpdateMedia($page, $request, $collectionName);
        }

        return $page;
    }

    /**
     * Add or update media files for a given page.
     */
    public function addOrUpdateMedia(CmsPage $page, Request $request, $collectionName)
    {
        if ($request->hasFile($collectionName)) {
            $page->clearMediaCollection($collectionName);
            $page->addMediaFromRequest($collectionName)->toMediaCollection($collectionName);
        }
    }

    /**
     * Handle edit and update request for a CMS page.
     */
    public function editAndUpdate(Request $request, $slug)
    {
        try {
            DB::beginTransaction();

            $page = $this->getPageBySlug($slug);
            if (!$page) {
                abort(404);
            }

            $this->updatePageBySlugWithMedia($request);

            DB::commit();
            return redirect()->back()->with('success', "{$slug} Page Updated Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
