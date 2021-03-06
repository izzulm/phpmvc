<div class="container mt-3">

  <div class="row">
    <div class="col-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Mahasiswa
      </button>
    </div>
  </div>

  <!--   Tombol Search -->
  <div class="row mb-2">
    <div class="col-6">
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keywordCari" id="keywordCari" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <h3>Daftar Mahasiswa</h3>
      <ul class="list-group">
        <?php foreach( $data['mhs'] as $mhs ) : ?>
          <li class="list-group-item " ><?= $mhs['nama']; ?>
          <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge bg-danger float-end ms-1 text-decoration-none" id="cek-hover" onclick="return confirm('yakin?');" >Hapus</a>
          <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge bg-success float-end ms-1 text-decoration-none tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
          <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary float-end ms-1 text-decoration-none">Detail</a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-floating">
            <select class="form-select" id="jurusan" name="jurusan" aria-label="Floating label select example">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Industri"> Teknik Industri </option>
              <option value="Teknik Planologi"> Teknik Planologi </option>
              <option value="Teknik Arsitekture"> Teknik Arsitekture</option>
            </select>
            <label for="jurusan">Pilih Jurusan</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>