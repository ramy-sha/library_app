<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex(){
      $books = Book::all();
      $bookCount = Book::where('id','>',0)->count();
       return view('index',$arrayName = array('books' =>$books,'bookCount'=>$bookCount));
    }

   public function postBook(Request $request){
     $validateData = $request->validate(
       [
         'name'=>'required |string',
         'book_category'=>'required |string',
         'author'=>'required |string',
       ]
     );

    // Save
     $book = new Book();
     $book->name = $request->name;
     $book->book_category = $request->book_category;
     $book->author = $request->author;
     $book->save();
     return back();
   }

    //Delete
    public function bookDelete(int $id){
    Book::where('id',$id)->delete();
    return redirect()->route('index');
    }

    //Edit
    public function getBookEdit(int $id){
      $books = Book::all();
      $bookCount = Book::where('id','>',0)->count();
      $book = Book::where('id',$id)->first();
      return view('index',$arrayName = array('books' =>$books,'bookCount'=>$bookCount,'firstBook'=>$book));

    }




    public function postBookEdit(Request $request){
      $validateData = $request->validate(
        [
          'name'=>'required |string',
          'book_category'=>'required |string',
          'author'=>'required |string',
          'book_id'=>'required |integer',
        ]
      );


       Book::where('id',$request->book_id)->update([
        'name' =>$request->name,
        'book_category' => $request->book_category,
        'author' => $request->author,

      ]);
      return redirect()->route('index');



    }

}
