package Puzzle;

/**
 * Created by chuli on 27/09/2015.
 */
public class Demo {
    public static void main(String[] args)
    {
        int[][] tileMatrix = {
                {1,2,3},
                {6,4,0},
                {5,7, 8}
        };
        Puzzle a = new Puzzle();
        a.setTileMatrix(tileMatrix);
        a.solve8puzzle();
        a.InFinalPath();
    }
}
