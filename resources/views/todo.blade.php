@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron"><h1>Todo List App</h1></div>
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <form action="{{ route("todo.nambahtodo") }}" method="post">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="keterangan"
                placeholder="Input keterangan todo">
            <div class="input-group-append">
                <input type="submit" value="Tambah Todo" class="btn btn-block btn-primary">
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <td width="10%">No.</td>
                <td>Keterangan</td>
                <td colspan=2 class="w-25">Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($todoList as $item)
            <tr @if ($item->status=="selesai")
                class="bg-success text-white"
            @endif>
                <td>{{ ($todoList->currentPage()-1) * $todoList->perPage() + $loop->iteration  }}.</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route("todo.updatetodo",["id" => $item->id]) }}"
                        class="btn btn-block btn-warning
                        @if ($item->status=="selesai")
                            disabled
                        @endif">Selesai</a>
                </td>
                <td>
                    <a href="{{ route("todo.hapustodo",["id" => $item->id]) }}" class="btn btn-block btn-danger">Hapus</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $todoList->links() }}
</div>
@endsection



