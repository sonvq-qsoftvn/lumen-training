<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ArticleController extends Controller {

    use RestControllerTrait;
    
    const MODEL = 'App\Model\Article';
     
//    public function index() {
//        $articles = Article::all();
//        return response()->json($articles);
//    }
//
//    public function show($id) {
//        $article = Article::find($id);
//        return response()->json($article);
//    }
//
//    public function store(Request $request) {
//        $article = Article::create($request->all());
//        return response()->json($article);
//    }
//
//    public function destroy($id) {
//        $article = Article::find($id);
//        $article->delete();
//        return response()->json('success');
//    }
//
//    public function update(Request $request, $id) {
//        $article = Article::find($id);
//        $article->title = $request->input('title');
//        $article->content = $request->input('content');
//        $article->save();
//        return response()->json($article);
//    }
//    
//    public function delete() {
//        $articles = Article::all();
//        foreach ($articles as $singleArticle) {
//            $singleArticle->delete();
//        }
//        return response()->json('success');
//    }

}
