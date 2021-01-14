import http.server
import socketserver

with socketserver.TCPServer(('127.0.0.1', 50007),
http.server.SimpleHTTPRequestHandler) as httpd:
    httpd.serve_forever()
