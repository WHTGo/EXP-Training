package Puzzle;

import java.util.*;
import java.util.PriorityQueue;

/**
 * Created by chuli on 27/09/2015.
 */
public class Puzzle {
    public static Comparator<Node> F = new Comparator<Node>(){
        public int compare(Node Node1, Node Node2) {
            return  (Node1.getF() - Node2.getF());
        }
    };

    private Queue<Node> openList = new PriorityQueue<Node>(F);
    private LinkedList<Node> closeList = new LinkedList<Node>();
    private LinkedList<Node> finalPath = new LinkedList<Node>();
    private int idCount;
    private Node startNode;
    private Node smallestNode;
    private Node branchNode;
    private Node FindNode;
    private int[][] tileMatrix;

    public void setTileMatrix(int[][] tileMatrix) {
        this.tileMatrix = tileMatrix;
    }

    private int[][] goalState = {
            {0,1,2},
            {3,4,5},
            {6,7,8}
    };
    public Node moveEmptyLeft(Node currentNode)
    {
        int[][] tempState = new int[3][3];
        int i,j;
        for (i=0;i<3;i++)
            for(j=0;j<3;j++)
                tempState[i][j] = currentNode.getState()[i][j];
        int x = currentNode.getEmptyX(), y = currentNode.getEmptyY();
        tempState[x][y] = tempState[x][y-1];
        tempState[x][y-1] = 0;
        return new Node(currentNode.getG()+1,tempState,++idCount,currentNode.getId());
    }
    public Node moveEmptyRight(Node currentNode)
    {
        int[][] tempState = new int[3][3];
        int i,j;
        for (i=0;i<3;i++)
            for(j=0;j<3;j++)
                tempState[i][j] = currentNode.getState()[i][j];
        int x = currentNode.getEmptyX(), y = currentNode.getEmptyY();
        tempState[x][y] = tempState[x][y+1];
        tempState[x][y+1] = 0;
        return new Node(currentNode.getG()+1,tempState,++idCount,currentNode.getId());
    }
    public Node moveEmptyUp(Node currentNode)
    {
        int[][] tempState = new int[3][3];
        int i,j;
        for (i=0;i<3;i++)
            for(j=0;j<3;j++)
                tempState[i][j] = currentNode.getState()[i][j];
        int x = currentNode.getEmptyX(), y = currentNode.getEmptyY();
        tempState[x][y] = tempState[x-1][y];
        tempState[x-1][y] = 0;
        return new Node(currentNode.getG()+1,tempState,++idCount,currentNode.getId());
    }
    public Node moveEmptyDown(Node currentNode)
    {
        int[][] tempState = new int[3][3];
        int i,j;
        for (i=0;i<3;i++)
            for(j=0;j<3;j++)
                tempState[i][j] = currentNode.getState()[i][j];

        int x = currentNode.getEmptyX(), y = currentNode.getEmptyY();

        tempState[x][y] = tempState[x+1][y];
        tempState[x+1][y] = 0;
        return new Node(currentNode.getG()+1,tempState,++idCount,currentNode.getId());
    }

    public  boolean isSameState(int[][] stateA, int[][] stateB)
    {
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                if (stateA[i][j] != stateB[i][j]) {
                    return false;
                }
            }
        }
        return true;
    }
    public static boolean isSameNode(Node NodeA, Node NodeB)
    {
        int[][] stateA = NodeA.getState();
        int[][] stateB = NodeB.getState();
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                if (stateA[i][j] != stateB[i][j]) {
                    return false;
                }
            }
        }
        return true;
    }
    private  Boolean Check(Queue<Node> Queue)
    {
        Queue<Node> a = new LinkedList<Node>(Queue);
        while (true)
        {
            Node cus = a.poll();
            if (cus == null) {
                break;
            }
            if(isSameNode(cus,branchNode)) return true;
        }
        return false;
    }
    public void checkBranchNode()
    {
        if(!Check(openList))
            openList.add(branchNode);
    }
    public  void InMaTran(Node Node)
    {
        int[][] a = Node.getState();
        System.out.println("Trạng Thái " + Node.getId());
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                System.out.print(a[i][j] + " ");
            }
            System.out.println();
        }

    }
    public void InFinalPath()
    {
        for (int i = 0; i < finalPath.size(); i++) {
            InMaTran(finalPath.get(i));
        }
    }
    public  void FinalPath()
    {
        Node insertNode = FindNode;
        finalPath.addFirst(insertNode);
        for(int i = 0; i < closeList.size() ;i++)
        {
            if(insertNode.getParentID() == closeList.get(i).getId())
            {
                insertNode = closeList.get(i);
                finalPath.addFirst(insertNode);
            }
        }
    }
    public void solve8puzzle() {
        openList.clear();
        finalPath.clear();
        closeList.clear();
        idCount = 0;
        startNode = new Node(0,tileMatrix,idCount,-1);

        openList.add(startNode);

        while (!openList.isEmpty())
        {
            smallestNode = openList.poll();
            if(isSameState(smallestNode.getState(),goalState))
            {
                FindNode = smallestNode;
                closeList.addFirst(smallestNode);
                break;
            }
            else
            {
                closeList.addFirst(smallestNode);
                if(smallestNode.getEmptyX() == 0 && smallestNode.getEmptyY() == 0)
                {
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 0 && smallestNode.getEmptyY() == 1)
                {
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 0 && smallestNode.getEmptyY() == 2)
                {
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 1 && smallestNode.getEmptyY() == 0)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 1 && smallestNode.getEmptyY() == 1)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 1 && smallestNode.getEmptyY() == 2)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyDown(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 2 && smallestNode.getEmptyY() ==0)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 2 && smallestNode.getEmptyY() == 1)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyRight(smallestNode);
                    checkBranchNode();
                }
                else if(smallestNode.getEmptyX() == 2 && smallestNode.getEmptyY() == 2)
                {
                    branchNode = moveEmptyUp(smallestNode);
                    checkBranchNode();
                    branchNode = moveEmptyLeft(smallestNode);
                    checkBranchNode();
                }

            }
        }
        System.out.println("Thành Công !^^");
        FinalPath();
    }
}
