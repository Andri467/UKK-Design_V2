<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'todolists';
    protected $fillable = ['user_id', 'nama_tugas', 'status_tugas'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dashboard()
    {
    $users = User::all(); // Fetch all users (you can filter this as needed)
    $todolists = Todolist::where('user_id', auth()->id())->get();
    $hariIni = now()->format('d F Y');

    return view('dashboard', compact('users', 'todolists', 'hariIni'));
    }
}
