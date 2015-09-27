package Puzzle;

/**
 * Created by chuli on 26/09/2015.
 */
public class Node {
    private int[][] state = new int[3][3];

    public int[][] getState() {
        return state;
    }

    public void setState(int[][] state) {
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                this.state[i][j] = state[i][j];
            }
        }
        CalculateH();
        PositionXY();
    }
    private int h; //declare Manhattan's heuristic

    public int getH() {
        return h;
    }

    public void setH(int h) {
        this.h = h;
    }

    private int g;

    public int getG() {
        return g;
    }

    public void setG(int g) {
        this.g = g;
    }

    private int id;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    private int parentID;

    public int getParentID() {
        return parentID;
    }

    public void setParentID(int parentID) {
        this.parentID = parentID;
    }

    private int emptyX;

    public int getEmptyX() {
        return emptyX;
    }

    public void setEmptyX(int emptyX) {
        this.emptyX = emptyX;
    }

    private int emptyY;

    public int getEmptyY() {
        return emptyY;
    }

    public void setEmptyY(int emptyY) {
        this.emptyY = emptyY;
    }
    public int getF() {
        return g + h;
    }
    public void PositionXY()
    {
        for (int i = 0; i <3; i++) {
            for (int j = 0; j <3; j++) {
                if(this.state[i][j] == 0)
                {
                    this.emptyX = i;
                    this.emptyY = j;
                    break;
                }
            }
        }
    }
    public void CalculateH()
    {
        int tempH = 0;
        int goalStateX =0, goalStateY = 0;
        for (int i = 0; i <3; i++) {
            for (int j = 0; j <3; j++) {
                goalStateX = this.state[i][j] /3;
                goalStateY = this.state[i][j]%3;
                tempH += Math.abs(goalStateX - i) + Math.abs(goalStateY - j);
            }
        }
        this.h = tempH;
    }
    public Node()
    {
        this.g = this.id = this.parentID = -1;
    }
    public Node(int g, int[][] state,int id,int parentID)
    {
        this.g = g;
        setState(state);
        this.id = id;
        this.parentID = parentID;
    }
}
