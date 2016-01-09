
    <?php
        $data1=$data[0];
        $error=$data[1];
        
        function show_error($error,$string)
            {
                if(isset($error[$string])){echo '<span style="color:red">'.$error[$string].'</span>';}
            }
    ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form"  name="ok" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="admin/index.php?action=cate_list" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1> Add Categories</h1>
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="">Add Categories</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Category</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post"  id="form" class="form-horizontal">
                    <input type ="hidden" name ="category_add"  value="category_add" >
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="tab-general">
                            <ul class="nav nav-tabs" id="language">
                                <li><a href="#language1" data-toggle="tab"><img src="public/admin/image/flags/gb.png" title="English" /> English</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="language1">
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-name1">Category Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Cate_Title" value="" placeholder="Category Name" id="input-name1" class="form-control" />
                                            <?php show_error($error, 'Cate_title'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-name1">Category Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Cate_slug" value="" placeholder="Category slug" id="input-name1" class="form-control" />
                                            <?php show_error($error, 'Cate_slug') ?>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-description1">Category keyword</label>
                                        <div class="col-sm-10">
                                            <textarea name="Cate_keyword" placeholder=" keyword " id="input-description1" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-description1">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="Cate_description" placeholder="Description" id="input-description1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                   

                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-name1">Category Robots</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Cate_Robot<" value="" placeholder="Category Robots<" id="input-name1" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript"><!--
  $('#input-description1').summernote({
            height: 300
        });
        //--></script> 
    <script type="text/javascript"><!--
        $('input[name=\'path\']').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: 'index.php?route=catalog/category/autocomplete&token=584c84079e47add5de7847540dae824c&filter_name=' + encodeURIComponent(request),
                    dataType: 'json',
                    success: function (json) {
                        json.unshift({
                            category_id: 0,
                            name: ' --- None --- '
                        });

                        response($.map(json, function (item) {
                            return {
                                label: item['name'],
                                value: item['category_id']
                            }
                        }));
                    }
                });
            },
            'select': function (item) {
                $('input[name=\'path\']').val(item['label']);
                $('input[name=\'parent_id\']').val(item['value']);
            }
        });
        //--></script> 
    <script type="text/javascript"><!--
        $('input[name=\'filter\']').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: 'index.php?route=catalog/filter/autocomplete&token=584c84079e47add5de7847540dae824c&filter_name=' + encodeURIComponent(request),
                    dataType: 'json',
                    success: function (json) {
                        response($.map(json, function (item) {
                            return {
                                label: item['name'],
                                value: item['filter_id']
                            }
                        }));
                    }
                });
            },
            'select': function (item) {
                $('input[name=\'filter\']').val('');

                $('#category-filter' + item['value']).remove();

                $('#category-filter').append('<div id="category-filter' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="category_filter[]" value="' + item['value'] + '" /></div>');
            }
        });

        $('#category-filter').delegate('.fa-minus-circle', 'click', function () {
            $(this).parent().remove();
        });
        //--></script> 
    <script type="text/javascript"><!--
        $('#language a:first').tab('show');
        //--></script>
