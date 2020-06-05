<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
		<?= $this->session->flashdata('message'); ?>

		<!-- data table -->
		<? foreach ($prokers as $proker) : ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Data Image Proker</h6>
			</div>
			<div class="card-body mb-4 p-4">
				<!-- input form -->
				<?= form_open_multipart('Manage_Proker/update') ?>
				<div class="form-group">
					<label for="id_image">Id</label>
					<input name="id" type="text" class="form-control" id="id_image" value="<?= $proker['id']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="img">Upload Image</label>
					<div class="custom-file">
						<input name="img" type="file" class="form-control" id="upload-image" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input name="slug" type="text" class="form-control" id="slug" value="<?= $proker['slug']; ?>">
				</div>
				<div class="form-group">
					<label for="text">Text</label>
					<input name="text" type="text" class="form-control" id="text" value="<?= $proker['text']; ?>">
				</div>


				<button type="submit" class="btn btn-primary">Save</button>
				<?= form_close(); ?><br>
			</div>

		</div>

		<? endforeach; ?>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
