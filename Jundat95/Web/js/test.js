
<input type="button" id="show-btn" value="Click me" />
         
        <script language="javascript">
            // Lấy đối tượng
            var button = document.getElementById("show-btn");
             
            // Thêm sự kiện cho đối tượng
            button.onclick = function()
            {
              alert("Bạn vừa click vào button");
            };
        </script>

var a_list = document.getElementsByClassName("show-me1");
             
            // Lặp và gán sự kiện
            for (var i = 0; i < a_list.length; i++){
                a_list[i].onclick = function()
                {
                    alert('Xin chào, bạn vừa click vào tôi');
                   
                    // return false để khỏi reload trang
                    return false
                };
            }        