package ThucHanh1;

/**
 * Created by chuli on 10/10/2015.
 */
public class ToanHoc {
    public static boolean KTSoNguyenTo(int n)
    {
        if(n < 2) return false;
        for(int i =2; i <= n/2;i++)
        {
            if(n%i == 0) return false;
        }
        return true;
    }
    public static boolean KTSoHoanHao(int n)
    {
        if(n <= 1) return false;
        int Tong = 1;
        for(int i = 2;i < n;i++)
        {
            if(n%i == 0) Tong += i;
        }
        return n == Tong;
    }
    public static void InSoChinhPhuong(int n)
    {
        if(n <= 4)
        {
            System.out.println("Không có số chính phương <= " + n);
            return;
        }
        System.out.println("Các số chính phương <= " + n);
        for(int i = 4; i<=n;i++) // do số chính phương bắt đầu từ số 4.
        {
            if(i == (int)Math.sqrt(i)*(int)Math.sqrt(i))
                System.out.println("Số " + i + " Là số chính phương.");
        }
    }
    public static int TinhFibo(int n)
    {
        if(n == 0) return 2;
        if(n == 1) return 1;
        return TinhFibo(n-1) + TinhFibo(n-2);
    }
    public static int TinhTongBai61(int n)
    {
        int Tong = 1;
        for(int i = 2; i <= n;i++)
        {
            if(i%2 == 0) Tong += i;
            else Tong -= i;
        }
        return Tong;
    }
    private static int TinhGiaiThua(int n)
    {
        if(n <= 1) return 1;
        return n*TinhGiaiThua(n-1);
    }
    public static int TinhTongBai62(int n)
    {
        int Tong=0;
        for(int i = 1; i<=n;i++)
            Tong += TinhGiaiThua(i);
        return Tong;
    }
    public static int TinhTongBai63(int n)
    {
        int Tong = 0;
        int k = 1;
        if(n%2 == 0) k = 2;
        for (int i= k; i <= n; i += 2)
            Tong += i;
        return Tong;
    }

}
