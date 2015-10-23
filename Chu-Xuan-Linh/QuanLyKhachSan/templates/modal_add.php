<?php
/**
 * Created by PhpStorm.
 * User: chuli
 * Date: 22/10/2015
 * Time: 5:42 SA
 */
?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="icon-new icon-white"></span>Thêm khách hàng</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="classes/DAL_KhachHang.php" >
                    <div class="form-group">
                        <label for="hoten">Họ Tên </label>
                        <input type="text" class="form-control" name="hoTen" id="hoTen" placeholder="Họ tên">
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa chỉ</label>
                        <input type="text" class="form-control" name="diaChi" id="diaChi" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="SDT">SĐT</label>
                        <input type="text" class="form-control" name="SDT" id="SDT" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="CMTND">CMTND</label>
                        <input type="text" class="form-control" name="CMTND" id="CMTND" placeholder="Chứng minh thư">
                    </div>
                    <div class="form-group">
                        <label for="ghiChu">Ghi chú</label>
                        <input type="text" class="form-control" name="ghiChu" id="ghiChu" placeholder="Ghi chú">
                    </div>
                    <button type="submit" id="submit" name="Save" class="btn btn-success btn-block"><span class="icon-apply icon-white"></span>Save
                    </button>
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="task" name="task">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Cancel
                </button>
            </div>
        </div>
    </div>
    </div>
<script>
    $(document).ready(function(){
        $("#add").click(function(){
            $("#myModal").modal();
            $("#hoTen").val(null);
            $("#diaChi").val(null);
            $("#SDT").val(null);
            $("#CMTND").val(null);
            $("#ghiChu").val(null);
            $("#task").val("add");
        });
        $("#edit").click(function(){
            $("#myModal").modal();
            $("#task").val("edit");
        });
        $("#trash").click(function() {
            $("#task").val("trash");
            $("#submit").click();
        })
        $(".checked").click(function() {
            if(this.checked)
            {
                $('#id').val(this.value);
                alert(this.value +"vui qua di" );
            }
            else
            {
                $('#id').val(null);
            }
        })

        function example4() {
            var table = document.getElementById("tblKhachhang");
            var rows = table.rows; // or table.getElementsByTagName("tr");
            for (var i = 0; i < rows.length; i++) {
                rows[i].onclick = (function() { // closure
                    return function() {

                        var hoTen = this.cells[2].innerHTML;
                        var diaChi = this.cells[3].innerHTML;
                        var SDT = this.cells[4].innerHTML;
                        var CMTND = this.cells[5].innerHTML;
                        var ghiChu = this.cells[6].innerHTML;
                        if(hoTen != "")
                        {
                            $("#hoTen").val(hoTen);
                        }
                        if(diaChi != "")
                        {
                            $("#diaChi").val(diaChi);
                        }
                        if(SDT != "")
                        {
                            $("#SDT").val(SDT);
                        }
                        if(CMTND != "")
                        {
                            $("#CMTND").val(CMTND);
                        }
                        if(ghiChu != "")
                        {
                            $("#ghiChu").val(ghiChu);
                        }

                    }
                })(i);
            }
        }
        window.onload = function() { example4(); }


    });
</script>