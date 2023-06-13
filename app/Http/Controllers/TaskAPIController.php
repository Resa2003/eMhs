<?php

namespace App\Http\Controllers;

use App\Task;

use Illuminate\Http\Request;

class TaskAPIController extends Controller
{
    public function all()
    {
        $task = Task::all();
        return response()->json(['data' => $task]);
    }

    public function create(Request $request)
    {
        $task = Task::create([
            'nama' => $request->nama,
            'deskripsi_task' => $request->deskripsi_task,
            'status' => $request->status,
        ]);

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Disimpan'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Disimpan'
            ], 401);
        }
    }

    public function update(Request $request)
    {
        $task = Task::whereId($request->id)->update([
            'nama' => $request->nama,
            'deskripsi_task' => $request->deskripsi_task,
            'status' => $request->status,
        ]);

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Diubah'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Diubah'
            ], 401);
        }
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil DiHapus'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Dihapus'
            ], 401);
        }
    }
}
