import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Date;

public class WebServer3 {

  public static void main(String args[] ) throws Exception {
    final ServerSocket server = new ServerSocket(8080);
    System.out.println("Listening at: http://localhost:8080");
    while (true) {
      try (Socket socket = server.accept()) {
        Date today = new Date();
        String httpResponse = "HTTP/1.1 200 OK\r\n\r\n" + today;
        socket.getOutputStream().write(httpResponse.getBytes("UTF-8"));
      }
    }
  }
}
