<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $validatedData  = $request->validated();

        if ($request->hasFile('image')) {
            $file   = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/news/', $fileName);
            $validatedData['image'] = "upload/news/$fileName";
        }

        $validatedData['trending'] = $request->status == true ? '1' : '0';
        $validatedData['top'] = $request->status == true ? '1' : '0';
        $validatedData['status'] = $request->status == true ? '1' : '0';

        News::create([
            'image' => $validatedData['image'],
            'title' => $validatedData['title'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'writer' => $validatedData['writer'],
            'tanggal' => $validatedData['tanggal'],
            'trending' => $validatedData['trending'],
            'top' => $validatedData['top'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('news-index')->with('message', 'News Added Successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
            $validatedData = $request->validated();
        
            if ($request->hasFile('image')) {
                $destination = public_path($news->image);
                if (File::exists($destination)) {
                    File::delete($destination);
                }
        
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move(public_path('upload/news/'), $fileName);
                $validatedData['image'] = "upload/news/$fileName";
            }
        
            $validatedData['trending'] = $request->trending == true ? '1' : '0';
            $validatedData['top'] = $request->top == true ? '1' : '0';
            $validatedData['status'] = $request->status == true ? '1' : '0';
        
            
            News::where('id', $news->id)->update([
                'image' => isset($validatedData['image']) ? $validatedData['image'] : $news->image,
                'title' => $validatedData['title'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'writer' => $validatedData['writer'],
                'tanggal' => $validatedData['tanggal'],
                'trending' => $validatedData['trending'],
                'top' => $validatedData['top'],
                'status' => $validatedData['status'],
            ]);
        
            return redirect()->route('news-index')->with('message', 'News Updated Successfully');
        
    }

    public function delete(News $news)
    {
        if ($news->count() > 0) {
            $destination = $news->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $news->delete();
            return redirect()->route('news-index')->with('messages', 'News Deleted Successfully');
        }
        return redirect()->route('news-index')->with('messages', 'Something went wrong');
    }

    public function show($id)
{
    $newsItem = News::findOrFail($id);
    return view('show', compact('newsItem'));
}

}
