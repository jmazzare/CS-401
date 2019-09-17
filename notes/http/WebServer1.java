import java.net.ServerSocket;
import java.net.Socket;

public class WebServer1 {

  public static void main(String args[] ) throws Exception {
    final ServerSocket server = new ServerSocket(8080);
    System.out.println("Listening at: http://localhost:8080");
    while (true) {}
  }
}
