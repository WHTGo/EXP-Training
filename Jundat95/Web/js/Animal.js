// Xuong dong html
var enter ="<br>"; 
// Class Animal
function Animal(name, kind, weight)
{
  this.name = name;
  this.kind = kind;
  this.weight = weight;
  
  this.getName = getName;
  this.getKind = getKind;
  this.getWeight = getWeight;

  function getName()
  {
    return this.name;
  };
  function getKind()
  {
  	return this.kind;
  };
  function getWeight()
  {
  	return this.weight;
  }

}
// Khoi tao mot doi tuong dog qua Animal
var dog = new Animal("Dog","Gau Gau",30);

document.write("Test name: "+dog.getName() + enter);
document.write("Test kind: "+dog.getKind() + enter);
document.write("Test weight: "+dog.getWeight() + enter +enter);

// Khoi tao mot doi tuong Cat
function Cat(name,kind)
{
	this.name = name;
	this.kind = kind;
	this.height = 1;

	this.getHeight = getHeight;

	function getHeight()
	{
		return this.height;
	}
} 
// Ke thua qua phuong thuc prototype
Cat.prototype = new Animal();
// Khoi tao doi tuong cat(khi da ke thua cac phuong thuc Animal)
var cat = new Cat("Cat","Meo Meo",5);

document.write("Test Name: "+cat.getName() + enter);
document.write("Test kind: "+cat.getKind() + enter);
document.write("Test weight: "+cat.getWeight() +enter); // Thuoc tinh chua duoc khoi tao len khong co gia tri
document.write("Test height: "+cat.getHeight() +enter);