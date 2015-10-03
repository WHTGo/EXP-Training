<?php
$cate=$data[0];
$page=$data[1];
?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="admin.php?c=category&a=add" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            </div>
            <h1>Categories</h1>
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="">Categories</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Category List</h3>
            </div>
            <div class="panel-body">
             
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center">ID </td>
                                    <td class="text-left">  <a href="" class="asc">Tên Chuyên Mục</a> </td>
                                    <td class="text-right"> <a href="">Người Đăng</a></td>
                                    <td class="text-right" colspan="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($cate as $item) { ?>
                            
                                    <tr>
                                        <td class="text-center"><?php echo $item['Cate_id'] ?></td>
                                        <td class="text-left"><?php echo $item['Cate_title'] ?></td>
                                        <td class="text-right"><?php echo $item['Add_username'] ?></td>
                                 
                                  
                                        <td class="text-right"><a href="admin.php?c=category&a=edit&cid=<?php echo $item['Cate_id'] ?>"  "data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    <td class="text-right">
                                        <form action="admin.php?c=category&a=delete" method="post">
                                            <input type="hidden" value="<?php echo $item['Cate_id'] ?>" name="Cate_id">
                                            <a href="admin.php?c=category&a=delete&id=<?php echo $item['Cate_id'] ?>"   "data-toggle="tooltip" title="delete" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                       </form>
                                    </td>
                               

                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                <?php echo $page['html']; ?>
                
            </div>
        </div>
    </div>
</div>

