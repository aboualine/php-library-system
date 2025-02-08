import java.io.*;
import java.util.*;

public class LibraryManager {

    private static final String CSV_FILE = "books.csv";

    public static void main(String[] args) {
        if (args.length < 1) {
            System.out.println("Usage: java LibraryManager <action> [parameters]");
            return;
        }

        String action = args[0];
        switch (action) {
            case "add":
                if (args.length != 5) {
                    System.out.println("Usage: java LibraryManager add <title> <author> <isbn> <genre>");
                    return;
                }
                addBook(args[1], args[2], args[3], args[4]);
                break;
            case "delete":
                if (args.length != 2) {
                    System.out.println("Usage: java LibraryManager delete <isbn>");
                    return;
                }
                deleteBook(args[1]);
                break;
            case "view":
                viewBooks();
                break;
            case "search":
                if (args.length != 2) {
                    System.out.println("Usage: java LibraryManager search <query>");
                    return;
                }
                searchBooks(args[1]);
                break;
            default:
                System.out.println("Invalid action. Use 'add', 'delete', 'view', or 'search'.");
        }
    }

    private static void addBook(String title, String author, String isbn, String genre) {
        try (FileWriter writer = new FileWriter(CSV_FILE, true)) {
            writer.append(title).append(",")
                  .append(author).append(",")
                  .append(isbn).append(",")
                  .append(genre).append("\n");
            System.out.println("Book added successfully!");
        } catch (IOException e) {
            System.out.println("Error adding book: " + e.getMessage());
        }
    }

    private static void deleteBook(String isbn) {
        List<String[]> books = new ArrayList<>();
        try (BufferedReader reader = new BufferedReader(new FileReader(CSV_FILE))) {
            String line;
            while ((line = reader.readLine()) != null) {
                String[] book = line.split(",");
                if (!book[2].equals(isbn)) {
                    books.add(book);
                }
            }
        } catch (IOException e) {
            System.out.println("Error reading CSV file: " + e.getMessage());
            return;
        }

        try (FileWriter writer = new FileWriter(CSV_FILE)) {
            for (String[] book : books) {
                writer.append(String.join(",", book)).append("\n");
            }
            System.out.println("Book deleted successfully!");
        } catch (IOException e) {
            System.out.println("Error writing to CSV file: " + e.getMessage());
        }
    }

    private static void viewBooks() {
        try (BufferedReader reader = new BufferedReader(new FileReader(CSV_FILE))) {
            String line;
            while ((line = reader.readLine()) != null) {
                System.out.println(line);
            }
        } catch (IOException e) {
            System.out.println("Error reading CSV file: " + e.getMessage());
        }
    }

    private static void searchBooks(String query) {
        try (BufferedReader reader = new BufferedReader(new FileReader(CSV_FILE))) {
            String line;
            while ((line = reader.readLine()) != null) {
                if (line.toLowerCase().contains(query.toLowerCase())) {
                    System.out.println(line);
                }
            }
        } catch (IOException e) {
            System.out.println("Error reading CSV file: " + e.getMessage());
        }
    }
}