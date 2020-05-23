<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <!-- input form -->
        <form>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Member HMISI</h6>
                </div>
                <div class="card-body mb-4 p-4">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Please Input Full Name Member.">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" placeholder="Please Input Department">
                    </div>
                    <div class="form-group">

                        <label for="department">Upload Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload-image">
                            <label class="custom-file-label" for="upload-image">Choose file</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"> Submit</i></button>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-redo-alt"> Reset</i></button>
                    </div>
                </div>
            </div>
        </form>

        <br><br>
        <!-- data table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Table Admin website HMISI per tanggal <?= date('d F Y') ?> </h6>
            </div>
            <div class="card-body mb-4 p-4">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            foreach ($members as $member) : ?>
                                <tr>
                                    <td class="align-middle"><?= ++$start; ?></td>
                                    <td class="align-middle"><img height="100px" width="100px" src="<?= base_url('assets/img/SO/') . $member['img']; ?>" alt=""></td>
                                    <td class="align-middle"><?= $member['nama-lengkap']; ?></td>
                                    <td class="align-middle"><?= $member['jabatan']; ?></td>
                                    <td class="align-middle">
                                        <button class="btn btn-primary"><i class="far fa-edit"> Edit</i></button> |
                                        <button class="btn btn-danger"><i class="far fa-trash-alt"> Del</i></button>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->