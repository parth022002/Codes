import java.util.*;

class Practical4 {
    public static void main(String[] args) {
        try (Scanner input = new Scanner(System.in)) {
            System.out.print("Enter Your weight in Pound :");
            double pound = input.nextDouble();
            System.out.print("Enter Your Height in Inch :");
            double inch = input.nextDouble();
            double BMI = (pound * 0.45359237) / ((inch * 0.0254) * (inch * 0.0254));
            System.out.print("BMI = " + BMI);
        }
    }
}