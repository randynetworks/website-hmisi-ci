<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
		<?= $this->session->flashdata('message'); ?>

		<button class="btn btn-primary" data-toggle="modal" data-target="#add-data"><i class="fa fa-plus"> Add News</i></button>

		<br><br>
		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Table Berita HMISI per tanggal <?= date('d F Y') ?> </h6>
			</div>
			<div class="card-body mb-4 p-4">
				<div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>slug</th>
								<th>create By</th>
								<th>time</th>
								<th>title</th>
								<th>text</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<?
                            foreach ($news as $new) : ?>
							<tr>
								<td class="align-middle"><?= ++$start; ?></td>
								<td class="align-middle"><img height="100px" width="100px" src="<?= base_url('assets/img/news-img/') . $new['img']; ?>" alt=""></td>
								<td class="align-middle"><?= $new['slug']; ?></td>
								<td class="align-middle"><?= $new['create_by']; ?></td>
								<td class="align-middle"><?= $new['time']; ?></td>
								<td class="align-middle"><?= $new['title']; ?></td>
								<td class="align-middle"><?= $new['text']; ?></td>
								<td class="align-middle">
									<?= anchor('Manage_Berita/edit/' . $new['id'], '<button class="btn btn-primary"><i class="far fa-edit"> Edit</i></button>'); ?>
									|
									<?= anchor('Manage_Berita/hapus/' . $new['id'], '<button onclick="javascript: return confirm(\'want to delete?\')" class="btn btn-danger"><i class="far fa-trash-alt"> Del</i></button>'); ?>

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

	<!-- Modal -->
	<div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="add-data-berita" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add-data-berita">Input Data Berita HMISI</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- input form -->
					<?= form_open_multipart('Manage_Berita/create') ?>
					<div class="card shadow">
						<div class="card-body mb-4 p-4">
							<div class="form-group">
								<label for="img">Upload Image</label>
								<div class="custom-file">
									<input name="img" type="file" class="form-control" id="upload-image">
								</div>
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input name="slug" type="text" class="form-control" id="slug" placeholder="Please Input slug.">
							</div>
							<div class="form-group">
								<label for="create_by">Create By</label>
								<input name="create_by" type="text" class="form-control" id="create_by" placeholder="Please Input your name.">
							</div>
							<div class="form-group">
								<label for="title">Title</label>
								<input name="title" type="text" class="form-control" id="title" placeholder="Please Input title.">
							</div>
							<div class="form-group">
								<label for="text">Text</label>
								<input name="text" type="text" class="form-control" id="text" placeholder="Please Input Text.">
							</div>
							<div>
								<button type="submit" class="btn btn-primary"><i class="far fa-save"> Submit</i></button>
								<button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"> Reset</i></button>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- End of Main Content -->
