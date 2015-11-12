var enter = "<br>";
// Class toan hoc
function ToanHoc(a,b)
{
	this.a = a;
	this.b = b;

	this.TinhTong = TinhTong;
	this.TinhThuong = TinhThuong;
	this.TinhHieu = TinhHieu;

	function TinhTong()
	{
		return (this.a + this.b);
	};
	function TinhThuong()
	{
		return (this.a * this.b);
	};
	function TinhHieu()
	{
		return (this.a / this.b);
	}
}

var a = document.getElementById("");