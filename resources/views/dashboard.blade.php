@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Personalized Welcome Message -->
                <h3 class="text-center mb-4 animate__animated animate__fadeInDown" style="color: #fff;">
                    @php
                        // Get the current hour
                        $hour = now()->hour;

                        // Determine the greeting based on the time of day
                        if ($hour < 12) {
                            $greeting = "Selamat Pagi";
                        } elseif ($hour < 18) {
                            $greeting = "Selamat Siang";
                        } else {
                            $greeting = "Selamat Malam";
                        }

                        // Get the authenticated user's name (replace 'name' with your actual user attribute)
                        $userName = auth()->user()->name ?? 'Pengguna';
                    @endphp
                    {{ $greeting }}, <strong>{{ $userName }}</strong>!
                </h3>

                <!-- Header -->
                <h4 class="text-center mb-4" style="color: #fff;">
                    To-Do List Hari ini: <strong>{{ $hariIni }} WIB</strong>
                </h4>

                <!-- Add Task Form -->
                <form action="{{ route('todolist.store') }}" method="POST" class="mb-4 animate__animated animate__fadeInUp">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="nama_tugas" class="form-control form-control-lg rounded-pill"
                            placeholder="Tambahkan Tugas Baru" required
                            style="background-color: rgba(255, 255, 255, 0.9); border: 1px solid #ced4da; transition: all 0.3s ease;">
                        <button type="submit" class="btn btn-primary rounded-pill ms-2"
                            style="background-color: #0077b6; border-color: #0077b6; color: #fff; transition: all 0.3s ease;">
                            Tambah
                        </button>
                    </div>
                </form>

                <!-- View History Button -->
                <a href="{{ route('todolist.history') }}"
                    class="btn w-100 rounded-pill mb-4 animate__animated animate__fadeInUp"
                    style="background-color: #48cae4; color: #fff; border: none; transition: all 0.3s ease;">
                    Lihat Riwayat To-Do List
                </a>

                <!-- To-Do List Table -->
                <table class="table table-hover shadow-sm animate__animated animate__fadeInUp" style="border-radius: 10px; overflow: hidden; background: rgba(255, 255, 255, 0.9);">
                    <thead style="background-color: #0077b6; color: #fff;">
                        <tr>
                            <th>No</th>
                            <th>Nama Tugas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff;">
                        @foreach ($todolists as $index => $todolist)
                            <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $todolist->nama_tugas }}</td>
                                <td>
                                    <form action="{{ route('todolist.update', $todolist->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status_tugas" class="form-select form-select-sm rounded-pill"
                                            onchange="this.form.submit()"
                                            style="background-color: #f8f9fa; border: 1px solid #ced4da; transition: all 0.3s ease;">
                                            <option value="pending" {{ $todolist->status_tugas == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="completed" {{ $todolist->status_tugas == 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('todolist.edit', $todolist->id) }}"
                                        class="btn btn-warning btn-sm rounded-pill me-2"
                                        style="background-color: #ffc107; color: #000; border: none; transition: all 0.3s ease;">
                                        Edit
                                    </a>
                                    <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                                            style="background-color: #dc3545; border: none; transition: all 0.3s ease;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn w-100 rounded-pill mt-4 animate__animated animate__fadeInUp"
                        style="background-color: #023e8a; color: #fff; border: none; transition: all 0.3s ease;">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Animate.css Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection