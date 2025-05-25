@extends('layouts.master')
@section('title', 'Semua Berita')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8 pt-20">Berita & Artikel</h1>

    <form id="searchFilterForm" method="GET" class="flex flex-wrap gap-2 mb-4">
        <input type="text" name="search" placeholder="Cari berita"
               value="{{ request('search') }}"
               class="flex-1 px-4 py-2 rounded border border-gray-300 w-full md:w-auto">

        <select name="category_berita_id" class="px-4 py-2 rounded border border-gray-300 w-full md:w-auto">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ request('category_berita_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="berita-lainnya">
        @include('berita._list', ['beritas' => $beritas])
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('searchFilterForm');
        const beritaContainer = document.querySelector('.berita-lainnya');

        form.querySelectorAll('input[name="search"], select[name="category_berita_id"]').forEach(el => {
            el.addEventListener('input', handleFormChange);
            el.addEventListener('change', handleFormChange);
        });

        function handleFormChange() {
            const formData = new FormData(form);
            const query = new URLSearchParams(formData).toString();

            fetch(`{{ route('berita.all') }}?${query}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                beritaContainer.innerHTML = html;
                bindPaginationLinks();
            });
        }

        function bindPaginationLinks() {
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.href;

                    fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.text())
                    .then(html => {
                        beritaContainer.innerHTML = html;
                        bindPaginationLinks();
                    });
                });
            });
        }

        bindPaginationLinks();
    });
</script>
@endsection
