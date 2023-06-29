<?php
// Home
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
});

// Warga Index
Breadcrumbs::for('admin.warga.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.warga.index'));
});

// Warga Add
Breadcrumbs::for('admin.warga.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.warga.index'));
    $trail->push('Tambah Warga', route('admin.warga.create'));
});
// Warga Index
Breadcrumbs::for('admin.warga.restore', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.warga.index'));
    $trail->push('Warga-restore', route('admin.warga.restore'));
});

// Warga Edit
Breadcrumbs::for('admin.warga.edit', function ($trail, $warga) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.warga.index'));
    $trail->push('Edit Warga', route('admin.warga.edit', $warga));
});

// Warga Show
Breadcrumbs::for('admin.warga.show', function ($trail, $warga) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.warga.index'));
    $trail->push('Lihat Warga', route('admin.warga.show', $warga));
});

// Perkebunan Index
Breadcrumbs::for('admin.perkebunan.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Perkebunan', route('admin.perkebunan.index'));

});

Breadcrumbs::for('admin.perkebunan.restore', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Perkebunan', route('admin.perkebunan.index'));
    $trail->push('Perkebunan-restore', route('admin.perkebunan.restore'));
});

// perkebunan Add
Breadcrumbs::for('admin.perkebunan.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Perkebunan', route('admin.perkebunan.index'));
    $trail->push('Tambah Perkebunan', route('admin.perkebunan.create'));
});

// Warga Edit
Breadcrumbs::for('admin.perkebunan.edit', function ($trail, $perkebunan) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.perkebunan.index'));
    $trail->push('Edit Perkebunan', route('admin.perkebunan.edit', $perkebunan));
});

// Warga Show
Breadcrumbs::for('admin.perkebunan.show', function ($trail, $perkebunan) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Warga', route('admin.perkebunan.index'));
    $trail->push('Lihat Warga', route('admin.perkebunan.show', $perkebunan));
});

// Pengumuman Index
Breadcrumbs::for('admin.pengumuman.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Pengumuman', route('admin.pengumuman.index'));
});

// pengumuman Add
Breadcrumbs::for('admin.pengumuman.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Pengumuman', route('admin.pengumuman.index'));
    $trail->push('Tambah Pengumuman', route('admin.pengumuman.create'));
});

// Pengumuman Edit
Breadcrumbs::for('admin.pengumuman.edit', function ($trail, $pengumuman) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Pengumuman', route('admin.pengumuman.index'));
    $trail->push('Edit Pengumuman', route('admin.pengumuman.edit', $pengumuman));
});

// Pengumuman Show
Breadcrumbs::for('admin.pengumuman.show', function ($trail, $pengumuman) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Pengumuman', route('admin.pengumuman.index'));
    $trail->push('Lihat pengumuman', route('admin.pengumuman.show', $pengumuman));
});

// Kontak Index
Breadcrumbs::for('admin.kontak.show', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('kontak', route('admin.kontak.show'));
});

// Komentar Index
Breadcrumbs::for('admin.komentar.show', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('komentar', route('admin.komentar.show'));
});


// Paralax Index
Breadcrumbs::for('admin.paralax.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Paralax', route('admin.paralax.index'));
});

// paralax Add
Breadcrumbs::for('admin.paralax.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Paralax', route('admin.paralax.index'));
    $trail->push('Tambah Paralax', route('admin.paralax.create'));
});

// Paralax Edit
Breadcrumbs::for('admin.paralax.edit', function ($trail, $paralax) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Paralax', route('admin.paralax.index'));
    $trail->push('Edit Paralax', route('admin.paralax.edit', $paralax));
});

// Slider Index
Breadcrumbs::for('admin.slider.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Slider', route('admin.slider.index'));
});

// Slider Add
Breadcrumbs::for('admin.slider.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Slider', route('admin.slider.index'));
    $trail->push('Tambah Slider', route('admin.slider.create'));
});

// Slider Edit
Breadcrumbs::for('admin.slider.edit', function ($trail, $slider) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Slider', route('admin.slider.index'));
    $trail->push('Edit Slider', route('admin.slider.edit', $slider));
});


// Profil Index
Breadcrumbs::for('admin.profil.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Profil', route('admin.profil.index'));
});

// Profil Add
Breadcrumbs::for('admin.profil.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Profil', route('admin.profil.index'));
    $trail->push('Tambah Profil', route('admin.profil.create'));
});

// Profil Edit
Breadcrumbs::for('admin.profil.edit', function ($trail, $profil) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Profil', route('admin.profil.index'));
    $trail->push('Edit Profil', route('admin.profil.edit', $profil));
});

//kategori surat
Breadcrumbs::for('admin.kategori-surat.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori-Surat', route('admin.kategori-surat.index'));
});

// kategori-surat add
Breadcrumbs::for('admin.kategori-surat.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori-Surat', route('admin.kategori-surat.index'));
    $trail->push('Tambah Kategori', route('admin.kategori-surat.create'));
});

// Kategori Surat Edit
Breadcrumbs::for('admin.kategori-surat.edit', function ($trail, $kategoriSurat) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori-Surat', route('admin.kategori-surat.index'));
    $trail->push('Edit Kategori', route('admin.kategori-surat.edit', $kategoriSurat));
});

//surat 
Breadcrumbs::for('admin.arsip-surat.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('arsip-surat-masuk', route('admin.arsip-surat.index'));
});
Breadcrumbs::for('admin.arsip-surat.keluar', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('arsip-surat-keluar', route('admin.arsip-surat.keluar'));
});
// kategori-surat add
Breadcrumbs::for('admin.arsip-surat.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Tambah-Arsip', route('admin.arsip-surat.create'));
});

// Kategori Surat Edit
Breadcrumbs::for('admin.arsip-surat.edit', function ($trail, $arsipSurat) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Surat', route('admin.arsip-surat.index'));
    $trail->push('Edit Kategori', route('admin.arsip-surat.edit', $arsipSurat));
});


