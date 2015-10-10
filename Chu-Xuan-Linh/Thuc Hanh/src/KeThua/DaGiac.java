package KeThua;

import java.util.Scanner;

/**
 * Created by chuli on 10/10/2015.
 */
public class DaGiac {
    private int soCanh;
    private int doDaiCanh[];
    private int chuVi;
    private float dienTich;

    public int getSoCanh() {
        return soCanh;
    }

    public void setSoCanh(int soCanh) {
        this.soCanh = soCanh;
    }

    public int[] getDoDaiCanh() {
        return doDaiCanh;
    }

    public void setDoDaiCanh(int[] doDaiCanh) {
        this.doDaiCanh = doDaiCanh;
    }

    public int getChuVi() {
        return chuVi;
    }

    public void setChuVi(int chuVi) {
        this.chuVi = chuVi;
    }

    public float getDienTich() {
        return dienTich;
    }

    public void setDienTich(float dienTich) {
        this.dienTich = dienTich;
    }
    public DaGiac()
    {
        this.NhapCanh();
    }
    public void NhapCanh()
    {
        Scanner keyBroad = new Scanner(System.in);
        System.out.print("Nhập số cạnh của đa giác : ");
        this.soCanh = keyBroad.nextInt();
        this.doDaiCanh = new int[this.soCanh];
        for(int i = 0; i < this.soCanh; i++)
        {
            System.out.print("Nhập vào cạnh thứ " + i + " là : ");
            this.doDaiCanh[i] = keyBroad.nextInt();
        }
        this.tinhChuVi();
    }
    public void tinhChuVi()
    {
        this.chuVi = 0;
        for(int i = 0; i < this.soCanh; i++)
        {
            this.chuVi += this.doDaiCanh[i];
        }
    }
    public void inThongSo()
    {
        System.out.println("Các cạnh là : ");
        for(int i =0; i < this.soCanh;i++)
        {
            System.out.println("Độ dài cạnh thứ " + i+1 +" là : " + this.doDaiCanh[i]);
        }
        System.out.println("Chu vi : " + this.chuVi);
        System.out.println("Diện tích : " + this.dienTich);

    }
}
