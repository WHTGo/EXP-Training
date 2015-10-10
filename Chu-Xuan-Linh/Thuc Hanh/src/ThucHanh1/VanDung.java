package ThucHanh1;

import java.util.Scanner;

/**
 * Created by chuli on 10/10/2015.
 */
public class VanDung {
    public static void main(String[] args)
    {
        Scanner keyBroad = new Scanner(System.in);
        System.out.print("Nhập vào một số : ");
        int number = keyBroad.nextInt();
        if(ToanHoc.KTSoNguyenTo(number))
            System.out.println("Số "+ number +" là số nguyên tố.");
        else
            System.out.println("Số "+ number +" không là số nguyên tố.");

        if(ToanHoc.KTSoHoanHao(number))
            System.out.println("Số "+ number +" là số hoàn hảo.");
        else
            System.out.println("Số "+ number +" không là số hoàn hảo.");

        ToanHoc.InSoChinhPhuong(number);

        System.out.println("Phần tử thứ " + number + " Là : " + ToanHoc.TinhFibo(number));
    }
}
