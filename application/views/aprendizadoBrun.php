<?php $this->load->view('template/menu'); ?>

<section class="ng-scope">
    <!-- Page content-->
    <!-- uiView: --><div class="content-wrapper ng-scope ng-fadeInUp" ui-view="" autoscroll="false" ng-class="app.viewAnimation" style=""><div class="pull-right ng-scope"><a class="btn btn-sm btn-success" href="#!/app/person/new"><i class="fa fa-plus-circle"></i><span class="hidden-xs"> Criar nova</span></a>
        </div>
        <h3 class="ng-scope">Listagem de Empresas &amp; Pessoas
            <small>Listagem geral</small>
        </h3>
        <div class="panel panel-default ng-scope">
            <div class="panel-heading"><i class="fa fa-filter"></i> Opções de Filtro</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="control-label">Termo de pesquisa (Nome)</label>
                            <div class="input-group">
                                <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="ctrl.filter.value" ng-enter="ctrl.getAll(1)">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" ng-click="ctrl.getAll(1)"><i class="fa fa-search"></i>
                                        <span class="hidden-xs">Aplicar filtro</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default ng-scope" ng-init="ctrl.getAll(1);">
            <div class="panel-heading"><i class="fa fa-list-alt"></i> Resultado da Pesquisa</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th width="120">CPF</th>
                                    <th>Nome</th>
                                    <th width="200">E-mail</th>
                                    <th width="140">Telefone Fixo</th>
                                    <th width="140">Telefone Celular</th>
                                    <th class="text-center" width="90">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ngIf: !(ctrl.items) -->
                                <!-- ngIf: (ctrl.items) && !(ctrl.items.records) -->
                                <!-- ngRepeat: item in ctrl.items.records --><tr ng-repeat="item in ctrl.items.records" class="ng-scope" style="">
                                    <td class="text-middle text-center ng-binding">256.672.528-48</td>
                                    <td class="text-middle ng-binding">DALVA NAMIE TAKEDA</td>
                                    <td class="text-middle ng-binding"></td>
                                    <td class="text-middle text-center ng-binding"></td>
                                    <td class="text-middle text-center ng-binding">(13) 99743-4871</td>
                                    <td class="text-middle text-center"><a class="btn btn-xs btn-warning" href="#!/app/person/new?id=5c755c8c37799168a01601c1"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: item in ctrl.items.records --><tr ng-repeat="item in ctrl.items.records" class="ng-scope">
                                    <td class="text-middle text-center ng-binding">159.194.548-81</td>
                                    <td class="text-middle ng-binding">IRENE DE LOURDES SANTOS LEAL</td>
                                    <td class="text-middle ng-binding"></td>
                                    <td class="text-middle text-center ng-binding"></td>
                                    <td class="text-middle text-center ng-binding"></td>
                                    <td class="text-middle text-center"><a class="btn btn-xs btn-warning" href="#!/app/person/new?id=5c755c8c37799168a01601c2"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: item in ctrl.items.records --><tr ng-repeat="item in ctrl.items.records" class="ng-scope">
                                    <td class="text-middle text-center ng-binding">196.581.178-72</td>
                                    <td class="text-middle ng-binding">JOSE IVO SOARES DE BRITO</td>
                                    <td class="text-middle ng-binding">naotem@naotem.com.br</td>
                                    <td class="text-middle text-center ng-binding">32388043</td>
                                    <td class="text-middle text-center ng-binding">(09) 8126-9033</td>
                                    <td class="text-middle text-center"><a class="btn btn-xs btn-warning" href="#!/app/person/new?id=5c755c8c37799168a01601c3"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: item in ctrl.items.records --><tr ng-repeat="item in ctrl.items.records" class="ng-scope">
                                    <td class="text-middle text-center ng-binding">270.180.868-50</td>
                                    <td class="text-middle ng-binding">DAVID DOS SANTOS SILVA</td>
                                    <td class="text-middle ng-binding"></td>
                                    <td class="text-middle text-center ng-binding"></td>
                                    <td class="text-middle text-center ng-binding"></td>
                                    <td class="text-middle text-center"><a class="btn btn-xs btn-warning" href="#!/app/person/new?id=5c755c8c37799168a01601c4"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: item in ctrl.items.records --><tr ng-repeat="item in ctrl.items.records" class="ng-scope">
                                    <td class="text-middle text-center ng-binding">040.476.978-00</td>
                                    <td class="text-middle ng-binding">MARCIO DA ROCHA SOARES</td>
                                    <td class="text-middle ng-binding">MARCIO.RO@IG.COM.BR</td>
                                    <td class="text-middle text-center ng-binding">33073723</td>
                                    <td class="text-middle text-center ng-binding">977053127</td>
                                    <td class="text-middle text-center"><a class="btn btn-xs btn-warning" href="#!/app/person/new?id=5c755c8c37799168a01601c5"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: item in ctrl.items.records -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Itens por página</label>
                            <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="ctrl.filter.limit" ng-change="ctrl.getAll(1)">
                                <!-- ngRepeat: qtd in ctrl.limit_options --><option value="5" ng-repeat="qtd in ctrl.limit_options" class="ng-binding ng-scope" selected="selected">5</option><!-- end ngRepeat: qtd in ctrl.limit_options --><option value="10" ng-repeat="qtd in ctrl.limit_options" class="ng-binding ng-scope">10</option><!-- end ngRepeat: qtd in ctrl.limit_options --><option value="30" ng-repeat="qtd in ctrl.limit_options" class="ng-binding ng-scope">30</option><!-- end ngRepeat: qtd in ctrl.limit_options --><option value="50" ng-repeat="qtd in ctrl.limit_options" class="ng-binding ng-scope">50</option><!-- end ngRepeat: qtd in ctrl.limit_options --><option value="100" ng-repeat="qtd in ctrl.limit_options" class="ng-binding ng-scope">100</option><!-- end ngRepeat: qtd in ctrl.limit_options -->
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 text-right hidden-xs">
                        <div class="form-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <!-- ngIf: (ctrl.items.pagination.prev) -->
                                        <li class="page-item"><a class="page-link ng-binding" href="#!/app/person/list">1/155</a>
                                        </li>
                                        <!-- ngIf: (ctrl.items.pagination.next) --><li class="page-item ng-scope" ng-if="(ctrl.items.pagination.next)" style=""><a class="page-link" href="#!/app/person/list" ng-click="ctrl.getAll(ctrl.items.pagination.next)">Próximo</a>
                                        </li><!-- end ngIf: (ctrl.items.pagination.next) -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 text-center hidden-sm hidden-md hidden-lg">
                        <div class="form-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <!-- ngIf: (ctrl.items.pagination.prev) -->
                                        <li class="page-item"><a class="page-link ng-binding" href="#!/app/person/list">1/155</a>
                                        </li>
                                        <!-- ngIf: (ctrl.items.pagination.next) --><li class="page-item ng-scope" ng-if="(ctrl.items.pagination.next)" style=""><a class="page-link" href="#!/app/person/list" ng-click="ctrl.getAll(ctrl.items.pagination.next)">Próximo</a>
                                        </li><!-- end ngIf: (ctrl.items.pagination.next) -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
</section>
<!-- Page footer-->
<!-- ngInclude: 'app/views/partials/footer.html' --><footer ng-include="'app/views/partials/footer.html'" class="ng-scope" style=""><span class="ng-binding ng-scope">© 2019 - BRÜN Isenções</span></footer></div>
<!-- /.content -->
<?php $this->load->view('template/footer'); ?>