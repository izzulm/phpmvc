<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if(is_array($data['mhs'])) : ?>
            <?php foreach( $data['mhs'] as $mhs ) : ?>
                <ul type="circle">
                    <li><?= $mhs['nama']; ?></li>
                    <li><?= $mhs['nim']; ?></li>
                    <li><?= $mhs['email']; ?></li>
                    <li><?= $mhs['jurusan']; ?></li>
                </ul>
            <?php endforeach ?> 
        <?php endif ?>
        <?php 
        echo $data['mhs'];
         ?>

        </div>
    </div>

</div>