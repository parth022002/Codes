import java.util.*;

class Practical6 {
    public static void main(String[] args) {
        try (Scanner input = new Scanner(System.in)) 
        {
            System.out.print("Enter Alphabet : ");
            char ch = input.next().charAt(0);
            switch (Character.toLowerCase(ch)) {
                case 'a':
                case 'e':
                case 'i':
                case 'o':
                case 'u':
                    System.out.print(ch + " is vowel");
                    break;
                default:
                    System.out.print(ch + " is consonants");
            }
        }
    }
}
