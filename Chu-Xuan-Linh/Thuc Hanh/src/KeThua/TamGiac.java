package KeThua;

/**
 * Created by chuli on 10/10/2015.
 */
public class TamGiac extends DaGiac {
    public void tinhDienTich()
    {
        float   p = this.getChuVi()/2,
                a = this.getDoDaiCanh()[0],
                b = this.getDoDaiCanh()[1],
                c = this.getDoDaiCanh()[2];

        float   dienTich = (float) Math.sqrt(p*(p-a)*(p-b)*(p-c));
        this.setDienTich(dienTich);
    }
    public void NhapCanh()
    {
        super.NhapCanh();
        this.tinhDienTich();
    }
    public static void main(String[] args)
    {
        TamGiac a = new TamGiac();
        a.inThongSo();
    }
}
