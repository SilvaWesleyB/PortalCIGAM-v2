<?= $this->extend('thema/layout') ?>

<?= $this->section('content') ?>
<?php $urlTranslate = base_url('dist/plugins/datatables/pt_bt.json') ?>
<input class="urlt" value="<?= $urlTranslate ?>" hidden>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-kaaba"></i> Kanban</h2>
            </div>
            <!-- /.card-header -->

            <div class="card-body kanban">

                <section class="content pb-3">
                    <div class="card-group h-100">

                        <div class="card card-row card-primary">
                            <div class="card-header bg-danger d-flex">
                                <h3 class="card-title mr-auto">
                                    Tarefas a Fazer
                                </h3>
                                <a href="#">
                                    <i class="fas fa-plus mr-0"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <?php foreach ($task as $data) : ?>
                                    <?php if ($data['Status'] == 't') : ?>
                                        <div class="card card-danger card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title" data-id="<?= $data['ID'] ?>" data-status="<?= $data['Status'] ?>"><?= $data['Title'] ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p><?= $data['Descricao'] ?></p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <div class="card-tools">
                                                    <a href="#" class="btn btn-tool">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-tool">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="card card-row card-default">
                            <div class="card-header bg-info d-flex">
                                <h3 class="card-title mr-auto">
                                    Em Execução
                                </h3>
                                <a href="#">
                                    <i class="fas fa-plus mr-0"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <?php foreach ($task as $data) : ?>
                                    <?php if ($data['Status'] == 'e') : ?>
                                        <div class="card card-info card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title" data-id="<?= $data['ID'] ?>" data-status="<?= $data['Status'] ?>"><?= $data['Title'] ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p><?= $data['Descricao'] ?></p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <div class="card-tools">
                                                    <a href="#" class="btn btn-tool">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-tool">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="card card-row card-success">
                            <div class="card-header d-flex">
                                <h3 class="card-title mr-auto">
                                    Completo
                                </h3>
                                <a href="#">
                                    <i class="fas fa-plus mr-0"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <?php foreach ($task as $data) : ?>
                                    <?php if ($data['Status'] == 'c') : ?>
                                        <div class="card card-success card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title" data-id="<?= $data['ID'] ?>" data-status="<?= $data['Status'] ?>"><?= $data['Title'] ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p><?= $data['Descricao'] ?></p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <div class="card-tools">
                                                    <a href="#" class="btn btn-tool">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.card-body -->
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