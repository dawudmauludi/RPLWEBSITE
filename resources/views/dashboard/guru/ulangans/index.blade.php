@extends('layouts.masterDashboard')

@section('title', 'Daftar Ulangan')

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-3 border-0">

                {{-- Header --}}
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-clipboard-list me-2"></i> Daftar Ulangan
                    </h4>

                    @role('guru|admin')
                        <a href="{{ route('ulangans.create') }}" class="btn btn-light text-white fw-semibold">
                            <i class="fas fa-plus me-1"></i> Tambah Ulangan
                        </a>
                    @endrole
                </div>

                {{-- Body --}}
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Judul</th>
                                    <th>Kelas</th>
                                    <th>Pembuat</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            @forelse($ulangans as $ulangan)
                                    <tr>
                                        <td>{{ $loop->iteration + ($ulangans->currentPage() - 1) * $ulangans->perPage() }}</td>
                                        <td class="fw-semibold">{{ $ulangan->judul }}</td>
                                        <td>{{ $ulangan->kelas->nama ?? '-' }}</td>
                                        <td>{{ $ulangan->creator->nama ?? '-' }}</td>
                                        <td>{{ $ulangan->mulai->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</td>
                                        <td>{{ $ulangan->selesai->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge bg-{{
                                                $ulangan->status === 'Sedang Berlangsung' ? 'success' :
                                                ($ulangan->status === 'Belum Dimulai' ? 'warning' : 'secondary')
                                            }}">
                                                {{ $ulangan->status === 'Belum Dimulai' ? $ulangan->status : $ulangan->status }}
                                            </span>
                                            <br>
                                            <span class="badge bg-{{ $ulangan->is_active ? 'success' : 'danger' }}">
                                                {{ $ulangan->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('ulangans.show', $ulangan) }}" class="btn btn-sm btn-info" title="Lihat">
                                                     <i data-feather="eye" class="w-4 h-4"></i>
                                                </a>

                                                @if( Auth::user()->hasRole('admin') || $ulangan->created_by == Auth::user()->id)
                                                    @if (now() < $ulangan->mulai )
                                                        <a href="{{ route('ulangans.edit', $ulangan) }}" class="btn btn-sm btn-warning" title="Edit">
                                                            <i data-feather="edit" class="w-4 h-4"></i>
                                                        </a>
                                                    @elseif (now() > $ulangan->selesai)
                                                        <a href="{{ route('ulangans.edit', $ulangan) }}" class="btn btn-sm btn-warning" title="Edit">
                                                            <i data-feather="edit" class="w-4 h-4"></i>
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('ulangans.toggle-active', $ulangan) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm {{ $ulangan->is_active ? 'btn-secondary' : 'btn-success' }}" title="Toggle Aktif">
                                                            <i data-feather="{{ $ulangan->is_active ? 'pause' : 'play' }}" class="w-4 h-4"></i>
                                                        </button>
                                                    </form>

                                                    @if (now() < $ulangan->mulai)
                                                        <form action="{{ route('ulangans.destroy', $ulangan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ulangan ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                                <i data-feather="trash" class="w-4 h-4"></i>
                                                            </button>
                                                        </form>
                                                    @elseif (now() > $ulangan->selesai)
                                                        <form action="{{ route('ulangans.destroy', $ulangan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ulangan ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                                <i data-feather="trash" class="w-4 h-4"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-muted text-center">Tidak ada data ulangan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $ulangans->links() }}
                    </div>

                </div> {{-- End Card Body --}}
            </div> {{-- End Card --}}
        </div>
    </div>
</div>
@endsection
