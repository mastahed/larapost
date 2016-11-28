<?php

namespace MastahEd\Larapost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MastahEd\Larapost\Models\LarapostComment;
use MastahEd\Larapost\Models\LarapostPost;

class Larapost {

    /**
     * Add new post
     *
     * @param Request $request
     * @return string
     */
    public static function addPost(Request $request) {

        DB::beginTransaction();

        try {

            LarapostPost::create($request->all() + ['slug'=>str_slug($request->get('title'))]);

        } catch (\Exception $e) {

            DB::rollBack();

            return false;

        }

        DB::commit();

        return true;

    }

    /**
     * Get specific Post using ID
     *
     * @param $id
     * @return bool
     */
    public static function getPost($id) {

        try {

            $post   = LarapostPost::findOrFail($id);

        } catch (\Exception $e) {

            return $e->getMessage();

        }

        return $post;
    }

    /**
     * Get specific Post using ID
     *
     * @return bool
     */
    public static function getAllPosts() {

        try {

            $posts   = LarapostPost::all();

        } catch (\Exception $e) {

            return $e->getMessage();

        }

        return $posts;
    }

    /**
     * Add new comment to Post
     *
     * @param Request $request
     * @param LarapostPost $post
     * @return bool
     */
    public static function addComment(Request $request, LarapostPost $post) {

        DB::beginTransaction();

        try {

            if($post) {
                LarapostComment::create($request->all() + ['post_id'=>$post->id]);
            }

        } catch (\Exception $e) {

            DB::rollBack();

            return true;

        }

        DB::commit();

        return true;

    }
}