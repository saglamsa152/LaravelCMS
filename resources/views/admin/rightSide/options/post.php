<aside class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small><?= _('Menage Post Options') ?></small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL::action('AdminController@getIndex') ?>"><i
                        class="fa fa-dashboard"></i> <?= _('Admin Home') ?>
                </a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box ">
                    <div class="box-header">
                        <h3 class="box-title"><?= _('Post Category Options') ?></h3>

                        <div class="box-tools pull-right">
                            <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm"
                                    data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header-->
                    <div class="box-body">
                        <section class="col-md-4">
                            <?= Form::open(array(
                                'role' => 'form',
                                'id' => 'postOptions',
                                'class' => 'form ajaxForm',
                                'method' => 'post',
                                'action' => 'OptionsController@postSaveCategory',
                                'title' => _('Save Category')))
                            ?>
                            <?= Form::hidden('id', 0, array('id' => 'id')) ?>
                            <?= Form::hidden('level', 0, array('id' => 'level')) ?>
                            <h4 class="page-header"><?= _('Add New Category') ?></h4>
                            <!-- Add new Category -->
                            <div class="form-group">
                                <?= Form::label('name', _('Category Name'), array('class' => 'control-label')) ?>
                                <div class=" col-md-12">
                                    <?= Form::text('name', Input::old('name'), array('class' => 'form-control input-sm')) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Form::label('parentCat', _('Parent Category'), array('class' => 'control-label')) ?>
                                <div class=" col-md-12">
                                    <?=Form::select('parentCat',$categoriesSelectArray,Input::old('parentCat'),array('class' => 'form-control input-sm'))?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Form::label('description', _('Category Description'), array('class' => 'control-label')) ?>
                                <div class=" col-md-12">
                                    <?= Form::textarea('description', Input::old('description'), array('class' => 'form-control input-sm')) ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-actions">
                                <br/>
                                <?= Form::reset(_('Clear'), array('class' => 'pull-left btn btn-default btn-sm')) ?>
                                <?= Form::submit(_('Save'), array('class' => 'pull-right btn btn-primary btn-sm')) ?>
                            </div>
                            <?= Form::close(); ?>
                        </section>
                        <section class="col-md-8">
                            <h4 class="page-header"><?= _('Category List') ?></h4>
                            <table id="news-table"
                                   class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><?= _('Category Name') ?></th>
                                    <th><?= _('Category Description') ?></th>
                                    <th class="text-center"><?= _('Action') ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td data-index="name"><?= str_repeat(' - ', $category->level) .$category->name ?></td>
                                        <td data-index="description"><?= $category->description ?></td>
                                        <td class="text-center">
                                            <div class="btn-group text-left" style="margin-right:5px">
                                                <button data-toggle="dropdown"
                                                        class="btn btn-default btn-flat dropdown-toggle" type="button">
                                                    <?= _('Actions') ?>
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li>
                                                        <a class="updateCat" href="javascript:"
                                                           cat-data='<?= json_encode($category) ?>'>
                                                            <i class="fa fa-edit"></i>
                                                            <?= _('Edit') ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <?= Form::open(array('id' => 'deleteForm-' . $category->id, 'method' => 'post', 'action' => 'OptionsController@postDeleteCategory', 'class' => 'ajaxFormDelete')) ?>
                                                        <?= Form::hidden('id', $category->id) ?>
                                                        <?= Form::close() ?>
                                                        <a href="#"
                                                           onclick="$('#deleteForm-<?= $category->id ?>').submit()">
                                                            <i class="fa fa-trash-o"></i>
                                                            <?= _('Delete') ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?= Form::checkbox('bulk-' . $category->id, $category->id) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?= _('Category Name') ?></th>
                                    <th><?= _('Category Description') ?></th>
                                    <th class="text-center">
                                        <div id="bulkAction" class="btn-group text-left" style="margin-right:5px">
                                            <?= Form::token() ?>
                                            <button data-toggle="dropdown"
                                                    class="btn btn-default btn-flat dropdown-toggle" type="button">
                                                <?= _('Bulk Actions') ?>
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li>
                                                    <a href="#" data-action="delete"
                                                       data-link="<?= URL::action('AdminController@postDeletePost') ?>">
                                                        <i class="fa fa-trash-o"></i>
                                                        <?= _('Delete') ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="checkbox" id="check-all"/></th>
                                </tr>
                                </tfoot>
                            </table>
                            <script type="text/javascript">
                                /**
                                 * Kategori  güncelleme işlemi için düzenle butonuna tıklandığında  tıklandığında
                                 *
                                 */
                                var values = {};
                                $('.updateCat').click(function (e) {
                                    values = $.parseJSON($(this).attr('cat-data'));
                                    var form = $('#postOptions');
                                    // verileri aktaralım
                                    $('input#id', form).val(values.id);
                                    $('input#name', form).val(values.name);
                                    $('select#parentCat :selected', form).removeAttr('selected');
                                    $('select#parentCat').val(values.parentCat);
                                    $('input#level', form).val(values.level);
                                    $('#description', form).val(values.description);

                                    var cancelEditingButton = $('<?=Form::button(_('Cancel editing'),array('class' => 'pull-left btn btn-danger btn-sm','style'=>'margin-left:5px','id'=>'cancelEditingButton'))?>');

                                    if(!$('#cancelEditingButton').length) $('input[type="reset"]', form).after(cancelEditingButton);
                                    cancelEditingButton.click(function () {
                                        $('input#id', form).val(0);
                                        $('input#name', form).val('');
                                        $('select#parentCat :selected', form).removeAttr('selected');
                                        $('input#level', form).val(0);
                                        $('#description', form).val('');
                                    });
                                })
                            </script>
                        </section>
                    </div><!-- /.box-body-->
                </div><!-- /.box -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->