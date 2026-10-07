CREATE TABLE IF NOT EXISTS peminjaman (
    id SERIAL PRIMARY KEY,
    anggota_id INTEGER NOT NULL,
    buku_id INTEGER NOT NULL,
    tanggal_pinjam DATE NOT NULL DEFAULT CURRENT_DATE,
    tanggal_kembali DATE,
    status VARCHAR(20) NOT NULL DEFAULT 'dipinjam',
    CONSTRAINT fk_peminjaman_anggota
        FOREIGN KEY (anggota_id) REFERENCES anggota(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_peminjaman_buku
        FOREIGN KEY (buku_id) REFERENCES buku(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);