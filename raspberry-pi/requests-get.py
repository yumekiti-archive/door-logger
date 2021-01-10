import requests

response = requests.get('http://www.example.com')
print(response.status_code)    # HTTPのステータスコード取得
print(response.text)    # レスポンスのHTMLを文字列で取得
