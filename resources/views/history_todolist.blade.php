@extends('layouts.app')
@section('title', 'Riwayat To-do List')
@section('header')
<h1 style="text-align: center; color: #fff;">Riwayat To-do List</h1>
@endsection
@section('content')
    <p class="text-center mb-4" style="color: #fff; font-size: 1.2rem;">
        Berikut adalah semua tugas yang pernah Anda buat:
    </p>
    <table class="table table-hover shadow-sm animate__animated animate__fadeInUp" style="border-radius: 10px; overflow: hidden; background: rgba(255, 255, 255, 0.9);">
        <thead style="background-color: #0077b6; color: #fff;">
            <tr>
                <th style="border-top-left-radius: 10px;">No</th>
                <th>Nama Tugas</th>
                <th>Status</th>
                <th style="border-top-right-radius: 10px;">Tanggal & Waktu Tugas</th>
            </tr>
        </thead>
        <tbody style="background-color: #f8f9fa;">
            @foreach ($todolists as $index => $todolist)
                <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $todolist->nama_tugas }}</td>
                    <td>
                        @if ($todolist->status_tugas == 'pending')
                            <span class="badge rounded-pill" style="background-color: #ffc107; color: #000;">Pending</span>
                        @else
                            <span class="badge rounded-pill" style="background-color: #198754; color: #fff;">Completed</span>
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($todolist->created_at)->translatedFormat('l, d F Y H:i:s') }} WIB
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}"
            class="btn rounded-pill animate__animated animate__fadeInUp"
            style="background-color: #48cae4; color: #fff; border: none; transition: all 0.3s ease; padding: 0.75rem 1.5rem;">
            Kembali ke Dashboard
        </a>
    </div>
@endsection