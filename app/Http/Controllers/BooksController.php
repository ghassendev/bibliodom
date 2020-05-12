<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{

   
    
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book=Book::orderBy('created_at','desc')->paginate(12);
		 
        return view('welcome')->with('book',$book);
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'contenu' => 'required',
            'url' => 'required',
            'cover_image' => 'image|nullable|max:1999']);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


               // Create Book
        $book = new Book;
        $book->title = $request->input('title');
        $book->contenu = $request->input('contenu');
        $book->url = $request->input('url');
        $book->user_id=auth()->user()->id;
        $book->cover_image = $fileNameToStore;
        $book->save();

        return redirect('book')->with('success', 'Book created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        return view ('show')->with('book',$book); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin='ghassengharsseloui@gmail.com';
        $book=Book::find($id);
        
        if(auth()->user()->email==$admin){
            return view('edit')->with('book',$book);
        }


        if(auth()->user()->id!=$book->user_id){
            return redirect('book')->with('error','unothorized');
        }
        return view('edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'contenu' => 'required',
            'url' => 'required',
            ]);
            


             // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public', $fileNameToStore);
        } 



               // Update Book
        $book =  Book::find($id);
        $book->title = $request->input('title');
        $book->contenu = $request->input('contenu');
        $book->url = $request->input('url');
        if($request->hasFile('cover_image')){
            $book->cover_image = $fileNameToStore;
        }
        $book->save();

        return redirect('book')->with('success', 'book edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin='ghassengharsseloui@gmail.com';
       $book=Book::find($id);

      
       
       if(auth()->user()->email==$admin){
        if($book->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$book->cover_image);
        }
        $book->delete();
       return redirect('/home')->with('success','book removed by admin');
    }
  

       if(auth()->user()->id!=$book->user_id){
        return redirect('book')->with('error','unothorized');
    }
    if($book->cover_image != 'noimage.jpg'){
        // Delete Image
        Storage::delete('public/cover_images/'.$book->cover_image);
    }
 
       $book->delete();
       return redirect('/home')->with('success','book removed');
    }
}
