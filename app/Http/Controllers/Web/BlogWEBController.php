<?php

namespace App\Http\Controllers\Web;

use App\FcmHelper;
use App\Http\Controllers\AppBaseController;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

/**
 * Class BlogAPIController
 * @package App\Http\Controllers\API
 */
class BlogWEBController extends AppBaseController
{
    /** @var  BlogRepository */
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the Blog.
     * GET|HEAD /blog
     *
     * @return Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->paginate(10);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Store a newly created Blog in storage.
     * POST /blog
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $image = $this->saveImage($request);
        if ($image) {
            $blog = new Blog();
            $blog->fill($input);
            $blog->image = $image;
            $blog->user_id = 1;
            $blog->save();
            if ($blog) {
                if ($request->notification = 1) {
                    $this->send_fcm($request, $image, $blog->id);
                }
                return redirect('admin/blog');
            }
        }
    }


    /**
     * Display the specified Blog.
     * GET|HEAD /blog/{id}/show
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            return redirect('404');
        }
        return view('blog.view', compact('blog'));
    }

    /**
     * Display the specified Blog.
     * GET|HEAD /blog/{id}/create
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Display the specified Blog.
     * GET|HEAD /blog/{id}/edit
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            return redirect('404');
        }
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified Blog in storage.
     * PUT/PATCH /blog/{id}/update
     *
     * @param int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        $input = $request->all();
        if ($request->image) {
            $image = $this->saveImage($request);
            $blog = Blog::find($id);
            $blog->fill($input);
            $blog->image = $image;
            $blog->save();
            return redirect('admin/blog');
        }
        /** @var Blog $blog */
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            return redirect('404');
        }
        $this->blogRepository->update($input, $id);
        return redirect('admin/blog');

    }

    /**
     * Remove the specified Blog from storage.
     * DELETE /blog/{id}
     *
     * @param int $id
     *
     * @return RedirectResponse
     * @throws Exception
     *
     */
    public function destroy($id)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            return $this->sendError('Blog not found');
        }

        $blog->delete();
        return redirect('admin/blog');
    }

    public function saveImage($request)
    {
        $random = Str::random(10);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $random . '_blog.' . $request->image->extension();
            $image->move(base_path() . '/public/blog/', $name);
            $name = url("blog/$name");
            return $name;
        }
        return false;
    }


    private function send_fcm($input, $image, $blogId)
    {
        $fcm = new FcmHelper();
        switch ($input->topic) {
            case 1:
                $fcm->send_fcm_topic('doctor', $input->title, 'New blog: ' . $input->content, $image, $blogId, 4);
                break;
            case 2:
                $fcm->send_fcm_topic('provider', $input->title, 'New blog: ' . $input->content, $image, $blogId, 4);
                break;
            case 3:
                $fcm->send_fcm_topic('doctor', $input->title, 'New blog: ' . $input->content, $image, $blogId . 4);
                $fcm->send_fcm_topic('provider', $input->title, 'New blog: ' . $input->content, $image, $blogId, 4);
                break;
        }
    }
}
