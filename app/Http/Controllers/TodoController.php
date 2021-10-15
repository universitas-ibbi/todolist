<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{


    public function tampilTodo(){
        // Query Builder
        // $todolist = \DB::table("tbltodo")->get();

        // Eloquent
        $todolist = Todo::paginate(10);

        return view("todo")
                ->with("todoList",$todolist);
    }

    public function tambahTodo(Request $request){
        // Query Builder
        // \DB::table("tbltodo")
        //     ->insert([
        //         "keterangan" => $request->keterangan,
        //         "status" => "pending",
        //         "created_at" => now(),
        //         "updated_at" => now()
        //     ]);

        // Eloquent
        Todo::create([
            "keterangan" => $request->keterangan,
            "status" => "pending"
        ]);

        return redirect()
            ->route("todo.tampiltodo")
            ->with("info","Berhasil Tambah Todo");
    }

    public function hapusTodo($id){
        // Query Builder
        // \DB::table("tbltodo")->where("id",$id)->delete();

        // Eloquent
        Todo::where("id",$id)->delete();

        return redirect()
            ->route("todo.tampiltodo")
            ->with("info","Berhasil Hapus Todo");
    }

    public function updateTodo($id){
        // Query Builder
        // \DB::table("tbltodo")->where("id",$id)->update([
        //     "status" => "selesai",
        //     "updated_at" => now()
        // ]);

        // Eloquent
        Todo::where("id",$id)->update([
            "status" => "selesai"
        ]);

        return redirect()
                ->route("todo.tampiltodo")
                ->with("info","Berhasil Update Todo");
    }
}
