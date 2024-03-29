@include('admin.header')

@include('admin.sidebar')

<div id="page-content-wrapper">
    <div id="page-content">

        <div class="container">

            <script type="text/javascript" src="assets/widgets/parsley/parsley.js"></script>
            <!-- Chosen -->

            <!--<link rel="stylesheet" type="text/css" href="assets/widgets/chosen/chosen.css">-->
            <script type="text/javascript" src="assets/widgets/chosen/chosen.js"></script>
            <script type="text/javascript" src="assets/widgets/chosen/chosen-demo.js"></script>

            <script type="text/javascript" src="assets/widgets/datepicker/datepicker.js"></script>
            <script type="text/javascript">
                /* Datepicker bootstrap */

                $(function() { "use strict";
                    $('.bootstrap-datepicker').bsdatepicker({
                        format: 'dd-mm-yyyy'
                    });
                });

            </script>

            <!-- jQueryUI Dialog -->

            <!--<link rel="stylesheet" type="text/css" href="assets/widgets/dialog/dialog.css">-->
            <script type="text/javascript" src="assets/widgets/dialog/dialog.js"></script>
            <script type="text/javascript" src="assets/widgets/dialog/dialog-demo.js"></script>

            <!--<link rel="stylesheet" type="text/css" href="assets/widgets/datatable/datatable.css">-->
            <script type="text/javascript" src="assets/widgets/datatable/datatable.js"></script>
            <script type="text/javascript" src="assets/widgets/datatable/datatable-bootstrap.js"></script>
            <script type="text/javascript" src="assets/widgets/datatable/datatable-responsive.js"></script>

            <script type="text/javascript">

                /* Datatables responsive */

                $(document).ready(function() {
                    $('#datatable-responsive-two').DataTable( {
                        responsive: true,
                        sort: false
                    } );
                } );

                $(document).ready(function() {
                    $('.dataTables_filter input').attr("placeholder", "Rechercher...");
                });

            </script>

            <script type="text/javascript">

                /* Datatables responsive */

                $(document).ready(function() {
                    $('#datatable-responsive').DataTable( {
                        responsive: true,
                        sort: false
                    } );
                } );

                $(document).ready(function() {
                    $('.dataTables_filter input').attr("placeholder", "Rechercher...");
                });

            </script>

            <div id="page-title">
                <h2>Gestion des categories</h2>
                <p>...</p>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">

                    </h3>
                    <div class="example-box-wrapper">
                        <ul class="nav-responsive nav nav-tabs"><li class="dropdown pull-right tabdrop active"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><i class="glyph-icon icon-align-justify"></i> <b class="caret"></b></a></li>
                            <li class="active"><a href="#tab1" data-toggle="tab">Ajout de categorie</a></li>  
                            <li class=""><a href="#tab2" data-toggle="tab">Répertoire des categories</a></li>   
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="panel-body">
                                    <h3 class="title-hero">

                                    </h3>
                                    <div class="example-box-wrapper">
                                        <form action="c_categorie_projet" method="post" class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Resume du titre</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="text" name="resume" class="form-control" required="">
                                                        </div>
                                                        @if($errors->has('resume'))
                                                        {<span style="color:red">{!!$errors->first('resume')!!}</span>}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Titre de la categorie</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="detail" class="form-control" required="">
                                                        </div>
                                                        @if($errors->has('detail'))
                                                        {<span style="color:red">{!!$errors->first('detail')!!}</span>}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="bg-default content-box text-center pad20A mrg25T">
                                                <input type="submit" name="oui" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-lg btn-default">Retour à la page précédente</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h3 class="title-hero">

                                        </h3>
                                        <div class="example-box-wrapper">
                                            <table id="datatable-responsive-two" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th hidden="hidden">ID</th>
                                                        <th style="text-align: center">Resume</th>
                                                        <th style="text-align: center">Libelle</th>
                                                        <th style="text-align: center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $Categorie = DB::table('categorie')->orderBy('id', 'desc')->get();
                                                    foreach ($Categorie as $categorie) {
                                                        ?>
                                                        <tr>
                                                            <td hidden="hidden"><?php echo $categorie->id ?></td>

                                                            <td style="text-align: center">{{$categorie->resume_titre}}</td>
                                                            <td style="text-align: center">{{$categorie->full_titre}}</td>
                                                            <td style="text-align: center"><a data-toggle="modal" data-target="#modifier_categorie<?php echo $categorie->id?>" class="btn btn-primary">Modifier</a> | <a href="supprimer_categorie<?php echo $categorie->id?>" class="btn btn-primary">Supprimer</a></td>

                                                            <div class="modal fade" id="modifier_categorie<?php echo $categorie->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                                            <h4 class="modal-title">Modifier categorie</h4>
                                                                        </div>
                                                                        <br/>
                                                                        <form action="enregistrer_modifier_categorie<?php echo $categorie->id;?>" method="post" class="form-horizontal" id="demo-form" data-parsley-validate="" novalidate="">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-3 control-label">Resume du titre</label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                            <input type="text" name="resume" class="form-control" required="" value="{{$categorie->resume_titre}}">
                                                                                        </div>
                                                                                        @if($errors->has('resume'))
                                                                                        {<span style="color:red">{!!$errors->first('resume')!!}</span>}
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br/>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-3 control-label">Titre de la categorie</label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text" name="detail" class="form-control" required="" value="{{$categorie->full_titre}}">
                                                                                        </div>
                                                                                        @if($errors->has('detail'))
                                                                                        {<span style="color:red">{!!$errors->first('detail')!!}</span>}
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bg-default content-box text-center pad20A mrg25T">
                                                                                <input type="submit" name="save" value="Valider les informations" class="btn btn-lg btn-primary"/>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <div class="bg-default content-box text-center pad20A mrg25T">
                                                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-lg btn-default">Retour à la page précédente</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')