<div class="container">

   <div class="row mt-3">
      <div class="col-md-6">
         <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
      </div>
   </div>

   <div class="row mt-3">
      <div class="col-md-6">
         <form action="" method="POST">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="cari data mahasiswa..." name="keyword">
               <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <div class="row mt-3">
      <div class="col-md-6">
         <h3>Daftar Mahasiswa</h3>

         <?php if ($this->session->flashdata('message')) : ?>
            <div class="row">
               <div class="col">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     Data mahasiswa <strong>berhasil <?= $this->session->flashdata('message'); ?>!</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               </div>
            </div>
         <?php endif; ?>

         <?php if (empty($mahasiswa)) : ?>
            <div class="alert alert-dark" role="alert">
               Data mahasiswa <strong>tidak ditemukan!</strong>!
            </div>
         <?php endif; ?>

         <ul class="list-group">
            <?php foreach ($mahasiswa as $mhs) : ?>
               <li class="list-group-item">
                  <?= $mhs['nama']; ?>
                  <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onClick="return confirm('Yakin? data akan dihapus!')">hapus</a>
                  <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-warning float-right">ubah</a>
                  <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-info float-right">detail</a>
               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   </div>

</div>