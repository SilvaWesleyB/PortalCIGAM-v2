<?= $this->extend('thema/layout') ?>

<?= $this->section('content') ?>
<?php $urlTranslate = base_url('dist/plugins/datatables/pt_bt.json') ?>
<input class="urlt" value="<?= $urlTranslate ?>" hidden>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-gradient-info">
                            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Bookmarks</span>
                                <span class="info-box-number">41,410</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-gradient-success">
                            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-gradient-warning">
                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-gradient-danger">
                            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Comments</span>
                                <span class="info-box-number">41,410</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-th-list"></i> Lista de Usuários</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbUsers" class="table table-hover table-bordered table-striped compact display" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USUÁRIO</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>ACESSO</th>
                            <th>EMPRESA</th>
                            <th>CONTATO</th>
                            <th>EMAIL</th>
                            <th>UN. DE NEGOCIO</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- Modal para editar/Inserir User-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Titulo Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Login:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Contato:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Empresa:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Unidade de negocio:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Senha Inicial:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Tipo de Acesso:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--
<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    
    <div class="card-body">
        
    </div>

    <div class="card-footer">

    </div>
</div>
-->

<?= $this->endSection('content') ?>