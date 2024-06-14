import java.util.*;

class Practical3 {
    public static void main(String[] args) {
        try (Scanner input = new Scanner(System.in)) {
            System.out.print("Enter Value in Meters :");
            double meter = input.nextDouble();
            double feet = meter * 3.28084;
            System.out.print(meter + " Meters = " + feet + " Feets");
        }
    }
}