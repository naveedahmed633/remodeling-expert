<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsPagesController extends Controller
{
    /**
     * Get CMS Page by Slug
     *
     * @param string $slug
     * @return \App\Models\CmsPage|null
     */
    public function getPageBySlug($slug)
    {
        $page = CmsPage::PageBySlug($slug)->first();
        if ($page) {
            $page->content = json_decode($page->content, true) ?? [];
        }
        return $page;
    }

    /**
     * Return Blade View Based on Slug
     *
     * @param string $slug
     * @param array $content
     * @param \App\Models\CmsPage $page
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function viewReturn($slug, $content, $page)
    {
        $views = [
            'home' => 'admin.pages.home',
            'about' => 'admin.pages.about',
            'contact' => 'admin.pages.contact',
            'project' => 'admin.pages.project',
            'service' => 'admin.pages.service',
            'blog' => 'admin.pages.blog',
            'stepform' => 'admin.pages.stepform',
            'setting' => 'admin.pages.setting',
        ];

        return isset($views[$slug])
            ? view($views[$slug], compact('content', 'page', 'slug'))
            : abort(404);
    }

    /**
     * Show Edit Page for CMS
     *
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($slug)
    {
        try {
            $page = $this->getPageBySlug($slug);

            if (!$page) {
                return back()->with('error', 'Page not found.');
            }

            return $this->viewReturn($slug, $page->content ?? [], $page);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update CMS Page Content and Media
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\CmsPage
     */
    public function updatePageBySlugWithMedia(Request $request)
    {
        $slug = $request->input('slug');
        $mediaCollections = $request->input('media_collections', []);

        $page = CmsPage::PageBySlug($slug)->firstOrFail();

        $content = $request->except(['_token', '_method', 'slug', 'media_collections']);

        // Preserve 0, false, and empty strings by using custom filtering
        $filteredContent = array_filter($content, function ($val) {
            return !is_null($val);
        });

        $page->update([
            'content' => json_encode($filteredContent),
        ]);

        foreach ($mediaCollections as $collectionName) {
            $this->addOrUpdateMedia($page, $request, $collectionName);
        }

        return $page;
    }

    /**
     * Handle Media Updates for CMS Page
     *
     * @param \App\Models\CmsPage $page
     * @param \Illuminate\Http\Request $request
     * @param string $collectionName
     */
    public function addOrUpdateMedia(CmsPage $page, Request $request, $collectionName)
    {
        if ($request->hasFile($collectionName)) {
            $page->clearMediaCollection($collectionName);
            $page->addMediaFromRequest($collectionName)->toMediaCollection($collectionName);
        }
    }

    /**
     * Combine Edit & Update Flow in One Action
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
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
            return back()->with('success', ucfirst($slug) . ' Page Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
