//Numbers in Ascending
import java.util.*;

class Practical5a {
    public static void main(String[] args) {
        int temp;
        try (Scanner input = new Scanner(System.in)) 
        {
            System.out.print("Enter 1st Number :");
            int a = input.nextInt();
            System.out.print("Enter 2nd Number :");
            int b = input.nextInt();
            if (a > b) {
                temp = a;
                a = b;
                b = temp;
            }
            System.out.print("Enter 3rd Number :");
            int c = input.nextInt();
            if (c < b) {
                if (c < a) {
                    temp = c;
                    c = b;
                    b = a;
                    a = temp;
                } else {
                    temp = c;
                    c = b;
                    b = temp;
                }
            }
            System.out.print("Asceding Order :" + a + " " + b + " " + c);
        }
    }
}