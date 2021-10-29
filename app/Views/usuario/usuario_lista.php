<?= $this->extend('thema/layout') ?>

<?= $this->section('content') ?>
<?php $urlTranslate = base_url('dist/plugins/datatables/pt_bt.json') ?>
<input class="urlt" value="<?= $urlTranslate ?>" hidden>
<!-- Tabela Listagem Ususários -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2 class="card-title mr-auto">
                    <i class="fas fa-th-list"></i>
                    Lista de Usuários
                </h2>

                <div class="actions pull-right botoes">
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle " type="button" id="menuBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-print"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuBtn" id="opcoes">
                            <div class="dropdown-item">
                                <a class="tool-action" href="javascript:;" data-action="0"><i class="fas fa-print"></i> Imprimir</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="tool-action" href="javascript:;" data-action="1"><i class="fas fa-file-pdf"></i> PDF</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="tool-action" href="javascript:;" data-action="2"><i class="fas fa-file-excel"></i> Excel</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="tool-action" href="javascript:;" data-action="3"><i class="fas fa-file-csv"></i> CSV</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="tbUsers" class="table table-hover table-bordered table-striped compact display" width="100%">
                    <thead>
                        <tr>
                            <th></th>
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
        </div>
    </div>
    <!-- Tabela Listagem Ususários -->

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
    <!-- Modal para editar/Inserir User-->
</div>
<?= $this->endSection('content') ?>