<div class="row">
	<div class="col-md-12">
		<div id="disepir">
			<?= $this->session->flashdata('alert') ?>
		</div>
	</div>
	<div class="col-md-12">
		<div class="white_shd full margin_bottom_30">
			<div class="full progress_bar_inner">
				<div class="row">
					<div class="col-md-12">
						<div class="full">
							<div class="padding_infor_info">
								<button type="button" class="model_bt btn btn-primary" data-toggle="modal"
									data-target="#myModal">Tambah Divisi</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="myModal">
				<div class="modal-dialog modal-lg" role="document">
					<form action="<?= site_url('admin/divisi/simpan') ?>" method="post" enctype='multipart/form-data'>
						<div class="modal-content ">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Tambah Divisi</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">

								<div class="col mb-3">
									<label class="form-label">Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Nama" required />
								</div>
								<div class="col mb-3">
									<label class="form-label">Profil</label>
									<textarea name="profil" class="form-control" required></textarea>
								</div>
                                <div class="col mb-3">
									<label class="form-label">Instagram</label>
									<input type="text" name="instagram" class="form-control" placeholder="Instagram" required />
								</div>
								<div class="col mb-3">
									<label class="form-label">Logo (1:1)</label>
									<input type="file" name="logo" class="form-control"
										accept="image/png, image/jpg, image/jpeg" required />
								</div>



							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary"
									data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="table_section padding_infor_info">
				<div class="table-responsive-sm">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Profil</th>
								<th>Instagram</th>
								<th>Logo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($divisi as $d) { ?>


							<tr>
								<td><?= $no ?></td>
								<td><?= $d['nama_divisi'] ?></td>
								<td><?= $d['profil'] ?></td>
								<td><?= $d['instagram'] ?></td>
								<td>
									<a href="<?= site_url('assets/upload/divisi/').$d['foto'] ?>" target="_blank">
										<span class="fa fa-search"></span>Lihat Foto
									</a>
								</td>

								<td>
									<a href="<?= site_url('admin/divisi/delete_data/' . $d['foto']); ?>"
										class="btn btn-sm btn-danger"
										onClick="return confirm('Apakah anda yakin menghapus data ini')"><span
											class="fa fa-trash"> </span>
									</a> |
									<button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
										data-target="#edit<?= $no ?>">
										<span class="fa fa-edit"></span>
									</button>

									<div class="modal fade" id="edit<?= $no ?>">
										<div class="modal-dialog modal-md" role="document">
											<form action="<?= site_url('admin/divisi/update') ?>" method="post"
												enctype='multipart/form-data'>
												<input type="hidden" name="nama_baru" value="<?= $d['foto'] ?>">
												<div class="modal-content ">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title"><?= $d['nama_divisi'] ?></h4>
														<button type="button" class="close"
															data-dismiss="modal">&times;</button>
													</div>
													<!-- Modal body -->
													<div class="modal-body">

														<div class="col mb-3">
															<label class="form-label">Nama</label>
															<input type="text" name="nama" class="form-control"
																value="<?= $d['nama_divisi'] ?>" />
														</div>
														<div class="col mb-3">
															<label class="form-label">Profil</label>
                                                            <textarea name="profil" class="form-control"><?= $d['profil'] ?></textarea>
														</div>
                                                        <div class="col mb-3">
															<label class="form-label">Instagram</label>
															<input type="text" name="instagram" class="form-control"
																value="<?= $d['instagram'] ?>" />
														</div>
														<div class="col mb-3">
															<label class="form-label">logo (1:1)</label>
															<input type="file" name="logo" class="form-control"
																accept="image/png, image/jpeg, image/,jpg" />
														</div>


													</div>
													<!-- Modal footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary"
															data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</td>
							</tr>

							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
