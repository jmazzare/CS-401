import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;

public class WebServer2 {

  public static void main(String args[] ) throws Exception {
    final ServerSocket server = new ServerSocket(8080);
    System.out.println("Listening at: http://localhost:8080");
    while (true) {
      Socket clientSocket = server.accept();
      InputStreamReader isr =  new InputStreamReader(clientSocket.getInputStream());
      BufferedReader reader = new BufferedReader(isr);
      String line = reader.readLine();
      while (!line.isEmpty()) {
        System.out.println(line);
        line = reader.readLine();
      }
    }
  }
}
