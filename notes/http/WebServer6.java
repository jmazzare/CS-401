import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.UUID;

public class WebServer6 {

  public static void main(String args[] ) throws Exception {
    final ServerSocket server = new ServerSocket(8080);
    System.out.println("Listening at: http://localhost:8080");
    while (true) {
      try (Socket socket = server.accept()) {
        InputStreamReader isr =  new InputStreamReader(socket.getInputStream());
        BufferedReader reader = new BufferedReader(isr);
        String firstLine = null;
        String line = reader.readLine();
        while (!line.isEmpty()) {
          System.out.println(line);
          if (firstLine == null) firstLine = line;
          line = reader.readLine();
        }
        String location = "Request Location: " + firstLine + "<br />";
        UUID uuid = UUID.randomUUID();
        String random = uuid.toString();
        String link = "<a href='/" + random + ".html'>" + random + "</a>";
        String ctype = "Content-type: text/html";
        String httpResponse = "HTTP/1.1 200 OK\r\n"+ ctype + "\r\n\r\n" + location + link;
        socket.getOutputStream().write(httpResponse.getBytes("UTF-8"));
      }
    }
  }
}
