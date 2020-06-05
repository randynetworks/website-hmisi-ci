<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
		<?= $this->session->flashdata('message'); ?>

		<!-- data table -->
		<? foreach ($news as $new) : ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Berita <?= $new['title']; ?></h6>
			</div>
			<div class="card-body mb-4 p-4">
				<!-- input form -->
				<?= form_open_multipart('Manage_Berita/update') ?>
				<div class="form-group">
					<label for="img">Upload Image</label>
					<div class="custom-file">
						<input name="img" type="file" class="form-control" id="upload-image" value="<?= $new['img']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input name="slug" type="text" class="form-control" id="slug" value="<?= $new['slug']; ?>">
				</div>
				<div class=" form-group">
					<label for="create_by">Create By</label>
					<input name="create_by" type="text" class="form-control" id="create_by" value="<?= $new['create_by']; ?>">
				</div>
				<div class=" form-group">
					<label for="title">Title</label>
					<input name="title" type="text" class="form-control" id="title" value="<?= $new['title']; ?>">
				</div>
				<div class=" form-group">
					<label for="text">Text</label>
					<textarea name="text" class="form-control"><?= $new['text']; ?></textarea>
				</div>

				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Save</button>
				<?= form_close(); ?>

			</div>
		</div>

	</div>
	<? endforeach ?>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
