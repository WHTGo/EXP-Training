<?php
/**
 * Created by PhpStorm.
 * User: chuli
 * Date: 22/10/2015
 * Time: 5:40 SA
 */
$connect = new db_connect();
$sql = "SELECT * FROM `tblkhachhang`";
$ds = $connect->tblData($sql);
//var_dump($ds);
?>

    <div id="page-khachhang">
        <div id="menu">
            <div class="container-fluid">
                <ul class="nav nav-pills ">
                    <li role="presentation"><a href="#">Khách Hàng</a></li>
                    <li role="presentation"><a href="#">Phòng</a></li>
                </ul>
            </div>
        </div>
        <div id="logo">

        </div>
        <div class="subhead">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div id="toolbar" class="btn-toolbar">
                            <div id="toolbar-new" class="btn-wrapper">
                                <button class="btn btn-small btn-success" id="add" onclick="">
                                    <span class="icon-new icon-white"></span>New
                                </button>
                            </div>
                            <div id="toolbar-edit" class="btn-wrapper">
                                <button id="edit" class="btn btn-small" onclick="">
                                    <span class="icon-edit"></span>
                                    Edit
                                </button>
                            </div>
                            <div id="toolbar-trash" class="btn-wrapper">
                                <button id="trash" class="btn btn-small" onclick="">
                                    <span class="icon-trash"></span>
                                    Trash
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-striped table-hover" id ="tblKhachhang">
                    <thead>
                    <tr >
                        <th width="1%">ID</th>
                        <th width="1%">ID</th>
                        <th width="10%">Họ tên</th>
                        <th width="10%">Địa chỉ</th>
                        <th width="10%">SĐT</th>
                        <th width="10%">CMTND</th>
                        <th width="58%">Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                     foreach ($ds as $row )
                    {
                    ?>
                    <tr>
                        <th width="1%"><input id="id<?php echo $row["id"]; ?>" class="checked" type="checkbox" onclick="" value="<?php echo $row["id"]; ?>" name="checked"></th>
                        <th width="1%" ><?php echo $i; ?></th>
                        <td width="10%" class="hoTen" ><?php echo $row["hoTen"]; ?></td>
                        <td width="10%" class="diaChi" ><?php echo $row["diaChi"]; ?></td>
                        <td width="10%" class="SDT" ><?php echo $row["SDT"]; ?></td>
                        <td width="10%" class="CMTND" ><?php echo $row["CMTND"]; ?></td>
                        <td width="58%" class="ghiChu" ><?php echo $row["ghiChu"]; $i++; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include "templates/modal_add.php";
?>